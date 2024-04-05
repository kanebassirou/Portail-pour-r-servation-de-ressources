<?php

use App\Http\Controllers\ReservationCableController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ReservationProjecteurController;
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


    Route::get('/ressources/reservation/create/{id}', [ReservationController::class, 'create'])->name('reservation.create');
    Route::post('/ressources/reservation/{id} ', [ReservationController::class, 'store'])->name('reservation.store');
    Route::resource('ressources/reservation', ReservationController::class)->except(['create', 'store'])->names('reservation');

    Route::get('/ressources/reservationSalleClasse/create/{id}', [ReservationSalleClasseController::class, 'create'])->name('reservationSalleClasse.create');
    Route::post('/ressources/reservationSalleClasse/{id} ', [ReservationSalleClasseController::class, 'store'])->name('reservationSalleClasse.store');
    Route::resource('ressources/reservationSalleClasse', ReservationSalleClasseController::class)->except(['create', 'store'])->names('reservationSalleClasse');

    Route::get('/ressources/reservationRallonge/create/{id}', [ReservationRallongeController::class, 'create'])->name('reservationRallonge.create');
    Route::post('/ressources/reservationRallonge/{id} ', [ReservationRallongeController::class, 'store'])->name('reservationRallonge.store');
    Route::resource('ressources/reservationRallonge', ReservationRallongeController::class)->except(['create', 'store'])->names('reservationRallonge');


    Route::get('/ressources/reservationCable/create/{id}', [ReservationCableController::class, 'create'])->name('reservationCable.create');
    Route::post('/ressources/reservationCable/{id} ', [ReservationCableController::class, 'store'])->name('reservationCable.store');
    Route::resource('ressources/reservationCable', reservationCableController::class)->except(['create', 'store'])->names('reservationCable');



     Route::get('/ressources/reservationProjecteur/create/{id}', [ReservationProjecteurController::class, 'create'])->name('reservationProjecteur.create');
    Route::post('/ressources/reservationProjecteur/{id} ', [ReservationProjecteurController::class, 'store'])->name('reservationProjecteur.store');
    Route::resource('ressources/reservationProjecteur', ReservationProjecteurController::class)->except(['create', 'store'])->names('reservationProjecteur');








    Route::get('reservation/recherche', [RessourceController::class, 'search'])->name('search');

});
