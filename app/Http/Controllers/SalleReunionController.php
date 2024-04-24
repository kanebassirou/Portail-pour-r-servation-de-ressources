<?php

namespace App\Http\Controllers;

use App\Models\salleReunion;
use Illuminate\Http\Request;

class SalleReunionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()

    {
        //
        $salleReunions = salleReunion::paginate(10);
        return view('salleReunion.index', compact('salleReunions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('salleReunion.create');
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
        salleReunion::create($validatedData);
        return redirect()->route('salleReunion.index')->with('success', 'Salle de classe créée avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(salleReunion $salleReunion)
    {
        //
                return view('salleReunion.show', compact('salleReunion'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(salleReunion $salleReunion)
    {
        //
        return view('salleReunion.editer', compact('salleReunion'))->with('success', 'Salle de reunion modifiée avec succès');


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, salleReunion $salleReunion)
    {
        //
        $validatedData = $request->validate([
            'nomRessource' => 'required',
            'Description' => 'required',
            'Etat' => 'required',
            'numero_salle' => 'required',
            'capacite' => 'required',
        ]);
        $salleReunion->update($validatedData);
        return redirect()->route('salleReunion.index')->with('success', 'Salle de reunion modifiée avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(salleReunion $salleReunion)
    {
        //
        $salleReunion->delete();
        return redirect()->route('salleReunion.index')->with('success', 'Salle de classe supprimée avec succès');
    }
}
