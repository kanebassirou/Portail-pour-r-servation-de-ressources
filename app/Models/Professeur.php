<?php

namespace App\Models;

use App\Models\User;

class Professeur extends User
{
    // Vous pouvez ajouter des propriétés spécifiques à Professeur ici

    protected $table = 'users'; // Assurez-vous que Professeur utilise la même table que User

    // Si vous avez des colonnes supplémentaires spécifiques aux professeurs dans la table users,
    // assurez-vous de les ajouter au tableau fillable.
    protected $guarded = ['id'];

    // protected $fillable = [
    //     'name',
    //     'prenom',
    //     'email',
    //     'password', // Attributs de base de User
    //     // Ajoutez ici les nouveaux attributs spécifiques à Professeur
    //     'matiere', 'grade'
    // ];

}
