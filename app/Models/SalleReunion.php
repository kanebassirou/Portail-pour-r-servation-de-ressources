<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SalleReunion extends Ressource
{
    use HasFactory;

    protected $guarded = ['id'];
    // protected $fillable = ['nomRessource', 'etatRessource', 'description','capacite', 'numero_salle'];

    public function reservations_salles_reunions():HasMany
    {
        return $this->hasMany(Reservations_salles_reunions::class, 'SalleReunion_ID');
    }
}
