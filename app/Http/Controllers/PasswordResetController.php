<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;

class PasswordResetController extends Controller
{
    public function sendResetLink(Request $request)
    {
        // Validation de l'e-mail
        $request->validate(['email' => 'required|email|exists:users,email']);
        
        // Génération d'un code de vérification
        $verificationCode = rand(100000, 999999);
        
        // Envoi de l'e-mail avec le code de vérification
        Mail::to($request->email)->send(new \App\Mail\PasswordResetMail($verificationCode));
        
        // Redirection vers une page pour entrer le code
        return redirect()->route('password.verify')->with('status', 'Un code de vérification a été envoyé à votre e-mail.');
    }

    public function verifyCode(Request $request)
    {
        // Validation du code
        $request->validate(['code' => 'required|digits:6']);
        
        // Vérification du code (logique à ajouter)
        // Si le code est correct, rediriger vers la page de réinitialisation du mot de passe
        return redirect()->route('password.reset.form')->with('status', 'Code vérifié. Veuillez entrer votre nouveau mot de passe.');
    }

    public function resetPassword(Request $request)
    {
        // Validation des nouveaux mots de passe et de l'e-mail
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        // Mise à jour du mot de passe de l'utilisateur
        $user = User::where('email', $request->email)->first();
        if ($user) {
            $user->password = Hash::make($request->password);
            $user->save();
        }

        // Redirection vers la page de connexion
        return redirect()->route('login')->with('status', 'Votre mot de passe a été réinitialisé avec succès.');
    }
}
