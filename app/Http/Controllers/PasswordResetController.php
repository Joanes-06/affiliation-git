<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str; // Ajout de l'importation de Str

class PasswordResetController extends Controller
{
    public function sendResetLink(Request $request)
    {
        // Validation de l'e-mail
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ], [
            'email.required' => 'L\'adresse email est obligatoire.',
            'email.email' => 'Veuillez entrer une adresse email valide.',
            'email.exists' => 'Aucun compte ne correspond à cet email.',
        ]);
        
        
        // Génération d'un code de réinitialisation à 6 chiffres
        $code = random_int(100000, 999999);
        
        // Envoi de l'e-mail avec le lien de réinitialisation et stockage de l'e-mail dans la session
        session(['email' => $request->email]);
        Mail::to($request->email)->send(new \App\Mail\PasswordResetMail($code));
        
        // Redirection vers une page pour entrer le code
        return redirect()->route('password.verify')->with('status', 'Un lien de réinitialisation a été envoyé à votre e-mail.');
    }

    public function verifyCode(Request $request)
    {
        // Validation du code
        $request->validate([
            'code' => 'required',
        ], [
            'code.required' => 'Le code est obligatoire.',
        ]);
        
        
        // Vérification du code (logique à ajouter)
        // Si le code est correct, rediriger vers la page de réinitialisation du mot de passe
        return redirect()->route('password.reset.form')->with('status', 'Code vérifié. Veuillez entrer votre nouveau mot de passe.');
    }

    public function showForgotPasswordForm()
    {
        return view('auth.forgot-password');
    }

    public function showResetForm(Request $request)
    {
        return view('auth.reset-password')->with(['code' => $request->session()->get('code')]);
    }

    public function resetPassword(Request $request)
    {
        // Validation des nouveaux mots de passe et de l'e-mail
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:8|confirmed',
        ], [
            'email.required' => 'L\'adresse email est obligatoire.',
            'email.email' => 'Veuillez entrer une adresse email valide.',
            'email.exists' => 'Aucun compte ne correspond à cet email.',
            
            'password.required' => 'Le mot de passe est obligatoire.',
            'password.min' => 'Le mot de passe doit contenir au moins 8 caractères.',
            'password.confirmed' => 'Les mots de passe ne correspondent pas.',
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
