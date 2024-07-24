<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Auth::routes();

Route::get('/', [App\Http\Controllers\PostController::class, 'index'])
->name('posts.index');

Route::get('posts/show/{post}', [App\Http\Controllers\PostController::class, 'show'])
->name('posts.show');

Route::get('posts/create', [App\Http\Controllers\PostController::class, 'create'])
->name('posts.create');
Route::post('posts/create', [App\Http\Controllers\PostController::class, 'store'])
->name('posts.store');
