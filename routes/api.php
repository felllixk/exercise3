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
});

Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login'])->name('login');
Route::post('register', [\App\Http\Controllers\AuthController::class, 'store'])->name('register');

require_once __DIR__ . '/shop.php';
