<?php

use App\Http\Controllers\Movie;
use App\Http\Controllers\User;
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

Route::get('/', 'App\Http\Controllers\Movie@index');
Route::resource('/movie', 'App\Http\Controllers\Movie');
Route::resource('/users', 'App\Http\Controllers\User');
