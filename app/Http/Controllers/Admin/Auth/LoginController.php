<?php

namespace App\Http\Controllers\Admin\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
session_start();
class LoginController extends Controller
{
    public function login(Request $request)
    {
        if ($request->getMethod() == 'GET') {
          
            return view('admin.auth.login');
        }

        $credentials = $request->only(['email', 'password']);

        if (Auth::guard('admin')->attempt($credentials)) {   
            return redirect()->route('admin.dashboard');
        } else {
            session::put('message','Username or password incorret');
            return back();
        }
    }
}
