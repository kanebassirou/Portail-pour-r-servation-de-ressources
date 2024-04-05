<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class VideoProjecteur extends Ressource
{
    use HasFactory;

    // protected $fillable = ['nomRessource', 'etatRessource', 'description','marque', 'resolution' ];
    protected $guarded = ['id'];
    public function reservations_projecteurs():HasMany
    {
        return $this->hasMany(reservation_projecteur::class, 'Projecteur_ID');
    }
}
