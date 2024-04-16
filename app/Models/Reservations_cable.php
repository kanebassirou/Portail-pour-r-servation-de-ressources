<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reservations_cable extends Reservation
{
    use HasFactory;
    protected $guarded = ['id'];


    // protected $fillable = ['nomRessource', 'etatRessource', 'description','typeDecable', 'longueur'];
    public function cables() : BelongsTo
    {
        return $this->belongsTo(Cable::class, 'Cable_ID');
    }
    public function utilisateur()
    {
        return $this->belongsTo(User::class, 'Utilisateur_ID');
    }
}
