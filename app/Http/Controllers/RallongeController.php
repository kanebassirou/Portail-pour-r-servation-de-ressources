<?php

namespace App\Http\Controllers;

use App\Models\Rallonge;
use Illuminate\Http\Request;

class RallongeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()

    {
        //
        $rallonges = Rallonge::all();
        return view('rallonge.index', compact('rallonges'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('rallonge.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nomRessource' => 'required',
            'nombreDePrise' => 'required',
            'Description' => 'required',
            'longueur' => 'required',
            'typeDePrise' => 'required',
            'Etat' => 'required',
        ]);
        $rallonge = Rallonge::create($validatedData);


        return redirect()->route('rallonge.index')->with('success', 'La rallonge a été ajoutée avec succès.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Rallonge $rallonge)
    {
        //
        return view('rallonge.show', compact('rallonge'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rallonge $rallonge)
    {
        //
        return view('rallonge.edit', compact('rallonge'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rallonge $rallonge)
    {
        //
        $validatedData = $request->validate([
            'nomRessource' => 'required',
            'nombreDePrise' => 'required',
            'Description' => 'required',
            'longueur' => 'required',
            'typeDePrise' => 'required',
            'Etat' => 'required',
        ]);
        $rallonge->update($validatedData);
        return redirect()->route('rallonge.index')->with('success', 'La rallonge a été modifiée avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rallonge $rallonge)
    {
        //
        $rallonge->delete();

        return redirect()->route('rallonge.index')->with('success', 'Rallonge supprimée avec succès');

    }
}
