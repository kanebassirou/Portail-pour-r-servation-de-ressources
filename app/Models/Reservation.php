<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reservation extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];


    // protected $fillable = [
    //     'user_id', 'ressource_id', 'date_de_reservation', 'heure_de_debut', 'heure_de_fin','status'
    // ];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function ressource() : BelongsTo
    {
        return $this->belongsTo(Ressource::class); // Assurez-vous que le modèle Ressource existe et est correctement défini
    }

}
