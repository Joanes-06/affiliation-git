<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use JeroenDesloovere\VCard\VCard;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class VCardController extends Controller
{
    /**
     * Afficher la page de téléchargement des contacts
     */
    public function index()

    {
        
        return view('vcards.index');
    }
/**
     * Générer et télécharger les fichiers VCF de tous les utilisateurs
     */
    public function downloadAllContacts()
    {
        // Récupérer tous les utilisateurs
        $users = User::all();
    
        if ($users->isEmpty()) {
            return back()->with('error', 'Aucun contact trouvé.');
        }
    
        // Récupérer la date du premier utilisateur ajouté
        $firstUserDate = User::orderBy('created_at', 'asc')->value('created_at');
        $startDate = $firstUserDate ? Carbon::parse($firstUserDate)->format('Y-m-d') : null;
        
        // Définir la date actuelle comme end_date
        $endDate = now()->format('Y-m-d');
    
        // Enregistrer ce téléchargement dans l'historique de l'utilisateur
        $user = Auth::user();
        $lastDownloads = $user->last_vcard_downloads ?? [];
    
        // Ajouter les informations du téléchargement
        array_unshift($lastDownloads, [
            'start_date' => $startDate,
            'end_date' => $endDate,
            'count' => $users->count(),
            'downloaded_at' => now()->format('Y-m-d H:i:s')
        ]);
    
        // Limiter à 5 derniers téléchargements
        $lastDownloads = array_slice($lastDownloads, 0, 5);
    
        // Mettre à jour l'utilisateur
        $user->last_vcard_downloads = $lastDownloads;
        $user->save();
    
        // Générer les vCards
        $vCards = [];
        foreach ($users as $user) {
            $vCard = new VCard();
            $formattedName = $user->lastname . ' ' . $user->firstname . ' (VISIBILITY)';
            $vCard->addName('', $formattedName, '', '', '');
            $phoneNumber = '' . preg_replace('/[^0-9]/', '', $user->phone);
            $vCard->addPhoneNumber($phoneNumber, 'WHATSAPP');
            $vCards[] = $vCard;
        }
    
        // Combiner les vCards en un seul fichier
        if (count($vCards) >= 1) {
            $content = '';
            foreach ($vCards as $vCard) {
                $content .= $vCard->getOutput();
            }
            $filename = "VISIBILITY_Contacts_All.vcf";
    
            return response($content)
                ->header('Content-type', 'text/x-vcard')
                ->header('Content-Disposition', 'attachment; filename="' . $filename . '"');
        } elseif (count($vCards) == 1) {
            $filename = "contact_all.vcf";
    
            return response($vCards[0]->getOutput())
                ->header('Content-type', 'text/x-vcard')
                ->header('Content-Disposition', 'attachment; filename="' . $filename . '"');
        }
    }
    


    /**
     * Générer et télécharger les fichiers VCF selon la période sélectionnée
     */
    public function download(Request $request)
{
    // Validation des dates
    $request->validate([
        'start_date' => 'required|date',
        'end_date' => 'required|date|after_or_equal:start_date',
    ]);

    // Convertir les dates au format Carbon pour la comparaison
    $startDate = Carbon::parse($request->start_date)->startOfDay();
    $endDate = Carbon::parse($request->end_date)->endOfDay();

    // Récupérer les utilisateurs inscrits dans cette période
    $users = User::whereBetween('created_at', [$startDate, $endDate])->get();

    if ($users->isEmpty()) {
        return back()->with('error', 'Aucun contact trouvé pour cette période.');
    }

    // Enregistrer ce téléchargement dans l'historique de l'utilisateur
    $user = Auth::user();
    $lastDownloads = $user->last_vcard_downloads ?? [];
    
    // Ajouter le téléchargement actuel au début du tableau (limité à 5 derniers téléchargements)
    array_unshift($lastDownloads, [
        'start_date' => $startDate->format('Y-m-d'),
        'end_date' => $endDate->format('Y-m-d'),
        'count' => $users->count(),
        'downloaded_at' => now()->format('Y-m-d H:i:s')
    ]);
    
    // Limiter à 5 derniers téléchargements
    $lastDownloads = array_slice($lastDownloads, 0, 5);
    
    // Mettre à jour l'utilisateur
    $user->last_vcard_downloads = $lastDownloads;
    $user->save();

    // Créer un fichier VCF multiple
    $vCards = [];
    
    foreach ($users as $user) {
        // Créer une nouvelle vCard pour chaque utilisateur
        $vCard = new VCard();
        
        // Ajouter les informations de l'utilisateur
        $formattedName = $user->lastname . ' ' . $user->firstname . ' (VISIBILITY)';

        $vCard->addName('', $formattedName, '', '', '');
        
        
        // Formater le numéro de téléphone avec le préfixe "v+"
        $phoneNumber = '' . preg_replace('/[^0-9]/', '', $user->phone);
        
        // Ajouter le numéro WhatsApp
        $vCard->addPhoneNumber($phoneNumber, 'WHATSAPP');
        
        $vCards[] = $vCard;
    }
    
    // Si plusieurs vCards sont créées, les combiner en un seul fichier
    if (count($vCards) >= 1) {
        $content = '';
        foreach ($vCards as $vCard) {
            $content .= $vCard->getOutput();
        }
        $filename = 'VISIBILITY_Contacts_' . $startDate->format('d/m/Y') . '-' . $endDate->format('d/m/Y') . '.vcf';

        
        // Retourner le fichier combiné
        return response($content)
            ->header('Content-type', 'text/x-vcard')
            ->header('Content-Disposition', 'attachment; filename="' . $filename . '"');
    } elseif (count($vCards) == 1) {
        // S'il n'y a qu'une seule vCard, la retourner directement
        $filename = 'contact_' . $startDate->format('Ymd') . '_' . $endDate->format('Ymd') . '.vcf';
        
        return response($vCards[0]->getOutput())
            ->header('Content-type', 'text/x-vcard')
            ->header('Content-Disposition', 'attachment; filename="' . $filename . '"');
    }
}
    
    /**
     * Générer automatiquement une vCard pour un utilisateur spécifique
     */
    public function downloadSingle($userId)
    {
        $user = User::findOrFail($userId);
        
        // Créer une nouvelle vCard
        $vCard = new VCard();
        
        // Ajouter les informations de l'utilisateur
        $formattedName = $user->lastname . ' ' . $user->firstname . ' (VISIBILITY)';

        $vCard->addName('', $formattedName, '', '', '');

        
        // Formater le numéro de téléphone avec le préfixe "v+"
        $phoneNumber = '' . preg_replace('/[^0-9]/', '', $user->phone);
        
        // Ajouter le numéro WhatsApp
        $vCard->addPhoneNumber($phoneNumber, 'WHATSAPP');
        // Retourner la vCard en téléchargement
        return $vCard->download();
    }
}