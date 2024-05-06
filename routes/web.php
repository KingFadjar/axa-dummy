<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PhotoController;

Route::get('/', function () {
    return view('index');
});

Route::prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/posts/{userId}', [PostController::class, 'index'])->name('posts.index');
    Route::get('/albums/{userId}', [AlbumController::class, 'index'])->name('albums.index');
    Route::get('/posts/{postId}', [PostController::class, 'show'])->name('posts.show');
    Route::get('/photos/{albumId}', [PhotoController::class, 'index'])->name('photos.index');
    Route::get('/photos/{photoId}', [PhotoController::class, 'show'])->name('photos.show');

    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::put('/posts/{postId}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{postId}', [PostController::class, 'destroy'])->name('posts.destroy');

    Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::put('/comments/{commentId}', [CommentController::class, 'update'])->name('comments.update');
    Route::delete('/comments/{commentId}', [CommentController::class, 'destroy'])->name('comments.destroy');
});

