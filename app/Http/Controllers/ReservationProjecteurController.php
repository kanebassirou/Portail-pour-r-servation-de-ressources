<?php

namespace App\Http\Controllers;

use App\Models\Cable;
use App\Models\Rallonge;
use App\Models\reservation_projecteur;
use App\Models\Reservations_cable;
use App\Models\Reservations_rallonge;
use App\Models\VideoProjecteur;
use Illuminate\Http\Request;

class ReservationProjecteurController extends Controller
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
        $projecteur = VideoProjecteur::where('id', $id)->first();
        return view('reservation.createProjecteur', compact('id', 'projecteur'));
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        $validated = $request->validate([
            'date_de_reservation' => 'required|date',
            'heure_de_debut' => 'required|date_format:H:i',
            'heure_de_fin' => 'required|date_format:H:i|after:heure_de_debut',
            'Projecteur_ID' => 'required|exists:video_projecteurs,id',
            'Utilisateur_ID' => 'required|exists:users,id' // Assurez-vous que 'users' est le nom correct de votre table des utilisateurs
        ]);

        // Vérifier si la ressource est déjà réservée pour la plage horaire demandée
        $conflict = reservation_projecteur::where('Projecteur_ID', $validated['Projecteur_ID'])
            ->where('date_de_reservation', $validated['date_de_reservation'])
            ->where(function ($query) use ($validated) {
                $query->whereBetween('heure_de_debut', [$validated['heure_de_debut'], $validated['heure_de_fin']])
                      ->orWhereBetween('heure_de_fin', [$validated['heure_de_debut'], $validated['heure_de_fin']]);
            })->exists();

        if ($conflict) {
            // Gérer le conflit de réservation

            return redirect()->back()->with('error', 'cette video-projecteur  est déjà réservée pour cet horaire.');
        }

        $validated['id'] = $id;
        reservation_projecteur::create($validated);

        return redirect()->route('ressources.index')->with('success', 'Réservation du video-projecteur est  créée avec succès.');
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