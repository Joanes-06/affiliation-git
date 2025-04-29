@extends('front.layout_dashboard')

@section('content')
    <div class="pp-container">
        <div class="pp-header">
            <h1>Définir une Question Secrète</h1>
        </div>
        
        <div class="pp-content">
            <form method="POST" action="{{ route('momo.store.quiz') }}">
                @csrf

                <!-- Champ Question Secrète -->
                <div class="pp-form-group">
                    <label class="pp-label" for="secret_question">Question Secrète</label>
                    <input type="text" id="secret_question" name="secret_question" class="pp-input" placeholder="Votre question secrète" required>
                    @error('secret_question')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Champ Réponse Secrète -->
                <div class="pp-form-group">
                    <label class="pp-label" for="secret_answer">Réponse Secrète</label>
                    <input type="text" id="secret_answer" name="secret_answer" class="pp-input" placeholder="Votre réponse secrète" required>
                    @error('secret_answer')
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