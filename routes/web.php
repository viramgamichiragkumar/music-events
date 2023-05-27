<?php

use App\Http\Controllers\Admin\GenreController;
use App\Http\Controllers\Admin\ArtistController;
use App\Http\Controllers\Admin\VenueController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\EventController as PublicEventController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Public routes
// Route::get('/', [PublicEventController::class, 'index'])->name('home');
// Route::get('/events/{event?}', [PublicEventController::class, 'show'])->name('events.show');
// Route::get('/search', [PublicEventController::class, 'search'])->name('events.search');

Route::get('/', [PublicEventController::class, 'index'])->name('home');
Route::get('/events/{event}', [PublicEventController::class, 'show'])->name('events.show');
Route::get('/search', [PublicEventController::class, 'search'])->name('events.search');
Route::get('/filter', [PublicEventController::class, 'filter'])->name('events.filter');

// Admin routes
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::view('/', 'admin.index');
    Route::resource('genres', GenreController::class);
    Route::resource('artists', ArtistController::class);
    Route::resource('venues', VenueController::class);
    Route::resource('events', EventController::class);
});

// Authentication routes
Auth::routes();

?>