<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    public function create(array $input)
    {

    
        $rules = [
            'Username' => ['required', 'string', 'max:255'],
            'Email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'Password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => ['required', 'string', 'max:20'],
            'Ville' => ['required', 'string', 'max:100'],
            'parrain_id' => ['nullable', 'exists:users,id'],
        ];
    
        $messages = [
            'Username.required' => 'Le champ Nom et prénom est requis.',
            'Username.string' => 'Le champ Nom et prénom doit être une chaîne de caractères.',
            'Username.max' => 'Le champ Nom et prénom ne doit pas dépasser 255 caractères.',
    
            'Email.required' => 'Le champ Email est requis.',
            'Email.string' => 'Le champ Email doit être une chaîne de caractères.',
            'Email.email' => 'Veuillez entrer une adresse email valide.',
            'Email.max' => 'L\'adresse email ne doit pas dépasser 255 caractères.',
            'Email.unique' => 'Cette adresse email est déjà utilisée.',
    
            'Password.required' => 'Le mot de passe est requis.',
            'Password.string' => 'Le mot de passe doit être une chaîne de caractères.',
            'Password.min' => 'Le mot de passe doit avoir au moins 8 caractères.',
            'Password.confirmed' => 'Les mots de passe ne correspondent pas.',
    
            'phone.required' => 'Le numéro de téléphone est requis.',
            'phone.string' => 'Le numéro de téléphone doit être une chaîne de caractères.',
            'phone.max' => 'Le numéro de téléphone ne doit pas dépasser 20 caractères.',
    
            'Ville.required' => 'La ville est requise.',
            'Ville.string' => 'La ville doit être une chaîne de caractères.',
            'Ville.max' => 'La ville ne doit pas dépasser 100 caractères.',
        ];
    
        Validator::make($input, $rules, $messages)->validate();
    
        // Générer le code parrain et obtenir l'ID du parrain
        $codeParrain = Str::upper(Str::random(8));
        $parrainId = $this->getParrainId($input['parrain_code'] ?? null);
    
        return User::create([
            'name' => $input['Username'],
            'email' => $input['Email'],
            'password' => Hash::make($input['Password']),
            'phone' => $input['phone'],
            'ville' => $input['Ville'],
            'code_parrain' => $codeParrain,
              'parrain_id'=> $input['parrain_id'] ?? null,
        ]);
    }
    
    

    private function getParrainId($code)
{
    if ($code) {
        $parrain = User::where('code_parrain', $code)->first();
        return $parrain ? $parrain->id : null;
    }
    return null;
}
}
