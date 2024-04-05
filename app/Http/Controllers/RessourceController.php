<?php

namespace App\Http\Controllers;

use App\Models\Cable;
use App\Models\Rallonge;
use App\Models\Ressource;
use App\Models\SalleClasse;
use App\Models\VideoProjecteur;
use Illuminate\Http\Request;

class RessourceController extends Controller
{

    public function search(Request $request)
    {
        $date = $request->date;
        $heure_debut = $request->heure_debut;
        $heure_fin = $request->heure_fin;
        $resource = $request->resource;

        // Ici, vous devez construire votre logique de recherche en fonction du type de ressource
        // et d'autres critères comme la date et l'heure.
        // Ceci est un exemple simplifié pour démarrer.

        switch ($resource) {
            case '1': // Salle de classe
                $results = SalleClasse::whereDoesntHave('reservations_salles_classes', function ($query) use ($date, $heure_debut, $heure_fin) {
                    $query->where('date_de_reservation', $date)
                          ->where(function ($query) use ($heure_debut, $heure_fin) {
                              // Réservations qui commencent ou finissent dans la plage horaire
                              $query->whereBetween('heure_de_debut', [$heure_debut, $heure_fin])
                                    ->orWhereBetween('heure_de_fin', [$heure_debut, $heure_fin])
                                    // Réservations qui commencent avant et finissent après la plage horaire
                                    ->orWhere(function ($q) use ($heure_debut, $heure_fin) {
                                        $q->where('heure_de_debut', '<', $heure_debut)
                                          ->where('heure_de_fin', '>', $heure_fin);
                                    });
                          });
                })->get();
                break;


            case '2': // Rallonge
                $results = Rallonge::whereDoesntHave('reservations_rallonges', function ($query) use ($date, $heure_debut, $heure_fin) {
                    $query->where('date_de_reservation', $date)
                          ->where(function ($query) use ($heure_debut, $heure_fin) {
                              // Réservations qui commencent ou finissent dans la plage horaire
                              $query->whereBetween('heure_de_debut', [$heure_debut, $heure_fin])
                                    ->orWhereBetween('heure_de_fin', [$heure_debut, $heure_fin])
                                    // Réservations qui commencent avant et finissent après la plage horaire
                                    ->orWhere(function ($q) use ($heure_debut, $heure_fin) {
                                        $q->where('heure_de_debut', '<', $heure_debut)
                                          ->where('heure_de_fin', '>', $heure_fin);
                                    });
                          });
                })->get();
                break;
            case '3': // VideoProjecteur
                $results = VideoProjecteur::where('disponible', true)
                                ->get();
                break;
            default:
                $results = collect();
                break;
        }

        // Retourner une vue avec les résultats. Assurez-vous d'avoir une vue appropriée pour afficher les résultats.
        return view('reservation.results', [
            'results' => $results,
            'searchParams' => $request->only(['date', 'heure_debut', 'heure_fin']),
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $salleClasses = SalleClasse::all();
        $cables = Cable::all();
        $rallonges = Rallonge::all();
        $videoProjecteurs = VideoProjecteur::all();
        return view('ressources.index', compact('salleClasses', 'rallonges', 'videoProjecteurs','cables'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Ressource $ressource)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ressource $ressource)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ressource $ressource)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ressource $ressource)
    {
        //
    }
}
