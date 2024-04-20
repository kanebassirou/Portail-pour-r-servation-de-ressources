<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // $users = User::all()->paginate(10);
        $users = User::with('roles')->paginate(10);  // Assurez-vous de modifier la requête en conséquence

        return view('admin.user.index', compact('users'));
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all(); // Utilise Role du package Spatie
        return view('admin.user.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $role = $request->role; // Assurez-vous que le nom du rôle correspond à ce que vous avez dans votre DB

        // Retirer tous les rôles existants et attribuer le nouveau rôle
        $user->syncRoles($role);

        return redirect()->route('admin.users.index')->with('success', 'Le rôle a été mis à jour.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        // Suppression de l'utilisateur
        $user->delete();

        // Redirection avec un message de succès
        return redirect()->route('admin.users.index')->with('success', 'Utilisateur supprimé avec succès.');
    }

}
