<?php

use App\Http\Controllers\CartItemController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(CartItemController::class)->group(function(){
    Route::prefix('cart_items')->group(function(){
        Route::patch("{id}", 'updateQuantity');    
        Route::patch("{id}/decrement", 'decrementQuantity');  
    });
});
Route::post("/callback" , function(Request $request){
    Log::info($request->all('data'));
    //Log::info("hello");
});

Route::get("/callback" , function(Request $request){
    Log::info('Log message', array('context' => 'Other helpful information'));
    //Log::info("hello");
});