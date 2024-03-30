<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class VideoProjecteur extends Ressource
{
    use HasFactory;

    // protected $fillable = ['nomRessource', 'etatRessource', 'description','marque', 'resolution' ];
    protected $guarded = ['id'];


}
