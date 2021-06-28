<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;

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

Route::get('/', [HomeController::class, 'index'])->name('root');
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::prefix('products')->name('product')->group(function () {
    Route::get('/search', [ProductController::class, 'index'])->name('.index');
    Route::get('/list', [ProductController::class, 'list'])->name('.list');
    Route::get('/{slug}', [ProductController::class, 'show'])->name('.details');
});


Route::prefix('carts')->name('cart')->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('.index');
    Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('.add_to_cart');
    Route::delete('/remove/{rowID}', [CartController::class, 'remove'])->name('.remove');
    Route::put('/update', [CartController::class, 'update'])->name('.update');
});

Route::prefix('profile')->name('profile.')->group(function () {
    Route::get('/', [ProfileController::class, 'index'])->name('show');
    Route::get('/update', [ProfileController::class, 'edit'])->name('edit');
    Route::post('/update', [ProfileController::class, 'update'])->name('update');
    Route::get('/order-history/{id}', [ProfileController::class, 'orderHistory'])->name('order_history');
});

Route::post('/checkout', [OrderController::class, 'checkout'])->name('checkout');
Route::get('/checkout', [OrderController::class, 'index'])->name('checkout.show')->middleware('auth');
