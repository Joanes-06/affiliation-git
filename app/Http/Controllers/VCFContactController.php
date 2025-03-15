<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Carbon\Carbon; // Importez Carbon pour manipuler les dates

class VCFContactController extends Controller
{
    public function downloadContacts(Request $request)
    {
        $validated = $request->validate([
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);

        $startDate = $validated['start_date'] ?? null;
        $endDate = $validated['end_date'] ?? null;

        // Récupérer les fichiers VCF filtrés par date
        $contactFiles = Storage::files('contacts');
        $filteredFiles = [];

        foreach ($contactFiles as $file) {
            $fileInfo = pathinfo($file);
            $fileCreatedAt = Storage::lastModified($file); // Timestamp Unix

            // Convertir le timestamp Unix en objet Carbon
            $fileCreatedAtCarbon = Carbon::createFromTimestamp($fileCreatedAt);

            // Filtrer par date si des dates sont spécifiées
            if (
                ($startDate === null  $fileCreatedAtCarbon->gte($startDate)) &&
                ($endDate === null  $fileCreatedAtCarbon->lte($endDate))
            ) {
                $filteredFiles[] = $file;
            }
        }

        // Créer un fichier VCF combiné si des fichiers sont trouvés
        if (!empty($filteredFiles)) {
            $combinedVCF = '';
            foreach ($filteredFiles as $file) {
                $combinedVCF .= Storage::get($file);
            }

            $filename = 'contacts_' . now()->format('YmdHis') . '.vcf';
            return response($combinedVCF)
                ->header('Content-Type', 'text/x-vcard')
                ->header('Content-Disposition', 'attachment; filename="' . $filename . '"');
        }

        return back()->with('error', 'Aucun contact trouvé pour la période spécifiée.');
    }
}
