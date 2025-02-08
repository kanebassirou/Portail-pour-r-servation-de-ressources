<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\UtilisateurAutorise; // Import du modèle UtilisateurAutorise
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Events\Registered;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        // Validation des champs
        Validator::make($input, [
            'statusUser' => ['required', 'string', 'in:PATS,Directeur,PER,Etudiant'],
                        'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        // Vérification si l'email existe dans la table utilisateur_autorises
        $utilisateurAutorise = UtilisateurAutorise::where('email', $input['email'])->first();

        if (!$utilisateurAutorise) {
            throw ValidationException::withMessages([
                'email' => 'Cet utilisateur n\'est pas autorisé à s\'inscrire.',
            ]);
        }

        // Création de l'utilisateur
        $user = User::create([
            'name' => $input['name'],
            'statusUser' => $input['statusUser'], // Ajout du champ statusUser
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);

        // Assigner un rôle par défaut
        $user->assignRole('user'); // Assign "user" role
        event(new Registered($user));

        return $user;
    }
}
