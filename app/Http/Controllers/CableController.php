<?php

namespace App\Http\Controllers;

use App\Models\Cable;
use Illuminate\Http\Request;

class CableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $cables = Cable::all();
        return view('cable.index', compact('cables'));



    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('cable.create');
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
            'longueur' => 'required',
            'typeDeCable' => 'required',
            'Etat' => 'required',
        ]);

        $cable = Cable::create($validatedData);

        return redirect()->route('cable.index')->with('success', 'cette cable a été ajoutée avec succès.');




    }

    /**
     * Display the specified resource.
     */
    public function show(Cable $cable)
    {
        //
        return view('cable.show', compact('cable'));


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cable $cable)
    {
        //
        return view('cable.edit', compact('cable'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cable $cable)
    {
        //
        $validatedData = $request->validate([
            'nomRessource' => 'required',
            'Description' => 'required',
            'longueur' => 'required',
            'typeDeCable' => 'required',
            'Etat' => 'required',
        ]);
        $cable->update($validatedData);
        return redirect()->route('cable.index')->with('success', 'Ce câble a été modifié avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cable $cable)
    {
        //
        $cable->delete();
        return redirect()->route('cable.index')->with('success', 'Ce câble a été supprimé avec succès.');
    }
}
