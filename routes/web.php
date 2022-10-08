<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CommentsController;

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

Route::get('/', function () {
    return view('/auth/login');
});

Route::get('/register', function () {
    return view('register');
});
Route::get('/login', function () {
    return view('/passwords/auth/login');
});

Route::resource('posts', PostsController::class);
Route::post('posts/create', [PostsController::class, 'store'])->name('posts.create');
Route::post('posts/delete', [PostsController::class,'destroy'])->name('posts.delete');


Route::resource('comments', CommentsController::class);
Route::post('comments/create', [CommentsController::class, 'store'])->name('comments.create');
Route::post('comments/delete', [CommentsController::class,'destroy'])->name('comments.delete');


Auth::routes();

Route::resource('home', HomeController::class);
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/users/profile/{id}', [HomeController::class, 'show'])->name('show.users');
Route::get('/users/update/{id}', [HomeController::class, 'update'])->name('update.users');

Route::resource('profile', ProfileController::class);
Route::post('profile/create', [CommentsController::class, 'store'])->name('profile.store');


