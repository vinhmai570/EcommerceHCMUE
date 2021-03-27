<?php

namespace App\Http\Controllers\Admin\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
    public function login(Request $request)
    {
        if ($request->getMethod() == 'GET') {
          
            return view('admin.auth.login');
        }

        $credentials = $request->only(['email', 'password']);

        if (Auth::guard('admin')->attempt($credentials)) {   
            return redirect()->route('dashboard');
        } else {
            return redirect()->back()->withInput();
        }
    }
}
