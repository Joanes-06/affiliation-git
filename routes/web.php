<?php

use App\Http\Controllers\SouscriptionController;
use App\Http\Controllers\PasswordResetController; // Nouveau contrôleur
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Souscription;
use Illuminate\Http\Request;

// Route pour envoyer le lien de réinitialisation de mot de passe
Route::post('/forgot-password', [PasswordResetController::class, 'sendResetLink'])->name('password.email');

Route::get('/verify-code', function () {
    return view('auth.verify-code');
})->name('password.verify');
Route::post('/verify-code', [PasswordResetController::class, 'verifyCode'])->name('password.verify.code');

// Route pour afficher le formulaire de réinitialisation du mot de passe
Route::get('/forgot-password', [PasswordResetController::class, 'showForgotPasswordForm'])->name('password.request');
Route::get('/reset-password', [PasswordResetController::class, 'showResetForm'])->name('password.reset.form');
Route::post('/reset', [PasswordResetController::class, 'resetPassword'])->name('password.reset');

Route::get('/mon-parrainage', function () {
    $user = Auth::user();
    if (!$user) return redirect('/login');

    $lienParrainage = route('register', ['code' => $user->code_promo]);
    return view('parrainage', compact('lienParrainage'));
})->middleware('auth');

Route::get('/', function () {
    return view('front.accueil');
});

Route::get('/contact', function () {
    return view('front.contact');
});
Route::get('/plan', function () {
    return view('front.plan');
})->name('front.plan');

Route::post('/feda-callback', [SouscriptionController::class, 'handleFedaCallback'])->name('feda.callback');
Route::post('/index', [SouscriptionController::class, 'index'])->name('index');

Route::get('/dashboard-accueil', function () {
    // Vérifier si l'utilisateur est authentifié
    if (Auth::check()) {
        // Vérifier si l'utilisateur a une souscription active
        $souscriptionActive = Souscription::where('user_id', Auth::id())
                                          ->where('status', 'successful')
                                          ->exists();
        if ($souscriptionActive) {
            return app(SouscriptionController::class)->index();
        } else {
            return view('front.plan')->with('error', 'Vous devez souscrire à un pack pour accéder à cette page.');
        }
    }
    return redirect()->back()->with('error', 'Vous devez être connecté pour accéder à cette page.');
})->name('home');

Route::get('/okk', function () {
    return view('preview');
});

Route::get('/invite/{code}', function ($code) {
    return redirect()->route('register', ['code' => $code]);
})->name('invite.link');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return to_route('home');
    })->name('dashboard');
});

// Routes pour les vCards
Route::middleware(['auth'])->group(function () {
    Route::get('/contacts', [App\Http\Controllers\VCardController::class, 'index'])->name('contacts.index');
    Route::post('/contacts/download', [App\Http\Controllers\VCardController::class, 'download'])->name('contacts.download');
    Route::get('/contacts/download/{user}', [App\Http\Controllers\VCardController::class, 'downloadSingle'])->name('contacts.download.single');
});
