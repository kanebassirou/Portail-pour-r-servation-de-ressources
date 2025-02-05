<?php

namespace App\Http\Controllers;

use App\Models\Cable;
use App\Models\Laboratoire;
use App\Models\Rallonge;
use App\Models\SalleClasse;
use App\Models\SalleReunion;
use App\Models\VideoProjecteur;
use Illuminate\Http\Request;

class RessourceEtatController extends Controller
{
    public function index(Request $request)
    {

        $etat = $request->query('Etat'); // Vérifie que c'est bien 'etat' et pas 'Etat'

    $salleClasses = SalleClasse::where('etat', $etat)->get();

    $cables = Cable::where('etat', $etat)->get();

    $rallonges = Rallonge::where('Etat', $etat)->get();

    $videoProjecteurs = Cable::where('etat', $etat)->get();

    $laboratoires = Laboratoire::where('etat', $etat)->get();

    $salleReunions = SalleReunion::where('etat', $etat)->get();
    // dd($etat, $salleClasses, $cables, $rallonges, $videoProjecteurs, $laboratoires, $salleReunions);



    return view('admin.etat', compact('etat', 'salleClasses', 'cables', 'rallonges', 'videoProjecteurs', 'laboratoires', 'salleReunions'));
    }
}
