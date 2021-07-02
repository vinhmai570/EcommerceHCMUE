<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\LogoutController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\BannerController;
use Illuminate\Support\Facades\Route;

Route::match(['get', 'post'], '/login', [LoginController::class, 'login'])->name('admin.login');
Route::get('/logout', [LogoutController::class, 'logout'])->name('admin.logout');

Route::middleware('auth:admin')->name('admin.')->group(function () {
    Route::prefix('dashboard')->name('dashboard.')->group(function () {
        Route::get('/index', [DashboardController::class, 'index'])->name('index');
        Route::post('/filter_by_date', [DashboardController::class, 'filterByDate'])->name('filter_by_date');
        Route::post('/monthly_chart', [DashboardController::class, 'monthly_chart'])->name('monthly_chart');
        Route::post('/category_chart', [DashboardController::class, 'category_chart'])->name('category_chart');
    });

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('categories')->name('categories.')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('index');
        Route::get('/create', [CategoryController::class, 'create'])->name('create');
        Route::post('/create', [CategoryController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [CategoryController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [CategoryController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('products')->name('products.')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('index');
        Route::get('/create', [ProductController::class, 'create'])->name('create');
        Route::post('/create', [ProductController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [ProductController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [ProductController::class, 'delete'])->name('destroy');
    });

    Route::prefix('order')->name('order.')->group(function () {
        Route::get('/', [OrderController::class, 'index'])->name('index');
        Route::get('/detail/{id}', [OrderController::class, 'detail'])->name('detail');
        Route::get('/update/{id}', [OrderController::class, 'update'])->name('update');
    });

    Route::prefix('users')->name('users.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [UserController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [UserController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('banners')->name('banners.')->group(function () {
        Route::get('/', [BannerController::class, 'index'])->name('index');
        Route::get('/create', [BannerController::class, 'create'])->name('create');
        Route::post('/create', [BannerController::class, 'store'])->name('store');
        Route::get('/update/{id}', [BannerController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [BannerController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [BannerController::class, 'destroy'])->name('destroy');

    });
});
