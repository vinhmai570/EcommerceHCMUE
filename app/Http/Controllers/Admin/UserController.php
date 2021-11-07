<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Exports\UserExport;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Maatwebsite\Excel\Facades\Excel;


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

    public function export()
    {
        $fileName = 'userExport.csv';
        $users = User::all();

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = [
            'Email Address',
            'First Name',
            'Last Name',
            'Address',
            'Phone Number'
        ];

        $file = fopen($fileName, 'w');
        fputcsv($file, $columns);

        foreach ($users as $user) {
            $row['First Name']  = explode(' ', $user->name)[0];
            $count = strlen($row['First Name']);

            $row['Last Name'] = substr($user->name, $count + 1);
            $row['Email Address']    = $user->email;
            $row['Address']  = $user->address;
            $row['Phone Number']  = $user->phone;

            fputcsv($file, array($row['Email Address'], $row['First Name'], $row['Last Name'], $row['Address'], $row['Phone Number']));
        }

        fclose($file);

        return response()->download($fileName, $fileName, $headers);
    }
}
