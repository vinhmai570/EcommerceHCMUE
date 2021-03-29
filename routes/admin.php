<?php

use App\Http\Controllers\Admin\CategoryController;

Route::get('/dashboard', function () {
    return view('layouts/admin');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::prefix('categories')->name('categories.')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('index');
        Route::get('/create', [CategoryController::class, 'create'])->name('create');
        Route::post('/create', [CategoryController::class, 'store'])->name('store');
    });
});
