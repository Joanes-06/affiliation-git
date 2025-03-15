<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Souscription; // Modèle "Souscription"
use Illuminate\Support\Facades\Log;
use FedaPay\FedaPay;
use FedaPay\Transaction;
use FedaPay\Customer;

class SouscriptionController extends Controller
{
    public function index(){
        return view('front.dashboard_accueil');
    }
    
    public function handleFedaCallback(Request $request)
    {
        Log::info('FedaPay Callback reçu', $request->all());
    
        try {
            // Valider les données reçues
            $validated = $request->validate([
                'transaction-id' => 'required|string',
                'transaction-status' => 'required|string',
            ]);
    
            // Initialiser FedaPay avec votre clé API
            FedaPay::setApiKey(config('services.fedapay.secret'));
            FedaPay::setEnvironment(config('services.fedapay.mode')); // 'sandbox' ou 'live'

    
            // Récupérer les détails de la transaction via l'API FedaPay
            $transaction = Transaction::retrieve($validated['transaction-id']);
    
            // Vérifier si la transaction a été récupérée avec succès
            if (!$transaction) {
                Log::error('Transaction non trouvée.');
                return response()->redirectTo(route('dashboard'))
                               ->with('error', 'Transaction non trouvée.');
            }
    
            // Vérifier si la transaction a été approuvée
            if ($transaction->status === 'approved') {
                /* dd($transaction->metadata->paid_customer->email); */
                // Récupérer les informations du client depuis le champ metadata
                $customerData = $transaction->metadata['paid_customer'];
                $customerEmail = $customerData['email'];
    
                // Récupérer l'utilisateur par son email
                $user = User::where('email', $customerEmail)->first();
                
    
                if ($user) {
                // Annuler l'ancienne souscription si elle existe
                $ancienneSouscription = Souscription::where('user_id', $user->id)
                                                    ->where('status', 'successful')
                                                    ->first();
                if ($ancienneSouscription) {
                    $ancienneSouscription->status = 'canceled'; // Mettre à jour le statut de l'ancienne souscription
                    $ancienneSouscription->save();
                }

                // Enregistrer la nouvelle souscription
                $souscription = new Souscription();
                $souscription->user_id = $user->id;
                $souscription->amount = $transaction->amount;
                $souscription->description = $transaction->description;
                $souscription->currency = 'XOF'; // Utilisez la devise appropriée
                $souscription->status = 'successful';
                $souscription->save();

                    // Redirection GET explicite
                if (Auth::user()->id == $souscription->user_id) { // Comparaison correcte
                    $packageName = '';
                    
                    // Vérification du package avec le bon opérateur de comparaison (== au lieu de =)
                    if ($souscription->amount == 2000.00) { // Utilisation de "==" pour comparer
                        $packageName = '2.000F (plan débutant)';
                    }
                    elseif ($souscription->amount == 5000.00) { // Utilisation de "==" pour comparer
                        $packageName = '5.000F (plan pro)';
                    }
                    else {
                        $packageName = '10.000F (plan élite)';
                    }
                }

                return response()->redirectTo(route('home'))
                                ->with('success', "Votre souscription au pack de {$packageName} est réussie !");

                } else {
                    Log::error('Utilisateur non trouvé pour l\'email: ' . $customerEmail);
                    return response()->redirectTo(route('dashboard'))
                                   ->with('error', 'Utilisateur non trouvé.');
                }
            } else {
                Log::warning('Paiement échoué avec statut: ' . $transaction->status);
                return response()->redirectTo(route('dashboard'))
                               ->with('error', 'Le paiement a échoué. Veuillez réessayer.');
            }
        } catch (\Exception $e) {
            dd($e);
            Log::error('Erreur dans handleFedaCallback: ' . $e->getMessage());
            return response()->redirectTo(route('dashboard'))
                           ->with('error', 'Une erreur est survenue. Veuillez réessayer.');
        }
    }
}
