<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cable extends Ressource
{
    use HasFactory;
    protected $guarded = ['id'];


    // protected $fillable = ['nomRessource', 'etatRessource', 'description','typeDecable', 'longueur'];
}
