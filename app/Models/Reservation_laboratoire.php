<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reservation_laboratoire extends Reservation
{
    use HasFactory;
    protected $guarded = ['id'];


    // protected $fillable = ['nomRessource', 'etatRessource', 'description','typeDecable', 'longueur'];
    public function laboratoires() : BelongsTo
    {
        return $this->belongsTo(Laboratoire::class, 'Laboratoire_ID');
    }
    public function utilisateur()
    {
        return $this->belongsTo(User::class, 'Utilisateur_ID');
    }




}
