<?php

namespace App\Http\Controllers;

use App\Models\Cable;
use App\Models\Rallonge;
use App\Models\Reservation;
use App\Models\SalleClasse;
use App\Models\VideoProjecteur;
use Illuminate\Http\Request;

class ReservationController extends Controller
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
        // $salleClasse = SalleClasse::where('nomRessource', $nomRessource)->first();
        // return view('reservation.create', compact('nomRessource', 'salleClasse'));
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request , $nomRessource)
    {
        //
        // $validated = $request->validate([
        //     'date_de_réservation' => 'required',
        //     'heure_de_début' => 'required',
        //     'heure_de_fin' => 'required',
        //     'Ressource_ID_Ressource' => 'required',
        //     'Utilisateur_ID_Utilisateur' => 'required'
        // ]);
        // // dd($validated);

        // $validated['nomRessource'] = $nomRessource;
        // Reservation::create($validated);

        // return redirect()->route('ressources.index')->with('success', 'Réservation créée avec succès .');
    }

    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        //
    }
}
