<?php

use App\Http\Controllers\CableController;
use App\Http\Controllers\RallongeController;
use App\Http\Controllers\ReservationCableController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ReservationProjecteurController;
use App\Http\Controllers\ReservationSalleClasseController;
use App\Http\Controllers\ReservationRallongeController;
use App\Http\Controllers\RessourceController;
use App\Http\Controllers\SalleClasseController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VideoProjecteurController;
use App\Models\reservation_projecteur;
use App\Models\Reservations_cable;
use App\Models\Reservations_rallonge;
use App\Models\Reservations_salles_classes;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    // Routes pour les rôles "user" et "admin"
    Route::group(['middleware' => ['auth', 'role:user|admin']], function () {
        // Place here the routes accessible only to users with the "user" or "admin" role
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');

        // Route pour afficher les ressources disponibles
        Route::resource('/', RessourceController::class)->names('ressources');
        Route::resource('resources', RessourceController::class)->names('ressources');

        Route::get('/ressources/reservation/create/{id}', [ReservationController::class, 'create'])->name('reservation.create');
        Route::post('/ressources/reservation/{id} ', [ReservationController::class, 'store'])->name('reservation.store');
        Route::resource('ressources/reservation', ReservationController::class)
            ->except(['create', 'store'])
            ->names('reservation');

        Route::get('/ressources/reservationSalleClasse/create/{id}', [ReservationSalleClasseController::class, 'create'])->name('reservationSalleClasse.create');
        Route::post('/ressources/reservationSalleClasse/{id} ', [ReservationSalleClasseController::class, 'store'])->name('reservationSalleClasse.store');
        Route::resource('ressources/reservationSalleClasse', ReservationSalleClasseController::class)
            ->except(['create', 'store'])
            ->names('reservationSalleClasse');

        Route::get('/ressources/reservationRallonge/create/{id}', [ReservationRallongeController::class, 'create'])->name('reservationRallonge.create');
        Route::post('/ressources/reservationRallonge/{id} ', [ReservationRallongeController::class, 'store'])->name('reservationRallonge.store');
        Route::resource('ressources/reservationRallonge', ReservationRallongeController::class)
            ->except(['create', 'store'])
            ->names('reservationRallonge');

        Route::get('/ressources/reservationCable/create/{id}', [ReservationCableController::class, 'create'])->name('reservationCable.create');
        Route::post('/ressources/reservationCable/{id}', [ReservationCableController::class, 'store'])->name('reservationCable.store');
        Route::resource('ressources/reservationCable', reservationCableController::class)
            ->except(['create', 'store'])
            ->names('reservationCable');

        Route::get('/ressources/reservationProjecteur/create/{id}', [ReservationProjecteurController::class, 'create'])->name('reservationProjecteur.create');
        Route::post('/ressources/reservationProjecteur/{id} ', [ReservationProjecteurController::class, 'store'])->name('reservationProjecteur.store');
        Route::resource('ressources/reservationProjecteur', ReservationProjecteurController::class)
            ->except(['create', 'store'])
            ->names('reservationProjecteur');

        Route::get('reservation/recherche', [RessourceController::class, 'search'])->name('search');

        Route::get('/reservations', [ReservationController::class, 'indexAllReservations'])->name('reservations.all');
    });

    Route::group(['middleware' => ['auth', 'role:admin']], function () {
        Route::get('/admin/dashboard', function () {
            $totalclasse= Reservations_salles_classes::count();
            $totalcable = Reservations_cable::count();
            $totalrallonge = Reservations_rallonge::count();
            $totalprojecteur = reservation_projecteur::count();
            $totalReservations = $totalclasse + $totalcable + $totalrallonge + $totalprojecteur;
            $totalUsers = User::count();
            return view('admin.dashboard', compact('totalUsers', 'totalReservations','totalcable','totalrallonge','totalprojecteur','totalclasse'));
        })->name('admin.dashboard');
        Route::get('/admin/dashboard/gestion/ressources', function () {
            return view('admin.ressources');
        })->name('admin.ressources');
        // Route::resource('resources', RessourceController::class)->names('ressources');

           // gestion des ressources par l'admin c'est a dire ajout, modification et suppression
        Route::resource('/admin/ressources/salleClasse', SalleClasseController::class)->names('salleClasse');
        Route::resource('/admin/ressources/rallonge', RallongeController::class)->names('rallonge');
        Route::resource('/admin/ressources/cable', CableController::class)->names('cable');
        Route::resource('/admin/ressources/projecteur', VideoProjecteurController::class)->names('projecteur');

        Route::get('admin/ressources/reservation', function () {
            return view('admin.reservation.ressource');
        })->name('admin.reservationRessource');

            // affichage des reservation de differente ressource par l'admin

        Route::get('admin/reservation/salle', [ReservationController::class, 'indexSalle'])->name('admin.reservationsSalle');
        Route::get('admin/reservation/cable', [ReservationController::class, 'indexCable'])->name('admin.reservationsCable');
        Route::get('admin/reservation/rallonge', [ReservationController::class, 'indexRallonge'])->name('admin.reservationsRallonge');
        Route::get('admin/reservation/projecteur', [ReservationController::class, 'indexProjecteur'])->name('admin.reservationsProjecteur');

        // gestion des resseration de differente ressource par l'admin
        Route::resource('admin/reservationCable', ReservationCableController::class)->names('admin.reservationCable');
        Route::resource('admin/reservationSalle', ReservationSalleClasseController::class)->names('admin.reservationSalle');
        Route::resource('admin/reservationRallonge', ReservationRallongeController::class)->names('admin.reservationRallonge');
        Route::resource('admin/reservationProjecteur', ReservationProjecteurController::class)->names('admin.reservationProjecteur');
         //  gestion des utilisateurs par l'admin c'est a dire ajout, modification et suppression et faire un utilisateur admin
        Route::resource('admin/user', UserController::class)->names('admin.users');


    });
});
