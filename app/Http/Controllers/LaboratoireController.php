<?php

namespace App\Http\Controllers;

use App\Models\Laboratoire;
use Illuminate\Http\Request;

class LaboratoireController extends Controller
{

        /**
         * Display a listing of the resource.
         */
        public function index()

        {
            //
            $laboratoires = Laboratoire::paginate(10);
            return view('laboratoire.index', compact('laboratoires'));
        }

        /**
         * Show the form for creating a new resource.
         */
        public function create()
        {
            return view('laboratoire.create');
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
                'capacite' => 'required',
                'nomLaboratoire' => 'required',
            ]);
            laboratoire::create($validatedData);
            return redirect()->route('laboratoire.index')->with('success', 'laboratoire creer avec succee créée avec succès');
        }

        /**
         * Display the specified resource.
         */
        public function show(laboratoire $laboratoire)
        {
            //
                    return view('laboratoire.show', compact('laboratoire'));


        }

        /**
         * Show the form for editing the specified resource.
         */
        public function edit(laboratoire $laboratoire)
        {
            //
            return view('laboratoire.edit', compact('laboratoire'))->with('success', 'Salle de classe modifiée avec succès');


        }

        /**
         * Update the specified resource in storage.
         */
        public function update(Request $request, laboratoire $laboratoire)
        {
            //
            $validatedData = $request->validate([
                'nomRessource' => 'required',
                'Description' => 'required',
                'Etat' => 'required',
                'capacite' => 'required',
                'nomLaboratoire' => 'required',
            ]);
            $laboratoire->update($validatedData);
            return redirect()->route('laboratoire.index')->with('success', 'Salle de classe modifiée avec succès');
        }

        /**
         * Remove the specified resource from storage.
         */
        public function destroy(laboratoire $laboratoire)
        {
            //
            $laboratoire->delete();
            return redirect()->route('laboratoire.index')->with('success', 'laboratoire supprimée avec succès');
        }
    }

