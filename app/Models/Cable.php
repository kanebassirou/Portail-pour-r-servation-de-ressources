<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cable extends Ressource
{
    use HasFactory;
    protected $guarded = ['id'];


    // protected $fillable = ['nomRessource', 'etatRessource', 'description','typeDecable', 'longueur'];
    public function reservations_cables():HasMany
    {
        return $this->hasMany(Reservations_cable::class, 'Cable_ID');
    }

}
