<?php
// routes/web.php
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

use App\Http\Controllers\CableController;
use App\Http\Controllers\LaboratoireController;
use App\Http\Controllers\RallongeController;
use App\Http\Controllers\ReservationCableController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ReservationLaboratoireControlleur;
use App\Http\Controllers\ReservationProjecteurController;
use App\Http\Controllers\ReservationSalleClasseController;
use App\Http\Controllers\ReservationRallongeController;
use App\Http\Controllers\ReservationSalleReunionController;
use App\Http\Controllers\RessourceController;
use App\Http\Controllers\SalleClasseController;
use App\Http\Controllers\SalleReunionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VideoProjecteurController;
use App\Models\reservation_projecteur;
use App\Models\Reservations_cable;
use App\Models\Reservations_rallonge;
use App\Models\Reservations_salles_classes;
use App\Models\User;
use Illuminate\Support\Facades\Route;

// Routes de vérification des e-mails
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/resources');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Lien de vérification envoyé!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    // Routes pour les rôles "user" et "admin"
    Route::group(['middleware' => ['auth', 'role:user|admin']], function () {
        // Place here the routes accessible only to users with the "user" or "admin" role
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');

        // Route pour afficher les ressources disponibles
        Route::resource('/', RessourceController::class)->names('ressources');
        // Route::resource('resources', RessourceController::class)->names('ressources');
          // catalogue des ressources pour l'utilisateur
        Route::get('catalogue/ressources', [RessourceController::class, 'indexCatalogue'])->name('catalogue.ressources');


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
            // les reservation pour un laboratoire
        Route::get('/ressources/reservationLaboratoire/create/{id}', [ReservationLaboratoireControlleur::class, 'create'])->name('reservationLaboratoire.create');
        Route::post('/ressources/reservationLaboratoire/{id} ', [ReservationLaboratoireControlleur::class, 'store'])->name('reservationLaboratoire.store');
        Route::resource('ressources/reservationLaboratoire', ReservationLaboratoireControlleur::class)
            ->except(['create', 'store'])
            ->names('reservationLaboratoire');
            // creation de resservation de salleReunions
        Route::get('/ressources/reservationSalleReunion/create/{id}', [ReservationSalleReunionController::class, 'create'])->name('reservationSalleReunion.create');
        Route::post('/ressources/reservationSalleReunion/{id} ', [ReservationSalleReunionController::class, 'store'])->name('reservationSalleReunion.store');
        Route::resource('ressources/reservationSalleReunion', ReservationSalleReunionController::class)
            ->except(['create', 'store'])
            ->names('reservationSalleReunion');

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
        Route::resource('/admin/ressources/salleReunion', SalleReunionController::class)->names('salleReunion');
        Route::resource('/admin/ressources/rallonge', RallongeController::class)->names('rallonge');
        Route::resource('/admin/ressources/cable', CableController::class)->names('cable');
        Route::resource('/admin/ressources/projecteur', VideoProjecteurController::class)->names('projecteur');
        Route::resource('/admin/ressources/projecteur', VideoProjecteurController::class)->names('projecteur');
        Route::resource('/admin/ressources/laboratoire', LaboratoireController::class)->names('laboratoire');

        Route::get('admin/ressources/reservation', function () {
            return view('admin.reservation.ressource');
        })->name('admin.reservationRessource');



            // affichage des reservation de differente ressource par l'admin et gestion des reservation

        Route::get('admin/reservation/salle', [ReservationController::class, 'indexSalle'])->name('admin.reservationsSalle');
        Route::get('admin/reservation/reunion', [ReservationController::class, 'indexReunion'])->name('admin.reservationsReunion');
        Route::get('admin/reservation/cable', [ReservationController::class, 'indexCable'])->name('admin.reservationsCable');
        Route::get('admin/reservation/rallonge', [ReservationController::class, 'indexRallonge'])->name('admin.reservationsRallonge');
        Route::get('admin/reservation/projecteur', [ReservationController::class, 'indexProjecteur'])->name('admin.reservationsProjecteur');
        Route::get('admin/reservation/laboratoire', [ReservationController::class, 'indexLaboratoire'])->name('admin.reservationsLaboratoire');

        // gestion des resseration de differente ressource par l'admin modifiaction d'un resservation et suppression
        Route::resource('admin/reservationCable', ReservationCableController::class)->names('admin.reservationCable');
        Route::resource('admin/reservationSalle', ReservationSalleClasseController::class)->names('admin.reservationSalle');
        Route::resource('admin/reservationReunion', ReservationSalleReunionController::class)->names('admin.reservationReunion');
        Route::resource('admin/reservationRallonge', ReservationRallongeController::class)->names('admin.reservationRallonge');
        Route::resource('admin/reservationProjecteur', ReservationProjecteurController::class)->names('admin.reservationProjecteur');
        Route::resource('admin/reservationLaboratoire', ReservationLaboratoireControlleur::class)->names('admin.reservationLaboratoire');
         //  gestion des utilisateurs par l'admin c'est a dire ajout, modification et suppression et faire un utilisateur admin
        Route::resource('admin/user', UserController::class)->names('admin.users');
        // Route::get('admin.rapport/pdf', [UserController::class,'genererRapport'])->name('admin.rapport.pdf');
        Route::post('admin/rapport/generer', [UserController::class,'genererRapport'])->name('admin.rapport.generer');



    });
});
