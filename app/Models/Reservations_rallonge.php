<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reservations_rallonge extends Reservation
{
    use HasFactory;
    protected $guarded = ['id'];


    // protected $fillable = ['nomRessource', 'etatRessource', 'description','typeDecable', 'longueur'];
}
