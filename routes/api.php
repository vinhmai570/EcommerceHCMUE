<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\ProductSkuController;
use App\Http\Controllers\Api\V1\Admin\ProductSkuController as AdminProductSku;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->name('api.v1')->group(function () {
    Route::prefix('product-variants')->name('.variants')->group(function (){
        Route::get('/{product_id}', [ProductSkuController::class, 'getVariant'])->name('.show');
    });

    Route::prefix('admin')->name('.admin')->group(function () {
        Route::prefix('product-skus')->name('.product_skus')->group(function () {
            Route::post('/', [AdminProductSku::class, 'store'])->name('.store');
            Route::get('/{id}', [AdminProductSku::class, 'show'])->name('.show');
            Route::put('/{id}', [AdminProductSku::class, 'update'])->name('.update');
            Route::delete('/{id}', [AdminProductSku::class, 'destroy'])->name('.destroy');
        });
    });
});
