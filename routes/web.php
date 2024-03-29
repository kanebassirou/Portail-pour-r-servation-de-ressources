<?php

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
    Route::get('/ressources', [RessourceController::class, 'index'])->name('ressources');

});
