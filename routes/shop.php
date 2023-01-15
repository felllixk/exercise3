<?php

use Illuminate\Support\Facades\Route;

Route::prefix('shop')->group(function () {

    Route::middleware('auth:sanctum')->group(function () {
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

        Route::prefix('basket')->group(function () {
            Route::get('/', [\App\Http\Controllers\BasketController::class, 'show']);
            Route::post('/', [\App\Http\Controllers\BasketController::class, 'store']);
            Route::post('/many', [\App\Http\Controllers\BasketController::class, 'storeMany']);
            Route::put('/{id}', [\App\Http\Controllers\BasketController::class, 'edit']);
            Route::delete('/{id}', [\App\Http\Controllers\BasketController::class, 'destroy']);
        });

        Route::prefix('orders')->group(function () {
            Route::post('/', [\App\Http\Controllers\OrderController::class, 'store']);
            Route::get('/', [\App\Http\Controllers\OrderController::class, 'index']);
        });
    });


    Route::prefix('catalog-tree')->group(function () {
        Route::get('/', [\App\Http\Controllers\ShopTreeController::class, 'index']);
    });

    Route::prefix('orders')->group(function () {
        Route::post('/guest', [\App\Http\Controllers\OrderController::class, 'storeGuest']);
        Route::get('/guest/{email}', [\App\Http\Controllers\OrderController::class, 'indexGuest']);
    });

    Route::prefix('characteristics')->group(function () {
        Route::get('/', [\App\Http\Controllers\CharacteristicController::class, 'index']);
    });

    Route::prefix('product')->group(function () {
        Route::get('/', [\App\Http\Controllers\ProductController::class, 'index']);
    });
});
