<?php

namespace App\Actions\Fortify;

use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class CreateNewUser implements CreatesNewUsers
{
    public function create(array $input)
    {
        // Règles de validation
        $rules = [
            'Username' => ['required', 'string', 'max:255'],
            'Firstname' => ['required', 'string', 'max:255'],
            'Email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'Password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => ['required', 'string', 'max:20'],
            'Ville' => ['required', 'string', 'max:100'],
            'code_promo' => ['nullable', 'string', 'exists:users,code_promo'],
        ];
    
        $messages = [
            'Username.required' => 'Le champ Nom est requis.',
            'Username.string' => 'Le champ Nom doit être une chaîne de caractères.',
            'Username.max' => 'Le champ Nom ne doit pas dépasser 255 caractères.',

            'Firstname.required' => 'Le champ prénom est requis.',
            'Firstname.string' => 'Le champ  prénom doit être une chaîne de caractères.',
            'Firstname.max' => 'Le champ prénom ne doit pas dépasser 255 caractères.',
    
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
            
            'code_promo.exists' => 'Le code promo n\'est pas valide.',
        ];
    
        Validator::make($input, $rules, $messages)->validate();
    
        // Générer un code promo unique pour le nouvel utilisateur
        $codePromo = Str::upper(Str::random(8));
        
        // Récupérer les informations de parrainage
        $parrainageInfo = $this->getParrainageInfo($input['code_promo'] ?? null);
        
        return User::create([
            'lastname' => $input['Username'],
            'firstname' => $input['Firstname'],
            'email' => $input['Email'],
            'password' => Hash::make($input['Password']),
            'phone' => $input['phone'],
            'ville' => $input['Ville'],
            'code_promo' => $codePromo,
            'inviteur_id' => $parrainageInfo['inviteur_id'] ?? null,
            'generation1_id' => $parrainageInfo['generation1_id'] ?? null,
            'generation2_id' => $parrainageInfo['generation2_id'] ?? null,
        ]);

        // Générer le fichier VCF
        $this->generateVCFFile($user);

        return $user;
    }

    private function generateVCFFile(User $user)
    {
        $vcfContent = "BEGIN:VCARD\n";
        $vcfContent .= "VERSION:3.0\n";
        $vcfContent .= "FN:" . $user->first_name . " " . $user->last_name . " BLIX\n";
        $vcfContent .= "N:" . $user->last_name . ";" . $user->first_name . ";;;\n";
        $vcfContent .= "TEL;TYPE=CELL,VOICE:" . $user->whatsapp_number . "\n";
        $vcfContent .= "END:VCARD\n";

        // Stocker le fichier VCF avec un nom unique
        $filename = 'contacts/' . $user->id . '_' . now()->format('YmdHis') . '.vcf';
        Storage::put($filename, $vcfContent);
    }
    
    /**
     * Récupérer les informations de parrainage sur 3 générations
     */
    private function getParrainageInfo($codePromo)
    {
        if (!$codePromo) {
            return [];
        }
        
        // Trouver l'utilisateur qui a partagé son code
        $inviteur = User::where('code_promo', $codePromo)->first();
        
        if (!$inviteur) {
            return [];
        }
        
        return [
            'inviteur_id' => $inviteur->id, // L'utilisateur direct qui a partagé son code
            'generation1_id' => $inviteur->inviteur_id, // Le parrain de l'inviteur (génération 1)
            'generation2_id' => $inviteur->generation1_id, // Le parrain du parrain (génération 2)
        ];
    }
}