<?php

namespace App\Http\Controllers;

use App\Models\Cable;
use App\Models\Rallonge;
use App\Models\Reservations_cable;
use App\Models\Reservations_rallonge;
use App\Models\User;
use App\Notifications\UserNotification;
use Illuminate\Http\Request;

class ReservationCableController extends Controller
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
        $cable = Cable::where('id', $id)->first();
        return view('reservation.createCable', compact('id', 'cable', ));
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
            'Cable_ID' => 'required|exists:cables,id',
            'Utilisateur_ID' => 'required|exists:users,id' // Assurez-vous que 'users' est le nom correct de votre table des utilisateurs
        ]);

        // Vérifier si la ressource est déjà réservée pour la plage horaire demandée
        $conflict = Reservations_cable::where('Cable_ID', $validated['Cable_ID'])
            ->where('date_de_reservation', $validated['date_de_reservation'])
            ->where(function ($query) use ($validated) {
                $query->whereBetween('heure_de_debut', [$validated['heure_de_debut'], $validated['heure_de_fin']])
                      ->orWhereBetween('heure_de_fin', [$validated['heure_de_debut'], $validated['heure_de_fin']]);
            })->exists();

        if ($conflict) {
            // Gérer le conflit de réservation

            return redirect()->back()->with('error', 'cette cable est déjà réservée pour cet horaire.');
        }

        $user = User::find($validated['Utilisateur_ID']);
        if (!$user) {
            return redirect()->back()->with('error', 'Utilisateur non trouvé.');
        }
        $cable = Cable::find($validated['Cable_ID']);
        $user->notify(
            new UserNotification(
                $cable->nomRessource, // Supposons que les rallonges ont un attribut 'nom'
                'Câble',
                $validated['date_de_reservation'], // Date de réservation

                $validated['heure_de_debut'],
                $validated['heure_de_fin'],
                'arriver 10 et recuperer la ressource reservé', // Minutes avant pour arrivée
            ),
        );

        $validated['id'] = $id;
        Reservations_cable::create($validated);



        return redirect()->route('ressources.index')->with('success', 'Réservation du cable est  créée avec succès.');
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
    public function edit($id) {
        $Reservations_cable = Reservations_cable::find($id);

        if (!$Reservations_cable) {
            // Gérer l'erreur, par exemple, rediriger vers une page d'erreur ou afficher un message.
            return redirect()->back()->withErrors('Réservation non trouvée.');
        }

        return view('admin.reservation.editCable', compact('Reservations_cable'));
    }

    /**
     * Update the specified resource in storage.
     */
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservations_cable $Reservations_cable)
    {
        $validated = $request->validate([
            'date_de_reservation' => 'required',
            'heure_de_debut' => 'required',
            'heure_de_fin' => 'required',
            'Cable_ID' => 'required',
            'Utilisateur_ID' => 'required' // Assurez-vous que 'users' est le nom correct de votre table des utilisateurs
        ]);
        // dd($validated);

        // Vérifier si la ressource est déjà réservée pour la plage horaire demandée
        $conflict = Reservations_cable::where('Cable_ID', $validated['Cable_ID'])
            ->where('date_de_reservation', $validated['date_de_reservation'])
            ->where(function ($query) use ($validated) {
                $query->whereBetween('heure_de_debut', [$validated['heure_de_debut'], $validated['heure_de_fin']])
                      ->orWhereBetween('heure_de_fin', [$validated['heure_de_debut'], $validated['heure_de_fin']]);
            })->where('id', '!=', $Reservations_cable->id)->exists();
            // dd($conflict);

        if ($conflict) {
            // Gérer le conflit de réservation
            // dd("ok");
            return redirect()->back()->with('error', 'cette cable est déjà réservée pour cet horaire.');
        }

        $Reservations_cable->update($validated);

        return redirect()->route('admin.reservationsCable')->with('success', 'Réservation du cable est modifiée avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $Reservations_cable = Reservations_cable::findOrFail($id);
        $Reservations_cable->delete();
        return redirect()->route('admin.reservationsCable')->with('success', 'Réservation du câble supprimée avec succès.');
    }




}
