@extends('front.layout_dashboard')

@section('content')
    <div class="pp-container">
        <div class="pp-header">
            <h1>Retirer des fonds</h1>
        </div>
        
        <div class="pp-content">
            <form method="POST" action="{{ route('withdraw.process') }}">
                @csrf

                <!-- Champ Montant -->
                <div class="pp-form-group">
                    <label class="pp-label" for="amount">Montant à retirer</label>
                    <input type="number" id="amount" name="amount" class="pp-input" placeholder="Montant" required>
                    @error('amount')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Champ Numéro Mobile Money (affiché en lecture seule) -->
                <div class="pp-form-group">
                    <label class="pp-label" for="momo_number">Numéro Mobile Money</label>
                    <input type="text" id="momo_number" name="momo_number" class="pp-input" value="{{ Auth::user()->momo }}" readonly>
                </div>

                <!-- Bouton de Soumission -->
                <div class="pp-buttons">
                    <button type="submit" class="pp-btn pp-btn-primary">Soumettre la demande</button>
                </div>
            </form>
        </div>
    </div>
@endsection