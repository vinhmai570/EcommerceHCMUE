<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;


class UserController extends Controller
{
    const ITEM_PER_PAGE = 12;

    public function index(){
        $users = User::paginate(self::ITEM_PER_PAGE);
        return view('admin.user.index', compact('users'));
    }
}
