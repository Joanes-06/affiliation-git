<?php
use JeroenDesloovere\VCard\VCard;

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

Route::get('/mon-parrainage', function () {
    $user = Auth::user();
    if (!$user) return redirect('/login');

    $lienParrainage = route('register', ['code' => $user->code_promo]);
    return view('parrainage', compact('lienParrainage'));
})->middleware('auth');

Route::get('/', function () {

    return view('welcome');
});
Route::get('/accueil', function () {
    return view('front.accueil');
});
Route::get('/plan', function () {
    return view('front.plan');
})->name('front.plan');
Route::get('/dashboard_accueil', function () {
    return view('front.dashboard_accueil');
});
Route::get('/dashboard_accueil', function () {
    return view('front.dashboard_accueil');
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
        return view('front.plan');
    })->name('dashboard');
});

// Routes pour les vCards
Route::middleware(['auth'])->group(function () {
    Route::get('/contacts', [App\Http\Controllers\VCardController::class, 'index'])->name('contacts.index');
    Route::post('/contacts/download', [App\Http\Controllers\VCardController::class, 'download'])->name('contacts.download');
    Route::get('/contacts/download/{user}', [App\Http\Controllers\VCardController::class, 'downloadSingle'])->name('contacts.download.single');
});

