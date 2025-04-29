<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Wallet;
use FedaPay\FedaPay;
use FedaPay\Transaction;
use Twilio\Rest\Client; // Importer le client Twilio
use Illuminate\Support\Facades\Log;

class WithdrawController extends Controller
{
    /**
     * Afficher le formulaire de retrait.
     *
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function showWithdrawForm()
    {
        $user = Auth::user();

        // Vérifier si l'utilisateur a un numéro Mobile Money
        if (!$user->momo) {
            return redirect()->route('momo.quiz')->with('warning', 'Vous devez d\'abord définir une question secrète et ajouter votre numéro Mobile Money pour effectuer un retrait. Veuillez conserver ces informations de manière sécurisée.');
        }

        return view('front.withdraw_form', compact('user'));
    }

    /**
     * Traiter la demande de retrait.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function processWithdraw(Request $request)
    {
        $user = Auth::user();
        $wallet = $user->wallet;
    
        // Validation du montant
        $request->validate([
            'amount' => 'required|numeric|min:1',
        ]);
    
        $amount = $request->amount;
    
        // Vérifier si le solde est suffisant
        if ($wallet->solde < $amount) {
            return redirect()->back()->withErrors(['amount' => 'Solde insuffisant pour effectuer ce retrait.']);
        }
    
        // Initialiser FedaPay
        FedaPay::setApiKey(config('services.fedapay.secret'));
        FedaPay::setEnvironment(config('services.fedapay.env')); // 'sandbox' ou 'live'
    
        try {
            // Créer une transaction FedaPay pour effectuer le retrait réel
            $transaction = Transaction::create([
                'description' => 'Retrait immédiat de fonds',
                'amount' => $amount * 100, // Montant en centimes
                'currency' => ['iso' => 'XOF'],
               'callback_url' => config('services.fedapay.callback_url'),

                'customer' => [
                    'email' => $user->email,
                    'firstname' => $user->firstname,
                    'lastname' => $user->lastname,
                    'phone_number' => [
                        'number' => $user->momo,
                        'country' => 'BJ', // Code pays pour le Bénin
                    ],
                ],
            ]);
    
            // Enregistrer la transaction dans la base de données avec le statut "pending"
            $user->transactions()->create([
                'transaction_id' => $transaction->id,
                'amount' => $amount,
                'status' => 'pending',
            ]);
    
            // Rediriger l'utilisateur avec un message de succès
            return redirect()->route('home')->with('success', 'Votre demande de retrait a été soumise avec succès. Le montant sera déduit une fois la transaction approuvée.');
        } catch (\Exception $e) {
            dd($e);
            // En cas d'erreur, rediriger avec un message d'erreur
            return redirect()->back()->withErrors(['error' => 'Une erreur s\'est produite lors du traitement de votre retrait. Veuillez réessayer.']);
        }
    }
    
    /**
     * Vérifier le statut de la transaction lors du callback.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function callback(Request $request)
    {
        $transactionData = $request->all();
        
        // Loguer les données pour vérifier que le webhook est bien reçu
        Log::info('Transaction Callback:', $transactionData);
    
        // Vérifier si la transaction est approuvée
        if (isset($transactionData['status']) && $transactionData['status'] === 'approved') {
            $user = User::where('email', $transactionData['customer']['email'])->first();
    
            if ($user) {
                $wallet = $user->wallet;
                $wallet->solde -= $transactionData['amount'] / 100;
                $wallet->save();
    
                $user->transactions()
                    ->where('transaction_id', $transactionData['id'])
                    ->update(['status' => 'approved']);
                
                $this->sendSms($user->momo, $transactionData['amount'] / 100);
                Log::info('Transaction approuvée. Solde mis à jour.');
            }
    
            // Retourner une réponse HTTP 200 pour indiquer le succès
            return response()->json(['status' => 'success'], 200);
        } else {
            // Loguer l'erreur si la transaction n'est pas approuvée
            Log::error('Transaction non approuvée', $transactionData);
            return response()->json(['status' => 'failed'], 200);
        }
    }
    

    /**
     * Envoyer un SMS via Twilio.
     *
     * @param  string  $phoneNumber
     * @param  float   $amount
     * @return void
     */
    private function sendSms($phoneNumber, $amount)
    {
        $twilioSid = config('services.twilio.sid');
        $twilioAuthToken = config('services.twilio.auth_token');
        $twilioPhoneNumber = config('services.twilio.phone_number');

        $client = new Client($twilioSid, $twilioAuthToken);

        $message = "Votre retrait de $amount XOF a été effectué avec succès depuis VISIBILITY. Merci de faire confiance à notre service.";

        try {
            $client->messages->create(
                $phoneNumber,
                [
                    'from' => $twilioPhoneNumber,
                    'body' => $message,
                ]
            );
        } catch (\Exception $e) {
            // Journaliser l'erreur si l'envoi du SMS échoue
            \Log::error('Erreur lors de l\'envoi du SMS : ' . $e->getMessage());
        }
    }

    /**
     * Afficher l'historique des retraits.
     *
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function history()
    {
        $user = Auth::user();

        // Initialiser FedaPay avec les bonnes configurations
        FedaPay::setApiKey(config('services.fedapay.secret_key'));
        FedaPay::setEnvironment(config('services.fedapay.env')); // 'sandbox' ou 'live'

        try {
            // Appel correct à l'API FedaPay pour récupérer les transactions de l'utilisateur
            $response = Transaction::search([
                'customer.email' => $user->email,
            ]);

            // Récupérer les transactions sous forme de tableau
            $transactions = Auth::user()->transactions;

            return view('front.withdraw_history', compact('transactions'));

        } catch (\Exception $e) {
            // Loguer l'erreur en cas d'échec
            Log::error('Erreur lors de la récupération des transactions : ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Impossible de récupérer l\'historique des transactions.']);
        }
    }
}