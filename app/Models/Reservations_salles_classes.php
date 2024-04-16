<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reservations_salles_classes extends Reservation
{
    use HasFactory;
    protected $guarded = ['id'];


    // protected $fillable = ['nomRessource', 'etatRessource', 'description','typeDecable', 'longueur'];
    public function salleClasse() : BelongsTo
    {
        return $this->belongsTo(SalleClasse::class, 'SalleClasse_ID');
    }
    public function utilisateur()
    {
        return $this->belongsTo(User::class, 'Utilisateur_ID');
    }




}
