<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ArtistController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\GenreController;
use App\Http\Controllers\Admin\VenueController;

use App\Http\Controllers\EventController as HomeEventController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Admin panel routes
Route::middleware(['auth'])->group(function () {
    Route::resource('genres', GenreController::class);
    Route::resource('artists', ArtistController::class);
    Route::resource('venues', VenueController::class);
    Route::resource('events', EventController::class);
});

// Public routes
Route::get('/', [HomeEventController::class, 'index']);
Route::get('/events/{id}', [HomeEventController::class, 'show']);
Route::get('/search', [HomeEventController::class, 'search']);
