<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('anasayfa',function(){
    return View('anasayfa');
});

Route::get('orders',function(){
    return View('orders_page');
});

Route::get('order-detail',function(){
    return View('order_detail');
});

