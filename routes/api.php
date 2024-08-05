<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::middleware("auth:sanctum")->group(function (){
    Route::prefix('order')->group(function (){
        Route::get('create-order',[OrderController::class,"index"]);
        Route::get('order-detail',[OrderController::class,"detail"]);
        Route::get('cancel-order',[OrderController::class,"cancel"]);
    });

    Route::prefix('user')->group(function (){
        Route::get('profile',[OrderController::class,"profile"]);
        Route::get('my-orders',[OrderController::class,"myOrders"]);
    });

});

Route::post('login',[AuthController::class,"login"]);
Route::post('create-account',[UserController::class,"createAccount"]);


