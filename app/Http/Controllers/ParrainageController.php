<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ParrainageController extends Controller
{
    /**
     * Afficher les statistiques de parrainage de l'utilisateur
     */
    public function index()
    {
        $user = Auth::user();
        
        // Utilisateurs invités directement
        $directInvites = User::where('inviteur_id', $user->id)->count();
        
        // Utilisateurs de génération 1
        $gen1Invites = User::where('generation1_id', $user->id)->count();
        
        // Utilisateurs de génération 2
        $gen2Invites = User::where('generation2_id', $user->id)->count();
        
        // Calcul des pourcentages (à définir selon votre logique)
        $directPercent = 10; // exemple: 10%
        $gen1Percent = 5;    // exemple: 5%
        $gen2Percent = 2;    // exemple: 2%
        
        return view('parrainage.index', [
            'user' => $user,
            'promotionLink' => $user->promotionLink,
            'codePromo' => $user->code_promo,
            'directInvites' => $directInvites,
            'gen1Invites' => $gen1Invites,
            'gen2Invites' => $gen2Invites,
            'directPercent' => $directPercent,
            'gen1Percent' => $gen1Percent,
            'gen2Percent' => $gen2Percent,
        ]);
    }
}