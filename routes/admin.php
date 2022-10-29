<?php

use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\PostController;
use App\Http\Controllers\admin\TagController;
use App\Http\Controllers\admin\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('admin.index');
Route::resource('users', UserController::class)->only(['index', 'edit', 'update'])->names('admin.users');
Route::resource('categories', CategoryController::class)->names('admin.categories');
Route::resource('tags', TagController::class)->names('admin.tags');
Route::resource('posts', PostController::class)->names('admin.posts');
