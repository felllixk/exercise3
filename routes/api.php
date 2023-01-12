<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->group(function () {

    Route::delete('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::prefix('shop')->group(function () {
        Route::prefix('catalog')->group(function () {
            Route::post('/', [\App\Http\Controllers\CatalogController::class, 'store']);
            Route::delete('/{id}', [\App\Http\Controllers\CatalogController::class, 'delete']);
        });

        Route::prefix('subcatalog')->group(function () {
            Route::post('/', [\App\Http\Controllers\SubcatalogController::class, 'store']);
            Route::delete('/{id}', [\App\Http\Controllers\SubcatalogController::class, 'delete']);
        });

        Route::prefix('category')->group(function () {
            Route::post('/', [\App\Http\Controllers\CategoryController::class, 'store']);
            Route::post('/{id}', [\App\Http\Controllers\CategoryController::class, 'delete']);
        });

        Route::prefix('product')->group(function () {
            Route::post('/', [\App\Http\Controllers\ProductController::class, 'store']);
            Route::delete('/{id}', [\App\Http\Controllers\ProductController::class, 'delete']);
        });

        Route::prefix('characteristics')->group(function () {
            Route::post('/', [\App\Http\Controllers\CharacteristicController::class, 'store']);
            Route::delete('/{id}', [\App\Http\Controllers\CharacteristicController::class, 'delete']);
        });
    });
});

Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login'])->name('login');
Route::post('register', [\App\Http\Controllers\AuthController::class, 'store'])->name('register');
