<?php

// Importation des contrôleurs et classes nécessaires
use App\Http\Controllers\SouscriptionController;
use App\Http\Controllers\MomoController;
use App\Http\Controllers\WithdrawController;
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
Route::post('/password/resend-code', [PasswordResetController::class, 'resendCode'])->name('password.resend.code');


Route::post('/verify-code', [PasswordResetController::class, 'verifyCode'])->name('password.verify.code');

// Affiche le formulaire pour demander une réinitialisation
Route::get('/forgot-password', [PasswordResetController::class, 'showForgotPasswordForm'])->name('password.request');

// Affiche le formulaire de réinitialisation du mot de passe
Route::get('/reset-password-form', [PasswordResetController::class, 'showResetForm'])->name('password.reset.form');

// Réinitialise le mot de passe
Route::post('/reset-password', [PasswordResetController::class, 'resetPassword'])->name('password.redefine');
Route::post('/reset', [PasswordResetController::class, 'authResetPassword'])->name('password.resett');

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
})->name('front.plan')->middleware('auth');

/* Route::get('/referes', function () {
    return view('front.referes');
})->name('front.referes')->middleware('auth'); */

Route::get('/modifier', function () {
    return view('front.modifier_profil');
})->name('front.modifier');
Route::post('/profile/update', [SouscriptionController::class, 'updateProfile'])->name('profile.update')->middleware('auth');

Route::put('/profile/photo/update', [SouscriptionController::class, 'updateProfilePhoto'])->name('profile.photo.update')->middleware('auth');

Route::get('/modifier_mon_mot_de_passe', function () {
    return view('front.modifierPassword');
})->name('front.modifierPassword');


Route::get('/informations_personnelles', function () {
    return view('front.infosPersos');
})->name('infosPersos');

Route::get('/my_referes', [SouscriptionController::class, 'referes'])->name('front.referes')->middleware('auth');


Route::post('/feda-callback', [SouscriptionController::class, 'handleFedaCallback'])->name('feda.callback');
Route::post('/fedapay/callback', [WithdrawController::class, 'callback'])->name('withdraw.callback');



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





// Route pour afficher le formulaire de retrait
Route::get('/withdraw', [WithdrawController::class, 'showWithdrawForm'])->name('withdraw.funds')->middleware('auth');

// Route pour traiter la demande de retrait
Route::post('/withdraw', [WithdrawController::class, 'processWithdraw'])->name('withdraw.process')->middleware('auth');
Route::get('/withdraw/history', [WithdrawController::class, 'history'])->name('withdraw.history');







// Routes pour ajouter un numéro Mobile Money
Route::get('/momo/quiz', [MomoController::class, 'showQuizForm'])->name('momo.quiz')->middleware('auth');
Route::post('/momo/store-quiz', [MomoController::class, 'storeQuiz'])->name('momo.store.quiz')->middleware('auth');
Route::get('/momo/add', [MomoController::class, 'showAddMomoForm'])->name('momo.add')->middleware('auth');
Route::post('/momo/store', [MomoController::class, 'storeMomo'])->name('momo.store')->middleware('auth');

// Routes pour modifier un numéro Mobile Money
Route::get('/momo/answer-quiz', [MomoController::class, 'showAnswerQuizForm'])->name('momo.answerQuiz')->middleware('auth');
Route::post('/momo/verify-quiz', [MomoController::class, 'verifyQuiz'])->name('momo.verify.quiz')->middleware('auth');
Route::get('/momo/edit', [MomoController::class, 'showEditMomoForm'])->name('momo.edit')->middleware('auth');
Route::post('/momo/update', [MomoController::class, 'updateMomo'])->name('momo.update')->middleware('auth');