@extends('front.layout_dashboard')

@section('content')
    <div class="pp-container">
        <div class="pp-header">
            <h1>Répondre à la Question Secrète</h1>
        </div>
        
        <div class="pp-content">
            <form method="POST" action="{{ route('momo.verify.quiz') }}">
                @csrf

                <!-- Affichage de la Question Secrète -->
                <div class="pp-form-group">
                    <label class="pp-label">Question Secrète</label>
                    <p>{{ Auth::user()->secret_question }}</p>
                </div>

                <!-- Champ Réponse Secrète -->
                <div class="pp-form-group">
                    <label class="pp-label" for="secret_answer">Réponse Secrète</label>
                    <input type="text" id="secret_answer" name="secret_answer" class="pp-input" placeholder="Votre réponse" required>
                    @error('secret_answer')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Bouton de Soumission -->
                <div class="pp-buttons">
                    <button type="submit" class="pp-btn pp-btn-primary">Valider</button>
                </div>
            </form>
        </div>
    </div>
@endsection