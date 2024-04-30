<?php

namespace App\Http\Controllers;

use App\Models\Cable;
use App\Models\Rallonge;
use App\Models\Reservations_salles_reunions;
use App\Models\salleReunion;
use App\Models\User;
use App\Models\VideoProjecteur;
use App\Notifications\UserNotification;
use Illuminate\Http\Request;

class ReservationSalleReunionController extends Controller
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
        $salleReunion = salleReunion::where('id', $id)->first();
        return view('reservation.createsalleReunion', compact('id', 'salleReunion'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        //
        $validated = $request->validate([
            'date_de_reservation' => 'required',
            'heure_de_debut' => 'required',
            'heure_de_fin' => 'required',
            'SalleReunion_ID' => 'required',
            'Utilisateur_ID' => 'required',
        ]);
        $conflict = Reservations_salles_reunions::where('SalleReunion_ID', $validated['SalleReunion_ID'])
            ->where('date_de_reservation', $validated['date_de_reservation'])
            ->where(function ($query) use ($validated) {
                $query->whereBetween('heure_de_debut', [$validated['heure_de_debut'], $validated['heure_de_fin']])->orWhereBetween('heure_de_fin', [$validated['heure_de_debut'], $validated['heure_de_fin']]);
            })
            ->exists();

        if ($conflict) {
            // Gérer le conflit de réservation

            return redirect()->back()->with('error', 'cette salle de reunion  est déjà réservée pour cet horaire.');
        }
        // dd($validated);

        $validated['id'] = $id;
        $user = User::find($validated['Utilisateur_ID']);
        $salleReunion = salleReunion::find($validated['SalleReunion_ID']);
        $user->notify(new UserNotification(
            $salleReunion->nomRessource, // Nom de la ressource
            'salle de reunion', // Type de ressource
            $validated['date_de_reservation'], // Date de réservation
            $validated['heure_de_debut'], // Heure de début
            $validated['heure_de_fin'], // Heure de fin
            10 // Nombre de minutes pour arriver en avance, ajustez selon besoin
        ));
        return redirect()->route('ressources.index')->with('success', 'Réservation de cette salle de reunionest  créée avec succès .');
        Reservations_salles_reunions::create($validated);

    }

    /**
     * Display the specified resource.
     */
    public function show(Reservations_salles_reunions $Reservations_salles_reunions)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $Reservations_salles_reunions = Reservations_salles_reunions::find($id);

        if (!$Reservations_salles_reunions) {
            // Gérer l'erreur, par exemple, rediriger vers une page d'erreur ou afficher un message.
            return redirect()->back()->withErrors('Réservation non trouvée.');
        }

        return view('admin.reservation.editReunion', compact('Reservations_salles_reunions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservations_salles_reunions $Reservations_salles_reunions)
    {
        //
        //
        $validated = $request->validate([
            'date_de_reservation' => 'required',
            'heure_de_debut' => 'required',
            'heure_de_fin' => 'required',
            'SalleReunion_ID' => 'required',
            'Utilisateur_ID' => 'required',
        ]);
        $conflict = Reservations_salles_reunions::where('SalleReunion_ID', $validated['SalleReunion_ID'])
            ->where('date_de_reservation', $validated['date_de_reservation'])
            ->where(function ($query) use ($validated) {
                $query->whereBetween('heure_de_debut', [$validated['heure_de_debut'], $validated['heure_de_fin']])->orWhereBetween('heure_de_fin', [$validated['heure_de_debut'], $validated['heure_de_fin']]);
            })
            ->exists();

        if ($conflict) {
            // Gérer le conflit de réservation

            return redirect()->back()->with('error', 'cette salle de reunion est déjà réservée pour cet horaire.');
        }
        // dd($validated);
        $Reservations_salles_reunions->update($validated);

        return redirect()->route('admin.reservationsReunion')->with('success', 'Réservation du salle est modifiée avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $Reservations_salle = Reservations_salles_reunions::findOrFail($id);
        $Reservations_salle->delete();
        return redirect()->route('admin.reservationsReunion')->with('success', 'Réservation du salle est  supprimée avec succès.');
    }
}
