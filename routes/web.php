<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PlayerController;
use Illuminate\Support\Facades\Route;

// Homepage
Route::get('/', function () {
    return view('welcome');
});

// Dashboard met stats
Route::get('/dashboard', [PlayerController::class, 'dashboardStats'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Routes voor ingelogde gebruikers
Route::middleware('auth')->group(function () {

    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Player CRUD routes
    Route::resource('players', PlayerController::class);
});

// Auth routes (login, register, etc.)
require __DIR__.'/auth.php';