<?php

use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::middleware(['web'])->group(function () {
    // Get home.
    Route::get('/', [PostController::class, 'showHome'])->name('home');

    // Show a single post.
    Route::get('/post/{slug}/{id}', [PostController::class, 'showPost'])->name('post.show');

    // Login and logout routes.
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware(['web', 'auth'])->group(function () {
    // Dashboard.
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // Posts.
    Route::get('/posts', [AdminPostController::class, 'listPosts'])->name('admin.posts.index');
});
