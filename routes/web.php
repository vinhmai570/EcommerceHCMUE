<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
require __DIR__.'/admin.php';
require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('layouts.home');
})->name('home');

// login user
Route::match(['get', 'post'], '/user', [UserLoginController::class, 'login'])->name('user.login');

Route::prefix('profile')->name('profile.')->group(function () {
    Route::get('/', [ProfileController::class, 'index'])->name('show');
    Route::get('/update', [ProfileController::class, 'edit'])->name('edit');
    Route::post('/update', [ProfileController::class, 'update'])->name('update');
});