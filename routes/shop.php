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
            Route::get('/{slug}', [\App\Http\Controllers\ProductController::class, 'getBySlug']);
            Route::delete('/{id}', [\App\Http\Controllers\ProductController::class, 'delete']);
        });

        Route::prefix('characteristics')->group(function () {
            Route::post('/', [\App\Http\Controllers\CharacteristicController::class, 'store']);
            Route::delete('/{id}', [\App\Http\Controllers\CharacteristicController::class, 'delete']);
        });

        Route::prefix('basket')->group(function () {
            Route::get('/', [\App\Http\Controllers\BasketController::class, 'show']);
            Route::post('/', [\App\Http\Controllers\BasketController::class, 'store']);
            Route::put('/{product_id}', [\App\Http\Controllers\BasketController::class, 'edit']);
            Route::delete('/{id}', [\App\Http\Controllers\BasketController::class, 'destroy']);
        });

        Route::prefix('order')->group(function () {
            Route::post('/', [\App\Http\Controllers\OrderController::class, 'store']);
        });
    });

    Route::prefix('catalog-tree')->group(function () {
        Route::get('/', [\App\Http\Controllers\ShopTreeController::class, 'get']);
    });

    Route::prefix('order')->group(function () {
        Route::post('/guest', [\App\Http\Controllers\OrderController::class, 'storeGuest']);
    });
});
