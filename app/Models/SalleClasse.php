<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalleClasse extends Ressource
{
    use HasFactory;

    protected $guarded = ['id'];
    // protected $fillable = ['nomRessource', 'etatRessource', 'description','capacite', 'numero_salle'];
}
