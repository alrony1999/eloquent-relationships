<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class,'index'])->name('home');
Route::get('users/profile/{profile}', [ProfileController::class,'show'])->name('profile');
Route::get('users/{id}/posts', [PostController::class,'index'])->name('posts');
Route::get('posts/{id}', [PostController::class,'show'])->name('post');
Route::get('users/{id}/books', [BookController::class,'index'])->name('books');
Route::get('books/{id}', [BookController::class,'show'])->name('book');

Route::get('fetch-author-post/{id}', [PostController::class,'fetchPost']);
Route::post('author/addpost', [PostController::class,'store']);
Route::get('posts/edit/{author_id}/{id}', [PostController::class,'edit']);
Route::put('posts/update/{id}', [PostController::class,'update']);
Route::delete('posts/delete/{id}', [PostController::class,'destroy']);
