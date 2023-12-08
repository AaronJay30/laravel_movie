<?php

use App\Http\Controllers\MovieController;
use App\Http\Controllers\ReviewController;
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
Route::resource('/reviews', 'App\Http\Controllers\ReviewController');


Route::post('/users/process', [UserController::class, 'process'])->name('users.process');


Route::get('/about', [UserController::class, 'about'])->name('users.about');
Route::get('/contact', [UserController::class, 'contact'])->name('users.contact');

Route::get('/movies', [MovieController::class, 'showAllMovie'])->name('movie.show.all');


Route::post('/movies/genre', [MovieController::class, 'genreAjax']);
Route::post('/review/ajax', [ReviewController::class, 'reviewAjax']);

Route::get('/admin', [MovieController::class, 'adminIndex'])->name('admin.index');
Route::post('/admin/movie/ajax', [MovieController::class, 'adminMovieAjax']);

Route::get('/admin_movie/{movieID}', [MovieController::class, 'adminMovie'])->name('admin.admin_movie');