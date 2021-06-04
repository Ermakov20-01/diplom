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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/del-cart-product/{product}', [\App\Http\Controllers\CartController::class, 'delCartApi']);
Route::get('/add-cart-product/{product}', [\App\Http\Controllers\CartController::class, 'addCartApi']);
Route::get('/edit-cart-product/{product}-{count}', [\App\Http\Controllers\CartController::class, 'editCartApi']);
Route::get('/clear-cart-product/{product}', [\App\Http\Controllers\CartController::class, 'clearCartApi']);
