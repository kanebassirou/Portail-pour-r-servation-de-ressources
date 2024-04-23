<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class reservation_projecteur extends Reservation
{
    use HasFactory;
    protected $guarded = ['id'];


    // protected $fillable = ['nomRessource', 'etatRessource', 'description','typeDecable', 'longueur'];
    public function projecteurs() : BelongsTo
    {
        return $this->belongsTo(VideoProjecteur::class, 'Projecteur_ID');
    }
    public function utilisateur()
    {
        return $this->belongsTo(User::class, 'Utilisateur_ID');
    }
}
