<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Laboratoire extends Ressource
{
    use HasFactory;
    protected $guarded = ['id'];
    // protected $fillable = ['nomRessource', 'etatRessource', 'description','nomLaboratoire', 'capacite'];
    public function reservations_laboratoires()
    {
        return $this->hasMany(Reservation_laboratoire::class, 'Laboratoire_ID');
    }


}
