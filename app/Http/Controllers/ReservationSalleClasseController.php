<?php

namespace App\Http\Controllers;

use App\Models\Cable;
use App\Models\Rallonge;
use App\Models\Reservations_salles_classes;
use App\Models\SalleClasse;
use App\Models\VideoProjecteur;
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
    public function store(Request $request , $id)
    {
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

            return redirect()->back()->with('error', 'Le salle de classe  est déjà réservée pour cet horaire.');
        }
        // dd($validated);

        $validated['id'] = $id;
        Reservations_salles_classes::create($validated);

        return redirect()->route('ressources.index')->with('success', 'Réservation créée avec succès .');
    }


    /**
     * Display the specified resource.
     */
    public function show(Reservations_salles_classes $Reservations_salles_classes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservations_salles_classes $Reservations_salles_classes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservations_salles_classes $Reservations_salles_classes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservations_salles_classes $reservation)
    {
        //
    }
}
