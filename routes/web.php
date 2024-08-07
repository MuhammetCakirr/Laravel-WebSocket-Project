<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AuthController;
Route::get('/', function () {
    return view('welcome');
});

Route::get('anasayfa',function(){
    return View('anasayfa');
});

Route::get('orders',[OrderController::class,'indexPage'])->name('OrderPage');

Route::get('login',function(){
    return View('login_page');
});
Route::post('go-login',[AuthController::class,"loginMethodForPersonal"])->name("Login");
