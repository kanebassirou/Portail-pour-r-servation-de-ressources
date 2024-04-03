<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SalleClasse extends Ressource
{
    use HasFactory;

    protected $guarded = ['id'];
    // protected $fillable = ['nomRessource', 'etatRessource', 'description','capacite', 'numero_salle'];

    public function reservations_salles_classes():HasMany
    {
        return $this->hasMany(Reservations_salles_classes::class, 'SalleClasse_ID');
    }
}
