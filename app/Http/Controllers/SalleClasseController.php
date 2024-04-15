<?php

namespace App\Http\Controllers;

use App\Models\SalleClasse;
use Illuminate\Http\Request;

class SalleClasseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()

    {
        //
        $salleClasses = SalleClasse::all();
        return view('salleClasse.index', compact('salleClasses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('salleClasse.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'nomRessource' => 'required',
            'Description' => 'required',
            'Etat' => 'required',
            'numero_salle' => 'required',
            'capacite' => 'required',
        ]);
        SalleClasse::create($validatedData);
        return redirect()->route('salleClasse.index')->with('success', 'Salle de classe créée avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(SalleClasse $salleClasse)
    {
        //
                return view('salleClasse.show', compact('salleClasse'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SalleClasse $salleClasse)
    {
        //
        return view('salleClasse.editer', compact('salleClasse'))->with('success', 'Salle de classe modifiée avec succès');


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SalleClasse $salleClasse)
    {
        //
        $validatedData = $request->validate([
            'nomRessource' => 'required',
            'Description' => 'required',
            'Etat' => 'required',
            'numero_salle' => 'required',
            'capacite' => 'required',
        ]);
        $salleClasse->update($validatedData);
        return redirect()->route('salleClasse.index')->with('success', 'Salle de classe modifiée avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SalleClasse $salleClasse)
    {
        //
        $salleClasse->delete();
        return redirect()->route('salleClasse.index')->with('success', 'Salle de classe supprimée avec succès');
    }
}
