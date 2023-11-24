<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PageController;

Route::get('/', [PageController::class, 'home'])->name('home');

Route::get('categoria/{category:slug}', [PageController::class, 'category'])->name('page.category');
Route::get('etiqueta/{tag:slug}',       [PageController::class, 'tag'])->name('page.tag');
Route::get('hilo/{thread:slug}',             [PageController::class, 'thread'])->name('page.thread');

