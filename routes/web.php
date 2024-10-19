<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

// Get home.
Route::get('/', [PostController::class, 'showHome'])->name('home');

// Show a single post.
Route::get('/post/{slug}/{id}', [PostController::class, 'showPost'])->name('post.show');
