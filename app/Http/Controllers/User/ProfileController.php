<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Order;
use App\Http\Requests\UserRequest;
Use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', Auth::user()->id)->get();
        return view('frontend.pages.profile.show',compact('orders'));
    }

    public function edit()
    {
        return view('frontend.pages.profile.edit');
    }

    public function update(UserRequest $request )
    {
        $id = Auth::user()->id;
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
}
