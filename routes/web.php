<?php

use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ReservationSalleClasseController;
use App\Http\Controllers\ReservationRallongeController;
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

    Route::get('/ressources/reservationSalleClasse/create/{nomRessource}', [ReservationSalleClasseController::class, 'create'])->name('reservationSalleClasse.create');
    Route::post('/ressources/reservationSalleClasse/{nomRessource} ', [ReservationSalleClasseController::class, 'store'])->name('reservationSalleClasse.store');
    Route::resource('ressources/reservationSalleClasse', ReservationSalleClasseController::class)->except(['create', 'store'])->names('reservationSalleClasse');

    Route::get('/ressources/reservationRallonge/create/{nomRessource}', [ReservationRallongeController::class, 'create'])->name('reservationRallonge.create');
    Route::post('/ressources/reservationRallonge/{nomRessource} ', [ReservationRallongeController::class, 'store'])->name('reservationRallonge.store');
    Route::resource('ressources/reservationRallonge', ReservationRallongeController::class)->except(['create', 'store'])->names('reservationRallonge');

    Route::get('/search', [RessourceController::class, 'search'])->name('search');

});
