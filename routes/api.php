<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{posts}', [PostController::class, 'show']);
Route::get('/posts', [PostController::class, 'store']);
Route::put('/posts/{id}', [PostController::class, 'update']);
Route::get('/post', [PostController::class, '']);
