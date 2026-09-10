<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GuestController;
use Illuminate\Support\Facades\Route;

// Form buku tamu
Route::get('/', [GuestController::class, 'create']);

Route::get('/whatsapp', [GuestController::class, 'create']);

Route::get('/instagram', [GuestController::class, 'create']);

Route::get('/facebook', [GuestController::class, 'create']);

Route::post('/guests', [GuestController::class, 'store'])
    ->name('guests.store');

// Login admin
Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');

// Halaman admin
Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::get('/guests', [GuestController::class, 'index'])
        ->name('guests.index');

});