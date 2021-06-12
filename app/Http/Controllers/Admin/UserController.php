<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;


class UserController extends Controller
{
    const ITEM_PER_PAGE = 12;

    public function index(){
        $users = User::sortable()->paginate(self::ITEM_PER_PAGE);
        return view('admin.user.index', compact('users'));
    }

    public function edit($id){
        $user = User::find($id);
        return view('admin.user.edit', compact('user') );
    }

    public function update(UserRequest $request, $id){
        $user = User::find($id);
        $user_params = $request->only(['name', 'phone', 'address', 'birthday']);

        if ($request->hasFile('image')) {
            $file_path_with_name= 'user/' . $user->id .'-' . time() . '.' .$request->file('image')->extension();
            $request->file('image')->storeAs('public/',$file_path_with_name);
            $user_params['image'] = $file_path_with_name;
        }
        $user->update($user_params);
        return back()->withInput();
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        delete_image($user->image, 'user');
        return back()->with('message', 'Delete user successful');
    }
}
