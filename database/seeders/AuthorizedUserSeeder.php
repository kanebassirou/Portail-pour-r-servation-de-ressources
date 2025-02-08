<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\UtilisateurAutorise;
use Illuminate\Database\Seeder;

class AuthorizedUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
        //
        public function run()
    {
        UtilisateurAutorise::create([
            'prenom' => 'Mouhamadou',
            'nom' => 'Thiam',
            'email' => 'mthiam@univ-thies.sn',
            'profil' => 'PER',
            'matricule' => '12345',
            'departement' => 'Informatique',
        ]);

        UtilisateurAutorise::create([
            'prenom' => 'Diadioly',
            'nom' => 'Gassama',
            'email' => 'dgassama@univ-thies.sn',
            'profil' => 'PER',
            'matricule' => '12346',
            'departement' => 'Sciences',
        ]);
    }
}
