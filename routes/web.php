<?php

use App\Http\Controllers\MovieController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [MovieController::class, 'index']);
Route::resource('/movie', 'App\Http\Controllers\MovieController');
Route::resource('/users', 'App\Http\Controllers\UserController');
Route::post('/users/process', [UserController::class, 'process'])->name('users.process');
Route::get('/users/about', [UserController::class, 'about'])->name('users.aboutUs');

Route::get('/movies', [MovieController::class, 'showAllMovie'])->name('movie.show.all');
Route::post('/movies/genre', [MovieController::class, 'genreAjax']);
