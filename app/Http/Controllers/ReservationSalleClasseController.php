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
    public function create($nomRessource)
    {
        $salleClasse = SalleClasse::where('nomRessource', $nomRessource)->first();
        return view('reservation.createSalleClasse', compact('nomRessource', 'salleClasse'));
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request , $nomRessource)
    {
        //
        $validated = $request->validate([
            'date_de_reservation' => 'required',
            'heure_de_debut' => 'required',
            'heure_de_fin' => 'required',
            'SalleClasse_ID' => 'required',
            'Utilisateur_ID' => 'required'
        ]);
        // dd($validated);

        $validated['nomRessource'] = $nomRessource;
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
