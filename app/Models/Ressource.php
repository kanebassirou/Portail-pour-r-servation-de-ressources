<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ressource extends Model
{
    use HasFactory;
    protected $guarded = ['id'];



    public function reservations() : HasMany
    {
        return $this->hasMany(Reservation::class);
    }
}
