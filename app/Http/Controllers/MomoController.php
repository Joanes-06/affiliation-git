<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Rules\MomoNumberRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MomoController extends Controller
{
    // Afficher le formulaire pour définir la question secrète
    public function showQuizForm()
    {
        return view('front.momo_quiz');
    }

    // Stocker la question secrète et la réponse
    public function storeQuiz(Request $request)
    {

        
        $request->validate([
            'secret_question' => 'required|string|max:255',
            'secret_answer' => 'required|string|max:255',
        ]);

        $user = Auth::user();
        $user->secret_question = $request->secret_question;
        $user->secret_answer = $request->secret_answer;
        $user->save();

        return redirect()->route('momo.add')->with('success', 'Question secrète définie avec succès.');
    }

    // Afficher le formulaire pour ajouter le numéro Mobile Money
    public function showAddMomoForm()
    {
        return view('front.momo_add');
    }

    // Stocker le numéro Mobile Money
    public function storeMomo(Request $request)
    {
        $request->validate([
            'momo' => ['required', 'string', 'max:20', new MomoNumberRule()],
        ]);
    
        $user = Auth::user();
        $user->momo = $request->momo;
        $user->save();
    
        return redirect()->route('infosPersos')->with('success', 'Votre numéro Mobile Money a été ajouté avec succès.');
    }
    
    public function updateMomo(Request $request)
    {
        $request->validate([
            'momo' => ['required', 'string', 'max:20', new MomoNumberRule()],
        ]);
    
        $user = Auth::user();
        $user->momo = $request->momo;
        $user->save();
    
        return redirect()->route('infosPersos')->with('success', 'Votre numéro Mobile Money a été mis à jour avec succès.');
    }

    // Afficher le formulaire pour répondre à la question secrète
    public function showAnswerQuizForm()
    {
        $user = Auth::user();
        return view('front.momo_answer_quiz', compact('user'));
    }

    // Vérifier la réponse à la question secrète
    public function verifyQuiz(Request $request)
    {
        $request->validate([
            'secret_answer' => 'required|string|max:255',
        ]);

        $user = Auth::user();

        if ($request->secret_answer === $user->secret_answer) {
            return redirect()->route('momo.edit')->with('success', 'Réponse correcte.');
        } else {
            return redirect()->back()->withErrors(['secret_answer' => 'La réponse est incorrecte.']);
        }
    }

    // Afficher le formulaire pour modifier le numéro Mobile Money
    public function showEditMomoForm()
    {
        $user = Auth::user();
        return view('front.momo_edit', compact('user'));
    }

  
}
