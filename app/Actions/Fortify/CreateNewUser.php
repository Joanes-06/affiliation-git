<?php

namespace App\Actions\Fortify;

use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    public function validate(array $input)
    {
        return Validator::make($input, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'whatsapp_number' => ['required', 'string', 'max:20'],
            'city' => ['required', 'string', 'max:100'],
            'sponsor_code' => ['nullable', 'string', 'max:50'],
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();
    }

    public function create(array $input)
    {
        $this->validate($input);

        $user = User::create([
            'first_name' => $input['first_name'],
            'last_name' => $input['last_name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'whatsapp_number' => $input['whatsapp_number'],
            'city' => $input['city'],
            'sponsor_code' => $input['sponsor_code'] ?? null,
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
}
