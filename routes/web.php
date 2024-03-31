<?php

use App\Http\Controllers\ReservationController;
use App\Http\Controllers\RessourceController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Route pour afficher les ressources disponibles
    Route::resource('/ressources', RessourceController::class)->names('ressources');
    Route::resource('ressources/reservation', ReservationController::class)->names('reservation');


});
