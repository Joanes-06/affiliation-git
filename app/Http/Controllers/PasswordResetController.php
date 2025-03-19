<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str; // Ajout de l'importation de Str
use Carbon\Carbon; // Importation de Carbon pour la gestion du temps

class PasswordResetController extends Controller
{
    public function sendResetLink(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ], [
            'email.required' => 'Veuillez renseigner votre adresse e-mail.',
            'email.email' => 'L\'adresse e-mail saisie n\'est pas valide.',
            'email.exists' => 'Aucun compte n\'est associé à cette adresse e-mail.',
        ]);
    
        $code = random_int(100000, 999999);
        session([
            'reset_code' => $code,
            'reset_code_expires_at' => Carbon::now()->addSeconds(60),
            'email' => $request->email,
            'countdown_started' => true
        ]);
    
        Mail::to($request->email)->send(new \App\Mail\PasswordResetMail($code));
    
        return redirect()->route('password.verify')->with('status', 'Un code de réinitialisation a été envoyé.');
    }
    
    public function resendCode(Request $request)
    {
        $email = session('email');
        if (!$email) {
            return back()->withErrors(['email' => 'Aucune demande de réinitialisation trouvée.']);
        }
    
        if (session('reset_code_expires_at') && Carbon::now()->lessThan(session('reset_code_expires_at'))) {
            return back()->withErrors(['email' => 'Veuillez attendre avant de demander un nouveau code.']);
        }
    
        $code = random_int(100000, 999999);
        session([
            'reset_code' => $code,
            'reset_code_expires_at' => Carbon::now()->addSeconds(60),
            'countdown_started' => true
        ]);
    
        Mail::to($email)->send(new \App\Mail\PasswordResetMail($code));
    
        return back()->with('status', 'Un nouveau code a été envoyé.');
    }
    
    public function verifyCode(Request $request)
    {
        $request->validate([
            'code' => 'required|numeric',
        ], [
            'code.required' => 'Le code est obligatoire.',
            'code.numeric' => 'Le code doit être un nombre.',
        ]);
    
        $storedCode = session('reset_code');
        $expiresAt = session('reset_code_expires_at');
    
        if (!$storedCode || !$expiresAt || Carbon::now()->greaterThan($expiresAt)) {
            return back()->withErrors(['code' => 'Le code a expiré. Veuillez demander un nouveau code.']);
        }
    
        if ($request->code == $storedCode) {
            return redirect()->route('password.reset.form')->with('status', 'Code vérifié. Veuillez entrer votre nouveau mot de passe.');
        } else {
            return back()->withErrors(['code' => 'Le code saisi est incorrect.']);
        }
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
