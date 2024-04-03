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
        // $rallonge1 = Rallonge::all();
        return view('reservation.createRallonge', compact('nomRessource', 'rallonge'));
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $nomRessource)
    {
        $validated = $request->validate([
            'date_de_reservation' => 'required|date',
            'heure_de_debut' => 'required|date_format:H:i',
            'heure_de_fin' => 'required|date_format:H:i|after:heure_de_debut',
            'Rallonge_ID' => 'required|exists:rallonges,id',
            'Utilisateur_ID' => 'required|exists:users,id' // Assurez-vous que 'users' est le nom correct de votre table des utilisateurs
        ]);

        // Vérifier si la ressource est déjà réservée pour la plage horaire demandée
        $conflict = Reservations_rallonge::where('Rallonge_ID', $validated['Rallonge_ID'])
            ->where('date_de_reservation', $validated['date_de_reservation'])
            ->where(function ($query) use ($validated) {
                $query->whereBetween('heure_de_debut', [$validated['heure_de_debut'], $validated['heure_de_fin']])
                      ->orWhereBetween('heure_de_fin', [$validated['heure_de_debut'], $validated['heure_de_fin']]);
            })->exists();

        if ($conflict) {
            // Gérer le conflit de réservation

            return redirect()->back()->with('error', 'La rallonge est déjà réservée pour cet horaire.');
        }

        $validated['nomRessource'] = $nomRessource;
        Reservations_rallonge::create($validated);

        return redirect()->route('ressources.index')->with('success', 'Réservation créée avec succès.');
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
