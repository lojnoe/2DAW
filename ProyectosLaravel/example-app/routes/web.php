<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::redirect('/','dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('dashboard',[PostController::class , 'index'])->middleware(['auth'])->name('dashboard');
Route::post('posts',[PostController::class , 'store'])->middleware(['auth'])->name('posts.store');
Route::delete('posts/{post}',[PostController::class , 'destroy'])->middleware(['auth'])->name('posts.destroy');

require __DIR__.'/auth.php';
