<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UtilisateurAutorise extends Model
{
    use HasFactory;
    protected $fillable = [
        'prenom',
        'nom',
        'email',
        'matricule',
        'departement',
        'profil', // PATS, Directeur, PER, etc.
    ];
}
