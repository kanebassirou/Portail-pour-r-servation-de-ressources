<?php

namespace App\Http\Controllers;

use App\Models\Reservation_laboratoire;
use App\Models\reservation_projecteur;
use App\Models\Reservations_cable;
use App\Models\Reservations_rallonge;
use App\Models\Reservations_salles_classes;
use App\Models\Reservations_salles_reunions;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function genererRapport(Request $request)
    {
        // Récupération des dates du formulaire
        $startDate = $request->startDate;
        $endDate = $request->endDate;

        // Récupération des réservations pour chaque catégorie
        $reservationsSallesClasses = Reservations_salles_classes::whereBetween('date_de_reservation', [$startDate, $endDate])->get();
        $reservationRallonges = Reservations_rallonge::whereBetween('date_de_reservation', [$startDate, $endDate])->get();
        $reservationCables = Reservations_cable::whereBetween('date_de_reservation', [$startDate, $endDate])->get();
        $reservationProjecteurs = Reservation_projecteur::whereBetween('date_de_reservation', [$startDate, $endDate])->get();
        $reservationLaboratoires = Reservation_laboratoire::whereBetween('date_de_reservation', [$startDate, $endDate])->get();
        $reservationSallesReunions = Reservations_salles_reunions::whereBetween('date_de_reservation', [$startDate, $endDate])->get();

        // Vérification des données et gestion des erreurs
        if (
            $reservationsSallesClasses->isEmpty() &&
            $reservationRallonges->isEmpty() &&
            $reservationCables->isEmpty() &&
            $reservationProjecteurs->isEmpty() &&
            $reservationLaboratoires->isEmpty() &&
            $reservationSallesReunions->isEmpty()
        ) {
            return redirect()->back()->with('warning', "Aucune reservation n'est disponible pour la période sélectionnée.");
        }

        // Chargement de la vue et des données pour le PDF
        $pdf = Pdf::loadView('admin.user.rapport.index', [
            'startDate' => $startDate,
            'endDate' => $endDate,
            'reservationsSallesClasses' => $reservationsSallesClasses,
            'reservationRallonges' => $reservationRallonges,
            'reservationCables' => $reservationCables,
            'reservationProjecteurs' => $reservationProjecteurs,
            'reservationLaboratoires' => $reservationLaboratoires,
            'reservationSallesReunions' => $reservationSallesReunions,
        ]);

        // Option pour afficher dans le navigateur ou télécharger
        return $pdf->stream('rapport_reservations_' . date('Ymd') . '.pdf');
    }



    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // $users = User::all()->paginate(10);
        $users = User::with('roles')->paginate(5); // Assurez-vous de modifier la requête en conséquence

        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all(); // Utilise Role du package Spatie
        return view('admin.user.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $role = $request->role; // Assurez-vous que le nom du rôle correspond à ce que vous avez dans votre DB

        // Retirer tous les rôles existants et attribuer le nouveau rôle
        $user->syncRoles($role);

        return redirect()->route('admin.users.index')->with('success', 'Le rôle a été mis à jour.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        // Suppression de l'utilisateur
        $user->delete();

        // Redirection avec un message de succès
        return redirect()->route('admin.users.index')->with('success', 'Utilisateur supprimé avec succès.');
    }
}
