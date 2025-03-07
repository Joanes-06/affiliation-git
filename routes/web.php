<?php
use JeroenDesloovere\VCard\VCard;

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

Route::get('/mon-parrainage', function () {
    $user = Auth::user();
    if (!$user) return redirect('/login');

    $lienParrainage = url('/register?parrain=' . $user->code_parrain);
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

Route::get('/okk', function () {
    return view('preview');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('front.plan');
    })->name('dashboard');
});

Route::get('/telecharger-vcf', function (Request $request) {
    $users = User::query();

    // Appliquer le filtre par période si les dates sont fournies
    if ($request->has('start_date') && $request->has('end_date')) {
        $users = $users->whereBetween('created_at', [$request->start_date, $request->end_date]);
    }

    // Créer un objet VCard
    $vcard = new VCard();

    foreach ($users->get() as $user) {
        $vcard->addName($user->name . ' BLIX');
        $vcard->addCompany('Mon Entreprise'); // Optionnel
        $vcard->addJobtitle('Utilisateur'); // Optionnel
        $vcard->addEmail($user->email);
        $vcard->addPhoneNumber($user->whatsapp, 'WORK'); // Numéro WhatsApp
        $vcard->addAddress(null, null, $user->ville);
        $vcard->addURL(url('/register?parrain=' . $user->code_parrain));
    }

    // Télécharger le fichier
    return response()->streamDownload(function () use ($vcard) {
        echo $vcard->getOutput();
    }, 'contacts.vcf', [
        'Content-Type' => 'text/vcard',
        'Content-Disposition' => 'attachment; filename="contacts.vcf"',
    ]);
})->middleware('auth');
