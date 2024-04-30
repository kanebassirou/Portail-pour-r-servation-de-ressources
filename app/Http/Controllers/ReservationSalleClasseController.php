<?php

namespace App\Http\Controllers;

use App\Models\Cable;
use App\Models\Rallonge;
use App\Models\Reservations_salles_classes;
use App\Models\SalleClasse;
use App\Models\User;
use App\Models\VideoProjecteur;
use App\Notifications\UserNotification;
use Illuminate\Http\Request;

class ReservationSalleClasseController extends Controller
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
        $salleClasse = SalleClasse::where('id', $id)->first();
        return view('reservation.createSalleClasse', compact('id', 'salleClasse'));
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        $validated = $request->validate([
            'date_de_reservation' => 'required',
            'heure_de_debut' => 'required',
            'heure_de_fin' => 'required',
            'SalleClasse_ID' => 'required',
            'Utilisateur_ID' => 'required',
        ]);

        $conflict = Reservations_salles_classes::where('SalleClasse_ID', $validated['SalleClasse_ID'])
            ->where('date_de_reservation', $validated['date_de_reservation'])
            ->where(function ($query) use ($validated) {
                $query->whereBetween('heure_de_debut', [$validated['heure_de_debut'], $validated['heure_de_fin']])
                      ->orWhereBetween('heure_de_fin', [$validated['heure_de_debut'], $validated['heure_de_fin']]);
            })->exists();

        if ($conflict) {
            return redirect()->back()->with('error', 'Cette salle de classe est déjà réservée pour cet horaire.');
        }

        $user = User::find($validated['Utilisateur_ID']);

        if (!$user) {
            return redirect()->back()->with('error', 'Utilisateur non trouvé.');
        }

        // Ici, nous devons récupérer des informations sur la salle pour compléter la notification
        $salle = SalleClasse::find($validated['SalleClasse_ID']);

        // Notification avec détails complets
        $user->notify(new UserNotification(
            $salle->nomRessource, // Nom de la ressource
            'salle de classe', // Type de ressource
            $validated['date_de_reservation'], // Date de réservation
            $validated['heure_de_debut'], // Heure de début
            $validated['heure_de_fin'], // Heure de fin
            10 // Nombre de minutes pour arriver en avance, ajustez selon besoin
        ));
        $reservation = Reservations_salles_classes::create($validated);


        return redirect()->route('ressources.index')->with('success', 'Réservation créée avec succès.');
    }

    public function show(Reservations_salles_classes $Reservations_salles_classes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id) {
        $Reservations_salles_classes = Reservations_salles_classes::find($id);

        if (!$Reservations_salles_classes) {
            // Gérer l'erreur, par exemple, rediriger vers une page d'erreur ou afficher un message.
            return redirect()->back()->withErrors('Réservation non trouvée.');
        }

        return view('admin.reservation.editSalle', compact('Reservations_salles_classes'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservations_salles_classes $Reservations_salles_classes)
    {
        //
           //
           $validated = $request->validate([
            'date_de_reservation' => 'required',
            'heure_de_debut' => 'required',
            'heure_de_fin' => 'required',
            'SalleClasse_ID' => 'required',
            'Utilisateur_ID' => 'required'
        ]);
        $conflict = Reservations_salles_classes::where('SalleClasse_ID', $validated['SalleClasse_ID'])
            ->where('date_de_reservation', $validated['date_de_reservation'])
            ->where(function ($query) use ($validated) {
                $query->whereBetween('heure_de_debut', [$validated['heure_de_debut'], $validated['heure_de_fin']])
                      ->orWhereBetween('heure_de_fin', [$validated['heure_de_debut'], $validated['heure_de_fin']]);
            })->exists();

        if ($conflict) {
            // Gérer le conflit de réservation

            return redirect()->back()->with('error', 'cette salle de classe  est déjà réservée pour cet horaire.');
        }
        // dd($validated);
        $Reservations_salles_classes->update($validated);

        return redirect()->route('admin.reservationsSalle')->with('success', 'Réservation du salle est modifiée avec succès.');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $Reservations_salle = Reservations_salles_classes::findOrFail($id);
        $Reservations_salle->delete();
        return redirect()->route('admin.reservationsSalle')->with('success', 'Réservation du salle est  supprimée avec succès.');
    }
}
