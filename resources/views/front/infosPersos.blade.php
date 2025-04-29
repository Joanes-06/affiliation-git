@extends('front.layout_dashboard')

@section('content')

    <div class="pp-container">
        <div class="pp-header">
            <h1>Mon Profil</h1>
        </div>

        @if(session('success'))
    <div class="custom-alert-success mt-2 mb-2">
        {{ session('success') }}
    </div>
@endif
        
        <div class="pp-content">
            <!-- Section Photo de Profil -->
            <div class="pp-profile-photo">
                <div class="pp-photo-container">
                     <!-- Afficher la photo de profil actuelle ou une image par défaut -->
            @if(Auth::user()->profile_photo_path)
            <img src="{{ asset('storage/' . Auth::user()->profile_photo_path) }}" alt="Photo de profil" class="pp-avatar">
        @else
            <img src="{{ asset('assets/images/profil.jpg') }}" alt="Photo de profil par défaut" class="pp-avatar">
        @endif
                </div>
                <p class="pp-email">{{ Auth::user()->email }}</p>
            </div>
            
            <!-- Section Informations Personnelles -->
            <div class="pp-section">
                <div class="pp-section-title">
                    <svg width="20" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4z"></path>
                        <path d="M12 14c-4.67 0-8 2.67-8 6v2h16v-2c0-3.33-3.33-6-8-6z"></path>
                    </svg>
                    Informations Personnelles
                </div>

                <div class="pp-info-group">
                    <label class="pp-label">Nom :</label>
                    <p class="pp-info">{{ Auth::user()->lastname }}</p>
                </div>
                
                <div class="pp-info-group">
                    <label class="pp-label">Prénom :</label>
                    <p class="pp-info">{{ Auth::user()->firstname }}</p>
                </div>
                
                <div class="pp-info-group">
                    <label class="pp-label">Email :</label>
                    <p class="pp-info">{{ Auth::user()->email }}</p>
                </div>
                
                <div class="pp-info-group">
                    <label class="pp-label">Téléphone :</label>
                    <p class="pp-info">{{ Auth::user()->phone }}</p>
                </div>
                
                <div class="pp-info-group">
                    <label class="pp-label">Ville :</label>
                    <p class="pp-info">{{ Auth::user()->ville }}</p>
                </div>
                
                <div class="pp-info-group">
                    <label class="pp-label">Code Promo :</label>
                    <p class="pp-info">{{ Auth::user()->code_promo }}</p>
                </div>

                <!-- Affichage du Pack -->
                <div class="pp-info-group">
                    <label class="pp-label">Pack :</label>
                    <p class="pp-info">
                        @if(Auth::user()->souscription && Auth::user()->souscription->amount == 2000.00)
                            Débutant
                        @elseif(Auth::user()->souscription && Auth::user()->souscription->amount == 5000.00)
                            Pro
                        @elseif(Auth::user()->souscription && Auth::user()->souscription->amount == 10000.00)
                            Elite
                        @else
                            Aucun pack sélectionné
                        @endif
                    </p>
                </div>
            </div>
            
            <!-- Bouton pour Modifier le Profil -->
            <div class="pp-buttons">
                <a href="{{ route('front.modifier') }}" class="pp-btn pp-btn-primary">Modifier mes informations personnelles</a>
                <a href="{{ route('front.modifierPassword') }}" class="pp-btn pp-btn-secondary">Modifier mon mot de passe</a>
                <!-- Boutons pour ajouter/modifier le numéro Mobile Money -->
            @if(Auth::user()->momo)
            <a href="{{ route('momo.answerQuiz') }}" class="pp-btn pp-btn-secondary">
                Modifier mon numéro Mobile Money
            </a>
        @else
            <a href="{{ route('momo.quiz') }}" class="pp-btn pp-btn-secondary">
                Ajouter mon numéro Mobile Money
            </a>
        @endif
               
               
            </div>
        </div>
    </div>

@endsection