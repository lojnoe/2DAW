<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('app');
});

Route::resource('products', \App\Http\Controllers\ProductController::class);
