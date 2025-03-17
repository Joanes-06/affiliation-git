<?php

// Importation des contrôleurs et classes nécessaires
use App\Http\Controllers\SouscriptionController;
use App\Http\Controllers\PasswordResetController; // Contrôleur pour la réinitialisation du mot de passe
use Illuminate\Support\Facades\Route; // Pour définir les routes
use Illuminate\Support\Facades\Auth; // Pour gérer l'authentification
use App\Models\Souscription; // Modèle pour les souscriptions
use Illuminate\Http\Request; // Pour gérer les requêtes HTTP

// ==================================================
// 1. Routes pour la réinitialisation du mot de passe
// ==================================================

// Envoie un lien de réinitialisation de mot de passe
Route::post('/forgot-password', [PasswordResetController::class, 'sendResetLink'])->name('password.email');

// Affiche la page de vérification du code
Route::get('/verify-code', function () {
    return view('auth.verify-code');
})->name('password.verify');

// Vérifie le code de réinitialisation
Route::post('/verify-code', [PasswordResetController::class, 'verifyCode'])->name('password.verify.code');

// Affiche le formulaire pour demander une réinitialisation
Route::get('/forgot-password', [PasswordResetController::class, 'showForgotPasswordForm'])->name('password.request');

// Affiche le formulaire de réinitialisation du mot de passe
Route::get('/reset-password', [PasswordResetController::class, 'showResetForm'])->name('password.reset.form');

// Réinitialise le mot de passe
Route::post('/reset', [PasswordResetController::class, 'resetPassword'])->name('password.reset');

// ==================================================
// 2. Route pour le parrainage
// ==================================================

// Affiche la page de parrainage avec un lien unique pour l'utilisateur connecté
Route::get('/mon-parrainage', function () {
    $user = Auth::user(); // Récupère l'utilisateur connecté
    if (!$user) return redirect('/login'); // Redirige vers la page de connexion si l'utilisateur n'est pas connecté

    // Génère un lien de parrainage avec le code promo de l'utilisateur
    $lienParrainage = route('register', ['code' => $user->code_promo]);
    return view('parrainage', compact('lienParrainage')); // Affiche la vue avec le lien
})->middleware('auth'); // Seuls les utilisateurs connectés peuvent accéder à cette route

// ==================================================
// 3. Routes pour les pages publiques
// ==================================================

// Page d'accueil
Route::get('/', function () {
    return view('front.accueil');
})->name('front.accueil');

// Page de contact
Route::get('/contact', function () {
    return view('front.contact');
});

// Page des plans (nommée 'front.plan')
Route::get('/plan', function () {
    return view('front.plan');
})->name('front.plan');

// Page des références (nommée 'front.referes')
Route::get('/referes', function () {
    return view('front.referes');
})->name('front.referes');

// ==================================================
// 4. Routes pour les callbacks et les souscriptions
// ==================================================

// Gère un callback (probablement pour un paiement ou une intégration externe)
Route::post('/feda-callback', [SouscriptionController::class, 'handleFedaCallback'])->name('feda.callback');

// Route pour la méthode index du SouscriptionController
Route::post('/index', [SouscriptionController::class, 'index'])->name('index');

// ==================================================
// 5. Route pour le tableau de bord
// ==================================================

// Affiche le tableau de bord si l'utilisateur est connecté et a une souscription active
Route::get('/dashboard-accueil', function () {
    if (Auth::check()) { // Vérifie si l'utilisateur est connecté
        // Vérifie si l'utilisateur a une souscription active
        $souscriptionActive = Souscription::where('user_id', Auth::id())
                                          ->where('status', 'successful')
                                          ->exists();
        if ($souscriptionActive) {
            return app(SouscriptionController::class)->index(); // Affiche le tableau de bord
        } else {
            return view('front.plan')->with('error', 'Vous devez souscrire à un pack pour accéder à cette page.');
        }
    }
    return redirect()->back()->with('error', 'Vous devez être connecté pour accéder à cette page.');
})->name('home');

// ==================================================
// 6. Route pour la prévisualisation
// ==================================================

// Affiche une page de prévisualisation
Route::get('/okk', function () {
    return view('preview');
});

// ==================================================
// 7. Route pour les invitations
// ==================================================

// Redirige vers la page d'inscription avec un code d'invitation
Route::get('/invite/{code}', function ($code) {
    return redirect()->route('register', ['code' => $code]);
})->name('invite.link');

// ==================================================
// 8. Routes pour le tableau de bord (avec middleware d'authentification)
// ==================================================

// Groupe de routes protégées par l'authentification Sanctum
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Redirige vers la route 'home' (dashboard-accueil)
    Route::get('/dashboard', function () {
        return to_route('home');
    })->name('dashboard');
});

// ==================================================
// 9. Routes pour les vCards (contacts)
// ==================================================

// Groupe de routes protégées par l'authentification
Route::middleware(['auth'])->group(function () {
    // Affiche la liste des contacts
    Route::get('/contacts', [App\Http\Controllers\VCardController::class, 'index'])->name('contacts.index');

    // Télécharge un contact
    Route::post('/contacts/download', [App\Http\Controllers\VCardController::class, 'download'])->name('contacts.download');

    // Télécharge tous les contacts
    Route::post('/contacts/downloadAllContacts', [App\Http\Controllers\VCardController::class, 'downloadAllContacts'])->name('contacts.downloadAllContacts');

    // Télécharge un contact spécifique
    Route::get('/contacts/download/{user}', [App\Http\Controllers\VCardController::class, 'downloadSingle'])->name('contacts.download.single');
});