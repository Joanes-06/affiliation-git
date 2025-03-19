@extends('front.layout_dashboard')

@section('content')

    <div class="pp-container">
    <div class="pp-header">
      <h1>Modifier votre profil</h1>
    </div>
    
    <div class="pp-content">
      <div class="pp-profile-photo">
        <div class="pp-photo-container">
          <img src="{{asset('assets/images/profil.jpg')}}" alt="Photo de profil" class="pp-avatar">
          <div class="pp-photo-edit">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
            </svg>
          </div>
        </div>
        <p style="margin-bottom: 7px">{{Auth::user()->email}}</p>
         <!-- Bouton pour uploader un fichier -->
  <label for="file-upload" class="pp-photo-btn">
    Modifier Photo
  </label>
  <input type="file" id="file-upload" accept="image/*" style="display: none;">
      </div>
      
      <div class="pp-section">
        <div class="pp-section-title">
            <svg width="20" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4z"></path>
                <path d="M12 14c-4.67 0-8 2.67-8 6v2h16v-2c0-3.33-3.33-6-8-6z"></path>
              </svg>
          Informations personnelles
        </div>


        
        
            <div class="pp-form-group">
              <label class="pp-label" for="firstName">Prénom</label>
              <input type="text" id="firstName" class="pp-input" placeholder="Votre prénom">
            </div>
         

       
            <div class="pp-form-group">
              <label class="pp-label" for="lastName">Nom</label>
              <input type="text" id="lastName" class="pp-input" placeholder="Votre nom">
            </div>
        
        
        <div class="pp-form-group">
          <label class="pp-label" for="whatsapp">Numéro WhatsApp</label>
          <div class="pp-phone-group">
            <input type="tel" id="whatsapp" class="pp-input" placeholder="Votre numéro WhatsApp">
          </div>
        </div>
        
        <div class="pp-form-group">
          <label class="pp-label" for="sponsorCode">Code promo</label>
          <input type="text" id="sponsorCode" class="pp-input" placeholder="Code promo">
        </div>
      </div>
      
      <div class="pp-section">
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
      </div>
      
      <div class="pp-buttons">
        <button class="pp-btn pp-btn-primary">Mettre à jour les modifications</button>
        <button class="pp-btn pp-btn-secondary">Modifier l'adresse e-mail</button>
      </div>
    </div>
  </div>

@endsection


