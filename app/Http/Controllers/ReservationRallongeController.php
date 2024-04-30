<?php

namespace App\Http\Controllers;

use App\Models\Rallonge;
use App\Models\Reservations_rallonge;
use App\Models\User;
use App\Notifications\RallongeReservationNotification;
use App\Notifications\UserNotification;
use Illuminate\Http\Request;

class ReservationRallongeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $rallonge = Rallonge::where('id', $id)->first();
        return view('reservation.createRallonge', compact('id', 'rallonge'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        // dd($request->all());
        $validated = $request->validate([
            'date_de_reservation' => 'required',
            'heure_de_debut' => 'required',
            'heure_de_fin' => 'required',
            'Rallonge_ID' => 'required',
            'Utilisateur_ID' => 'required', // Assurez-vous que 'users' est le nom correct de votre table des utilisateurs
        ]);
        // dd($validated);

        // Vérifier si la ressource est déjà réservée pour la plage horaire demandée
        $conflict = Reservations_rallonge::where('Rallonge_ID', $validated['Rallonge_ID'])
            ->where('date_de_reservation', $validated['date_de_reservation'])
            ->where(function ($query) use ($validated) {
                $query->whereBetween('heure_de_debut', [$validated['heure_de_debut'], $validated['heure_de_fin']])->orWhereBetween('heure_de_fin', [$validated['heure_de_debut'], $validated['heure_de_fin']]);
            })
            ->exists();

        if ($conflict) {
            // Gérer le conflit de réservation
            return redirect()->back()->with('error', 'La rallonge est déjà réservée pour cet horaire.');
        }

        // Création de la réservation de rallonge

        // Récupérer les informations de l'utilisateur
        $user = User::find($validated['Utilisateur_ID']);
        if (!$user) {
            return redirect()->back()->with('error', 'Utilisateur non trouvé.');
        }

        // Supposons que vous ayez une classe Notification dédiée aux réservations de rallonge
        // Exemple d'envoi de notification
        $rallonge = Rallonge::find($validated['Rallonge_ID']); // Assurez-vous que cette classe existe et a les propriétés nécessaires
        $user->notify(
            new UserNotification(
                $rallonge->nomRessource, // Supposons que les rallonges ont un attribut 'nom'
                'rallonge',
                $validated['date_de_reservation'], // Date de réservation

                $validated['heure_de_debut'],
                $validated['heure_de_fin'],
                'arriver 10 et recuperer la ressource reservé', // Minutes avant pour arrivée
            ),
        );
        $reservation = Reservations_rallonge::create($validated);



        return redirect()->route('ressources.index')->with('success', 'Réservation de la rallonge créée avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Reservations_rallonge $Reservations_rallonge)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $Reservations_rallonge = Reservations_rallonge::find($id);

        if (!$Reservations_rallonge) {
            // dd('Réservation non trouvée.');
            // Gérer l'erreur, par exemple, rediriger vers une page d'erreur ou afficher un message.
            return redirect()->back()->withErrors('Réservation non trouvée.');
        }

        return view('admin.reservation.editRallonge', compact('Reservations_rallonge'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservations_rallonge $Reservations_rallonge)
    {
        //
        $validated = $request->validate([
            'date_de_reservation' => 'required',
            'heure_de_debut' => 'required',
            'heure_de_fin' => 'required',
            'Rallonge_ID' => 'required',
            'Utilisateur_ID' => 'required', // Assurez-vous que 'users' est le nom correct de votre table des utilisateurs
        ]);

        // Vérifier si la ressource est déjà réservée pour la plage horaire demandée
        $conflict = Reservations_rallonge::where('Rallonge_ID', $validated['Rallonge_ID'])
            ->where('date_de_reservation', $validated['date_de_reservation'])
            ->where(function ($query) use ($validated) {
                $query->whereBetween('heure_de_debut', [$validated['heure_de_debut'], $validated['heure_de_fin']])->orWhereBetween('heure_de_fin', [$validated['heure_de_debut'], $validated['heure_de_fin']]);
            })
            ->exists();

        if ($conflict) {
            // Gérer le conflit de réservation

            return redirect()->back()->with('error', 'La rallonge est déjà réservée pour cet horaire.');
        }
        $Reservations_rallonge->update($validated);

        return redirect()->route('admin.reservationsRallonge')->with('success', 'Réservation du rallonge est modifiée avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $Reservations_rallonge = Reservations_rallonge::findOrFail($id);
        $Reservations_rallonge->delete();
        return redirect()->route('admin.reservationsRallonge')->with('success', 'Réservation du rallonge est  supprimée avec succès.');
    }
}
