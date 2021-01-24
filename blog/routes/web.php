<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});

Route::get('/logout', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/post', [App\Http\Controllers\PostController::class, 'post'])->name('post');

Route::get('/admin', [App\Http\Controllers\AdminController::class, 'admin'])->name('admin');

Route::get('/update/{id}', [App\Http\Controllers\AdminController::class, 'update'])->name('update');

Route::post('/addSong', [App\Http\Controllers\PostController::class, 'addSong'])->name('addSong');

Route::get('/delete/{id}', [App\Http\Controllers\PostController::class, 'deletePost'])->name('deletePost');

Route::post('/search',  [App\Http\Controllers\PostController::class, 'search'])->name('search');
