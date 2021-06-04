<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', [PageController::class, 'showMain']);


//Authorization
Route::group(['prefix'=>'auth', 'middleware'=>'guest'],function (){
    Route::get('/', [AuthController::class, 'showLogin']);
    Route::post('/login', [AuthController::class, 'login']);
});

Route::group(['prefix'=>'reg', 'middleware'=>'guest'],function (){
    Route::get('/', [AuthController::class, 'showReg']);
    Route::post('/reg', [AuthController::class, 'userCreate']);
});

Route::get('/logout', [AuthController::class, 'logout']);

Route::group(['prefix'=>'admin', 'middleware'=>'auth'], function (){
    Route::get('/', [AdminController::class, 'showAdmin'])->name('Admin');

    Route::get('/create/category', [AdminController::class, 'showCategory'])->name('showAdminCategory');
});

Route::get('/cart', [\App\Http\Controllers\CartController::class, 'showCart'])->name('showCart');

Route::get('/brand/{brand}', [PageController::class, 'showBrand'])->name('showBrand');

Route::get('/search', [PageController::class, 'showSearch'])->name('showSearch');

Route::get('/{category}', [ProductsController::class, 'showCategory'])->name('showCategory');
Route::get('/{category}/{product_id}', [ProductsController::class, 'show'])->name('showProduct');

