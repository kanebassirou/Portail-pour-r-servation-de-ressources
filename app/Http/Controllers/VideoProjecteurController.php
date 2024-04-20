<?php

namespace App\Http\Controllers;

use App\Models\VideoProjecteur;
use Illuminate\Http\Request;

class VideoProjecteurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $projecteurs = VideoProjecteur::paginate(10);
        return view('projecteur.index', compact('projecteurs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('projecteur.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'nomRessource' => 'required',
            // 'marque' => 'required',
            'modele' => 'required',
            // 'etat' => 'required',
            'resolution' => 'required',
        ]);
        $videoProjecteur = VideoProjecteur::create($validatedData);
        return redirect()->route('projecteur.index')->with('success', 'Le video projecteur a été ajouté avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(VideoProjecteur $projecteur)
    {
        //
        return view('projecteur.show', compact('projecteur'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VideoProjecteur $projecteur)
    {
        //
        return view('projecteur.edit', compact('projecteur'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, VideoProjecteur $projecteur)
    {
        //
        $validatedData = $request->validate([
            'nomRessource' => 'required',
            // 'marque' => 'required',
            'modele' => 'required',
            // 'etat' => 'required',
            'resolution' => 'required',
        ]);
        $projecteur->update($validatedData);
        return redirect()->route('projecteur.index')->with('success', 'Le video projecteur a été modifié avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VideoProjecteur $projecteur)
    {
        //
        $projecteur->delete();
        return redirect()->route('projecteur.index')->with('success', 'Le video projecteur a été supprimé avec succès.');
    }
}
