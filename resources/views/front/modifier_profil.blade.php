@extends('front.layout_dashboard')

@section('content')

    <div class="pp-container">
    <div class="pp-header">
      <h1>Modifier votre profil</h1>
    </div>
    
    <div class="pp-content">
      <div class="pp-profile-photo">
          <div class="pp-photo-container">
              <!-- Afficher la photo de profil actuelle ou une image par défaut -->
              @if(Auth::user()->profile_photo_path)
                  <img src="{{ asset('storage/' . Auth::user()->profile_photo_path) }}" alt="Photo de profil" class="pp-avatar">
              @else
                  <img src="{{ asset('assets/images/profil.jpg') }}" alt="Photo de profil par défaut" class="pp-avatar">
              @endif
              <div class="pp-photo-edit">
                  <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                      <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                  </svg>
              </div>
          </div>
          <p style="margin-bottom: 7px">{{ Auth::user()->email }}</p>
  
          <!-- Formulaire pour uploader une nouvelle photo -->
          <form method="POST" action="{{ route('profile.photo.update') }}" enctype="multipart/form-data" id="profile-photo-form">
            @csrf
            @method('PUT')
        
            <!-- Bouton pour uploader un fichier -->
            <label for="file-upload" class="pp-photo-btn">
                @if(Auth::user()->profile_photo_path)
                    Changer la photo de profil
                @else
                    Ajouter votre photo de profil
                @endif
            </label>
            <input type="file" id="file-upload" name="profile_photo" accept="image/*" style="display: none;">
        
            <!-- Bouton de soumission (masqué par défaut) -->
            <button type="submit" id="submit-button" class="pp-photo-btn mt-2" style="display: none;">Envoyer</button>
        </form>
        
        <!-- Script JavaScript pour afficher le bouton de soumission -->
        <script>
            document.getElementById('file-upload').addEventListener('change', function() {
                // Afficher le bouton de soumission lorsque l'utilisateur sélectionne un fichier
                document.getElementById('submit-button').style.display = 'block';
            });
        </script>
      </div>
  </div>
      
      <div class="pp-section">
        <div class="pp-section-title">
            <svg width="20" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4z"></path>
                <path d="M12 14c-4.67 0-8 2.67-8 6v2h16v-2c0-3.33-3.33-6-8-6z"></path>
              </svg>
          Informations personnelles
        </div>


        <form method="POST" action="{{ route('profile.update') }}">
          @csrf
      
          <!-- Champ Nom -->
          <div class="pp-form-group">
              <label class="pp-label" for="lastName">Nom</label>
              <input type="text" id="lastName" name="lastname" class="pp-input" placeholder="Votre nom" value="{{ old('lastname', Auth::user()->lastname) }}">
              @error('lastname')
                  <div class="text-danger">{{ $message }}</div>
              @enderror
          </div>
          
          <!-- Champ Prénom -->
          <div class="pp-form-group">
              <label class="pp-label" for="firstName">Prénoms</label>
              <input type="text" id="firstName" name="firstname" class="pp-input" placeholder="Votre prénom" value="{{ old('firstname', Auth::user()->firstname) }}">
              @error('firstname')
                  <div class="text-danger">{{ $message }}</div>
              @enderror
          </div>
          
          <!-- Champ Email -->
          <div class="pp-form-group">
              <label class="pp-label" for="email">Email</label>
              <input type="email" id="email" name="email" class="pp-input" placeholder="Votre email" value="{{ old('email', Auth::user()->email) }}">
              @error('email')
                  <div class="text-danger">{{ $message }}</div>
              @enderror
          </div>
          
          <!-- Champ Téléphone -->
          <div class="pp-form-group">
              <label class="pp-label" for="whatsapp">Numéro WhatsApp</label>
              <div class="pp-phone-group">
                  <input type="tel" id="whatsapp" name="phone" class="pp-input" placeholder="Votre numéro WhatsApp" value="{{ old('phone', Auth::user()->phone) }}">
              </div>
              @error('phone')
                  <div class="text-danger">{{ $message }}</div>
              @enderror
          </div>
      
          <!-- Champ Ville -->
          <div class="pp-form-group">
              <label class="pp-label" for="ville">Ville de résidence</label>
              <div class="pp-phone-group">
                  <input type="text" id="ville" name="ville" class="pp-input" placeholder="Votre ville de résidence" value="{{ old('ville', Auth::user()->ville) }}">
              </div>
              @error('ville')
                  <div class="text-danger">{{ $message }}</div>
              @enderror
          </div>
          
          <!-- Champ Code Promo -->
          <div class="pp-form-group">
              <label class="pp-label" for="sponsorCode">Code promo</label>
              <input type="text" id="sponsorCode" name="code_promo" class="pp-input" placeholder="Code promo" value="{{ old('code_promo', Auth::user()->code_promo) }}">
              @error('code_promo')
                  <div class="text-danger">{{ $message }}</div>
              @enderror
          </div>
      
          <!-- Bouton de Soumission -->
          <div class="pp-buttons">
              <button type="submit" class="pp-btn pp-btn-primary">Mettre à jour les modifications</button>
          </div>
      </form>
    </div>
  </div>

@endsection





 {{--   <div class="pp-section">
        <div class="pp-section-title">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
            <line x1="1" y1="10" x2="23" y2="10"></line>
          </svg>
          Informations de paiement
        </div>
        
        <div class="pp-form-group">
          <label class="pp-label" for="operator">Opérateur Mobile Money</label>
          <select id="operator" class="pp-select">
            <option value="" disabled selected>Sélectionnez un opérateur</option>
            <option value="mtn">MTN Mobile Money</option>
            <option value="orange">Orange Money</option>
            <option value="moov">Moov Money</option>
            <option value="wave">Wave</option>
          </select>
        </div>
        
        <div class="pp-form-group">
          <label class="pp-label" for="momoNumber">Numéro MOMO/OM</label>
          <input type="tel" id="momoNumber" class="pp-input" placeholder="Votre numéro Mobile Money">
        </div>
      </div> --}}


