<?php

namespace App\Http\Controllers;

use App\Models\UtilisateurAutorise;
use Illuminate\Http\Request;

class UtilisateurAutoriseController extends Controller
{

    public function index()
    {
        $utilisateurs = UtilisateurAutorise::paginate(10);
        return view('admin.user.listeUtilisateurAutorise', compact('utilisateurs'));
    }


    /**
     * Affiche le formulaire de création d'utilisateur autorisé.
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Stocke un nouvel utilisateur autorisé dans la base de données.
     */
    public function store(Request $request)
    {
        $request->validate([
            'prenom' => 'required|string|max:255',
            'nom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:utilisateur_autorises',
            'matricule' => 'required|string|max:255',
            'departement' => 'required|string|max:255',
            'profil' => 'required|string|max:255',
        ]);

        UtilisateurAutorise::create($request->all());

        return redirect()->route('admin.users.liste')->with('success', 'Utilisateur autorisé ajouté avec succès.');
    }



    public function edit($id)
    {
        $utilisateur = UtilisateurAutorise::findOrFail($id);
        return view('admin.user.userAutoriserEdit', compact('utilisateur'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'prenom' => 'required|string|max:255',
            'nom' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'profil' => 'required|string|max:255',
            'matricule' => 'required|string|max:255',
            'departement' => 'required|string|max:255',
        ]);

        $utilisateur = UtilisateurAutorise::findOrFail($id);
        $utilisateur->update($validated);

        return redirect()->route('admin.users.liste')->with('success', 'Utilisateur autorisé mis à jour avec succès.');
    }

    public function destroy($id)
    {
        $utilisateur = UtilisateurAutorise::findOrFail($id);
        $utilisateur->delete();

        return redirect()->route('admin.users.liste')->with('success', 'Utilisateur autorisé supprimé avec succès.');
    }

}
