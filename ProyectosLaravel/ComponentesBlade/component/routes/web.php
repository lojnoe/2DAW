<?php

use Illuminate\Support\Facades\Route;




Route::get('login', function () {
    return view('login');
});

Route::get('register', function () {
    return view('register');
});

Route::get('examples', function () {
    return view('examples');
});

