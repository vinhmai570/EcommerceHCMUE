<?php
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\HomeController;
use Illuminate\Support\Facades\Route;

Route::match(['get', 'post'], '/login', [LoginController::class, 'login'])->name('admin.login');

Route::middleware('auth:admin')->group(function (){
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
});

