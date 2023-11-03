<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShoppingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::controller(ProductController::class)->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get("products", 'index');
        Route::get("products/new",'create');
        Route::post('products' , 'store');
        Route::get('products/{id}' , 'show');
        Route::get('products/{id}/edit' , 'edit');
        Route::patch('products/{id}' , 'update');
        Route::delete('products/{id}' , 'delete');
});
});

Route::controller(ShoppingController::class)->group(function(){
    Route::prefix('shop')->group(function(){
        Route::get("products", 'index');
        Route::post("products/addcart", 'addToCart');
    });
});

Route::controller(AuthController::class)->group(function(){
    Route::prefix('auth')->group(function(){
        Route::get("login", 'login');
        Route::get("signup", 'signup');
        Route::post("register", 'register');
        Route::post("login", 'signin');
    });
});
