<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Rallonge extends Ressource
{
    use HasFactory;
    protected $guarded = ['id'];


    // protected $fillable = ['nomRessource', 'etatRessource', 'description','longueur', 'typeDePrise', 'nombreDePrise'];
    public function reservations_rallonges():HasMany
    {
        return $this->hasMany(reservations_rallonge::class, 'Rallonge_ID');
    }

}
