<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
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

Route::get('/', [PostController::class, 'index'])
->name('posts.index');
Route::get('posts/search', [PostController::class, 'search'])
->name('posts.search');

Route::get('posts/show/{post}', [PostController::class, 'show'])
->name('posts.show');


Route::get('posts/create', [PostController::class, 'create'])
->name('posts.create')->middleware('auth');
Route::post('posts/create', [PostController::class, 'store'])
->name('posts.store')->middleware('auth');



Route::get('users/{user}', [UserController::class, 'show'])
->name('users.show');

Route::get('comments', [CommentController::class, 'create'])
->name('comments.create')->middleware('auth');
Route::post('comments/store', [CommentController::class, 'store'])
->name('comments.store')->middleware('auth');