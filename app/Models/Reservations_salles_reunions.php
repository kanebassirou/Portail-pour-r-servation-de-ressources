<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reservations_salles_reunions extends Reservation
{
    use HasFactory;
    protected $guarded = ['id'];


    // protected $fillable = ['nomRessource', 'etatRessource', 'description','typeDecable', 'longueur'];
    public function salleReunion() : BelongsTo
    {
        return $this->belongsTo(SalleReunion::class, 'SalleReunion_ID');
    }
    public function utilisateur()
    {
        return $this->belongsTo(User::class, 'Utilisateur_ID');
    }




}
