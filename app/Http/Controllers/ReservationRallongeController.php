<?php

namespace App\Http\Controllers;

use App\Models\Rallonge;
use App\Models\Reservations_rallonge;
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
    public function create($nomRessource)
    {
        $rallonge = Rallonge::where('nomRessource', $nomRessource)->first();
        return view('reservation.createRallonge', compact('nomRessource', 'rallonge'));
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
            'Rallonge_ID' => 'required',
            'Utilisateur_ID' => 'required'
        ]);
        // dd($validated);

        $validated['nomRessource'] = $nomRessource;
        Reservations_rallonge::create($validated);

        return redirect()->route('ressources.index')->with('success', 'Réservation créée avec succès .');
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
    public function edit(Reservations_rallonge $Reservations_rallonge)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservations_rallonge $Reservations_rallonge)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservations_rallonge $reservation)
    {
        //
    }
}
