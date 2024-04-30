<?php

namespace App\Http\Controllers;

use App\Models\Cable;
use App\Models\Laboratoire;
use App\Models\Rallonge;
use App\Models\Reservation_laboratoire;
use App\Models\User;
use App\Models\VideoProjecteur;
use App\Notifications\UserNotification;
use Illuminate\Http\Request;

class ReservationLaboratoireControlleur extends Controller
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
        $laboratoire = Laboratoire::where('id', $id)->first();
        return view('reservation.createlaboratoire', compact('id', 'laboratoire'));
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request , $id)
    {
        //
        $validated = $request->validate([
            'date_de_reservation' => 'required',
            'heure_de_debut' => 'required',
            'heure_de_fin' => 'required',
            'Laboratoire_ID' => 'required',
            'Utilisateur_ID' => 'required'
        ]);
                // dd($validated);

        $conflict = Reservation_laboratoire::where('Laboratoire_ID', $validated['Laboratoire_ID'])
            ->where('date_de_reservation', $validated['date_de_reservation'])
            ->where(function ($query) use ($validated) {
                $query->whereBetween('heure_de_debut', [$validated['heure_de_debut'], $validated['heure_de_fin']])
                      ->orWhereBetween('heure_de_fin', [$validated['heure_de_debut'], $validated['heure_de_fin']]);
            })->exists();

        if ($conflict) {
            // Gérer le conflit de réservation

            return redirect()->back()->with('error', 'cette laboratoire  est déjà réservée pour cet horaire.');
        }
        // dd($validated);

        $user = User::find($validated['Utilisateur_ID']);
        if (!$user) {
            return redirect()->back()->with('error', 'Utilisateur non trouvé.');
        }
        $laboratoire = Laboratoire::find($validated['Laboratoire_ID']);
        $user->notify(new UserNotification(
            $laboratoire->nomRessource, // Supposons que les rallonges ont un attribut 'nom'
            'laboraeur',
            $validated['date_de_reservation'], // Date de réservation

            $validated['heure_de_debut'],
            $validated['heure_de_fin'],
            'arriver 10 et recuperer la ressource reservé', // Minutes avant pour arrivée
        ),
        );


        $validated['id'] = $id;
        Reservation_laboratoire::create($validated);

        return redirect()->route('ressources.index')->with('success', 'Réservation de cette Laborateur  est  créée avec succès .');
    }


    /**
     * Display the specified resource.
     */
    public function show(Reservation_laboratoire $Reservation_laboratoire)
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
        $Reservation_laboratoire = Reservation_laboratoire::find($id);

        if (!$Reservation_laboratoire) {
            // Gérer l'erreur, par exemple, rediriger vers une page d'erreur ou afficher un message.
            return redirect()->back()->withErrors('Réservation non trouvée.');
        }

        return view('admin.reservation.editLaboratoire', compact('Reservation_laboratoire'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservation_laboratoire $Reservation_laboratoire)
    {
        // dd($request->all());
        //
           //
           $validated = $request->validate([
            'date_de_reservation' => 'required',
            'heure_de_debut' => 'required',
            'heure_de_fin' => 'required',
            'Laboratoire_ID' => 'required',
            'Utilisateur_ID' => 'required'
        ]);
        // dd($validated);
        $conflict = Reservation_laboratoire::where('Laboratoire_ID', $validated['Laboratoire_ID'])
            ->where('date_de_reservation', $validated['date_de_reservation'])
            ->where(function ($query) use ($validated) {
                $query->whereBetween('heure_de_debut', [$validated['heure_de_debut'], $validated['heure_de_fin']])
                      ->orWhereBetween('heure_de_fin', [$validated['heure_de_debut'], $validated['heure_de_fin']]);
            })->exists();

        if ($conflict) {
            // Gérer le conflit de réservation

            return redirect()->back()->with('error', 'cette laboratoire  est déjà réservée pour cet horaire.');
        }
        // dd($validated);

        $Reservation_laboratoire->update($validated);

        return redirect()->route('admin.reservationsLaboratoire')->with('success', 'Réservation du loborateur est modifiée avec succès.');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $Reservations_salle = Reservation_laboratoire::findOrFail($id);
        $Reservations_salle->delete();
        return redirect()->route('admin.reservationsLaboratoire')->with('success', 'Réservation du laobratoire est  supprimée avec succès.');
    }
}
