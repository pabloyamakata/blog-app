<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/' , [PostController::class, 'index'])->name('posts.index');

Route::controller(AuthController::class)->group(function() {
    Route::get('login', 'login')->name('auth.login');
    Route::post('login', 'authenticate')->name('auth.authenticate');
    Route::get('registration', 'registration')->name('auth.registration');
    Route::post('registration', 'register')->name('auth.register');
    Route::post('logout', 'logout')->name('auth.logout');
});
