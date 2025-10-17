<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\CommentController;

Route::get('/posts', [PostController::class, 'index']);
Route::post('/posts', [PostController::class, 'store']);
Route::get('/posts/{id}', [PostController::class, 'show']);
Route::put('/posts/{id}', [PostController::class, 'update']);
Route::delete('/posts/{id}', [PostController::class, 'destroy']);

Route::get('/posts/comments', [PostController::class, 'store']);
Route::get('/posts/{id}/comments', [PostController::class, 'show']);
Route::put('/posts/{id}/comments', [PostController::class, 'update']);
Route::delete('/posts/{id}/comments', [PostController::class, 'destroy']);
