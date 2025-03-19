<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Souscription; // Modèle "Souscription"
use App\Models\Wallet; // Modèle "Wallet" pour gérer le solde et bénéfices
use Illuminate\Support\Facades\Log;
use FedaPay\FedaPay;
use FedaPay\Transaction;
use FedaPay\Customer;

class SouscriptionController extends Controller
{
    public function index() {
        $user = Auth::user();
        $wallet = Wallet::where('user_id', $user->id)->first();
    
        return view('front.dashboard_accueil', [
            'solde' => $wallet->solde ?? 0,
            'benefice_total' => $wallet->benefice_total ?? 0,
        ]);
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

                    // Calcul des commissions pour les parrains
                    $this->updateWallets($user, $transaction->amount);

                    // Gestion des packages et frais d'inscription
                    if (Auth::user()->id == $souscription->user_id) {
                        $packageName = '';
                        $inscription_fees = 0;
                        
                        // Vérification du package avec le bon opérateur de comparaison (== au lieu de =)
                        if ($souscription->amount == 2000.00) { // Utilisation de "==" pour comparer
                            $packageName = '2.000F (plan débutant)';
                            $inscription_fees = 2000.00;
                        }
                        elseif ($souscription->amount == 5000.00) { // Utilisation de "==" pour comparer
                            $packageName = '5.000F (plan pro)';
                            $inscription_fees = 5000.00;
                        }
                        else {
                            $packageName = '10.000F (plan élite)';
                            $inscription_fees = 10000.00;
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

    // Méthode pour mettre à jour le wallet de l'utilisateur et des parrains
    private function updateWallets(User $user, $amount)
    {
        $commission_directe = $amount * 0.50;
        $commission_niveau1 = $amount * 0.25;
        $commission_niveau2 = $amount * 0.125;
    
        // Créditer le parrain direct (Niveau 1)
        if ($user->inviteur_id) {
            $inviteur = User::find($user->inviteur_id);
            if ($inviteur) {
                $wallet = Wallet::where('user_id', $inviteur->id)->first();
                if (!$wallet) {
                    // Si le wallet n'existe pas, en créer un
                    $wallet = Wallet::create([
                        'user_id' => $inviteur->id,
                        'solde' => 0,
                        'benefice_total' => 0,
                    ]);
                }
                $wallet->increment('solde', $commission_directe);
                $wallet->increment('benefice_total', $commission_directe);
            }
        }
    
        // Créditer le parrain du parrain (Niveau 2)
        if ($user->generation1_id) {
            $parrain_niveau1 = User::find($user->generation1_id);
            if ($parrain_niveau1) {
                $wallet = Wallet::where('user_id', $parrain_niveau1->id)->first();
                if (!$wallet) {
                    // Si le wallet n'existe pas, en créer un
                    $wallet = Wallet::create([
                        'user_id' => $parrain_niveau1->id,
                        'solde' => 0,
                        'benefice_total' => 0,
                    ]);
                }
                $wallet->increment('solde', $commission_niveau1);
                $wallet->increment('benefice_total', $commission_niveau1);
            }
        }
    
        // Créditer le parrain du parrain du parrain (Niveau 3)
        if ($user->generation2_id) {
            $parrain_niveau2 = User::find($user->generation2_id);
            if ($parrain_niveau2) {
                $wallet = Wallet::where('user_id', $parrain_niveau2->id)->first();
                if (!$wallet) {
                    // Si le wallet n'existe pas, en créer un
                    $wallet = Wallet::create([
                        'user_id' => $parrain_niveau2->id,
                        'solde' => 0,
                        'benefice_total' => 0,
                    ]);
                }
                $wallet->increment('solde', $commission_niveau2);
                $wallet->increment('benefice_total', $commission_niveau2);
            }
        }
    }

    public function referes()
    {
        $user = Auth::user();
    
        if (!$user) {
            return redirect()->route('login');
        }
    
        // Récupérer les filleuls avec leurs souscriptions
        $palier1 = User::where('inviteur_id', $user->id)->with('souscription')->get();
        $palier2 = User::where('generation1_id', $user->id)->with('souscription')->get();
        $palier3 = User::where('generation2_id', $user->id)->with('souscription')->get();
    
        return view('front.referes', compact('palier1', 'palier2', 'palier3', 'user'));
    }
    

    
}
