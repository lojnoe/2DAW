<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;



Route::get('/',[PageController::class,'home'])->name('home');

Route::get('categoria/{category}',[PageController::class,'category'])->name('page.category');


Route::get('etiqueta/{tag}',[PageController::class,'tag'])->name('page.tag');


Route::get('hilo/{thread}',[PageController::class,'thread'])->name('page.thread');
