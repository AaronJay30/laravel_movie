<?php

use App\Http\Controllers\MovieController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SocialiteController;
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

// Public routes
Route::get('/', [MovieController::class, 'index'])->name('home');
Route::get('/about', [UserController::class, 'about'])->name('users.about');
Route::get('/contact', [UserController::class, 'contact'])->name('users.contact');
Route::get('/profile', [UserController::class, 'profile'])->name('users.profile')->middleware('auth');
Route::get('/movies', [MovieController::class, 'showAllMovie'])->name('movie.show.all');


// Ajax routes
Route::post('/movies/genre', [MovieController::class, 'genreAjax']);
Route::post('/review/ajax', [ReviewController::class, 'reviewAjax']);
Route::post('/logout', [UserController::class, 'logout'])->name('users.logout');
Route::post('/users/process', [UserController::class, 'process'])->name('users.process');



// Authenticated routes with user role check
Route::middleware(['auth', 'userAuth:Admin'])->group(function () {
    Route::prefix('/admin')->name('admin.')->group(function () {
        Route::get('/', [MovieController::class, 'adminIndex'])->name('index');
        Route::post('/movie/ajax', [MovieController::class, 'adminMovieAjax']);
        Route::get('/movie/{movieID}', [MovieController::class, 'adminMovie'])->name('admin_movie');
    });
});


// Socialite route
Route::prefix('auth')->group(function () {
    Route::get('facebook', [SocialiteController::class, 'facebookpage'])->name('facebook.login');
    Route::get('facebook/callback', [SocialiteController::class, 'facebookredirect'])->name('facebook.process');
    Route::get('google', [SocialiteController::class, 'googlepage'])->name('google.login');
    Route::get('google/callback', [SocialiteController::class, 'googleredirect'])->name('google.process');
});


// Resourceful routes
Route::resources([
    'movie' => MovieController::class,
    'users' => UserController::class,
    'reviews' => ReviewController::class,
]);
