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


    Route::get('/ressources/reservation/create/{nomRessource}', [ReservationController::class, 'create'])->name('reservation.create');
    Route::post('/ressources/reservation/{nomRessource} ', [ReservationController::class, 'store'])->name('reservation.store');

    Route::resource('ressources/reservation', ReservationController::class)->except(['create', 'store'])->names('reservation');

});
