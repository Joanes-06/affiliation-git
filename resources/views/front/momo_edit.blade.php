@extends('front.layout_dashboard')

@section('content')
    <div class="pp-container">
        <div class="pp-header">
            <h1>Modifier le Numéro Mobile Money</h1>
        </div>
        
        <div class="pp-content">
            <form method="POST" action="{{ route('momo.update') }}">
                @csrf
                

                <!-- Champ Numéro Mobile Money -->
                <div class="pp-form-group">
                    <label class="pp-label" for="momo">Numéro Mobile Money</label>
                    <input type="text" id="momo" name="momo" class="pp-input" placeholder="Votre numéro Mobile Money" value="{{ Auth::user()->momo }}" required>
                    @error('momo')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Bouton de Soumission -->
                <div class="pp-buttons">
                    <button type="submit" class="pp-btn pp-btn-primary">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
@endsection