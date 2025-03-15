
          @extends('front.layout_inscription_connexion')     
          
          @section('content')
  
                             
                             <div class="mp">
                                       
                                        <div class="top-register">
                                            <h3>INSCRIPTION</h3>
                                            <p>Créez un compte pour développer votre réseau et augmenter vos revenus.</p>
                                        </div>
                                    </div>
                                    <div class="loginform">
                                        <form method="POST" action="{{ route('register') }}">
                                            @csrf

                                            <input type="hidden" name="parrain_id" value="{{ request()->query('parrain') }}">
                                            <!-- Champ Nom -->
                                            <div>
                                                <x-label for="name" value="{{ __('Nom') }}" />
                                                <x-input id="lastname" class="form_input" type="text" name="Username" :value="old('Username')" required autofocus autocomplete="name" placeholder="Nom " />
                                                @error('Username')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <!-- Champ Prénom -->
                                            <div>
                                                <x-label for="name" value="{{ __('Prénoms') }}" />
                                                <x-input id="Fistsname" class="form_input" type="text" name="Firstname" :value="old('Firstname')" required autofocus autocomplete="name" placeholder="prénoms" />
                                                @error('Firstname')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <!-- Champ Email -->
                                            <div class="mt-4">
                                                <x-label for="email" value="{{ __('Email') }}" />
                                                <x-input id="email" class="form_input" type="email" name="Email" :value="old('Email')" required autocomplete="username" placeholder="Email" />
                                                @error('Email')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <!-- Champ Mot de passe -->
                                            <div class="mt-4">
                                                <x-label for="password" value="{{ __('Mot de passe') }}" />
                                                <x-input id="password" class="form_input" type="password" name="Password" required autocomplete="new-password" placeholder="Mot de passe" />
                                                @error('Password')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <!-- Champ Confirmation du mot de passe -->
                                            <div class="mt-4">
                                                <x-label for="password_confirmation" value="{{ __('Confirmation du mot de passe') }}" />
                                                <x-input id="password_confirmation" class="form_input" type="password" name="Password_confirmation" required autocomplete="new-password" placeholder="Confirmez le mot de passe" />
                                                @error('Password_confirmation')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <!-- Champ Téléphone -->
                                            <div class="mt-4">
                                                <x-label for="phone" value="{{ __('Numéro de téléphone') }}" />
                                                <input id="phone" class="form_input" type="tel" name="phone" :value="old('phone')" required autocomplete="tel" placeholder="Numéro de téléphone">
                                                @error('phone')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <!-- Champ Ville -->
                                            <div class="mt-4">
                                                <x-label for="ville" value="{{ __('Ville') }}" />
                                                <input type="text" name="Ville" id="ville" class="form_input" placeholder="Ville" value="{{ old('Ville') }}" />
                                                @error('Ville')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <!-- Champ Code Promo -->
                                            <div class="mt-4">
                                                <x-label for="code_promo" value="{{ __('Code de promotion') }}" />
                                                <input type="text" name="code_promo" id="code_promo" class="form_input" placeholder="Code Promo (Si vous en avez)" value="{{ $codePromo ?? old('code_promo') }}" {{ isset($codePromo) ? 'readonly' : '' }} />
                                                @error('code_promo')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                           
                                            <!-- Conditions d'utilisation -->
                                            <div class="espacement-haut">
                                                <x-label for="conditions">
                                                    <div class="conteneur-flex">
                                                        <x-checkbox name="conditions" id="conditions" required />
                                                        <div class="texte-conditions">
                                                            <div class="ligne-conditions">
                                                                <p>J'accepte les conditions générales d'utilisation</p>
                                                            </div>
                                                            <a href="{{ asset('pdf/conditions_utilisation.pdf') }}" class="lien-conditions" download>
                                                                <p>Consulter les conditions générales d'utilisation</p>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </x-label>
                                            </div>

                                            

                                            <!-- Bouton d'inscription -->
                                            <div>
                                                <x-button class="btn-custom">
                                                    {{ __("S'INSCRIRE") }}
                                                </x-button>
                                            </div>

                                            <div>
                                                <a class="deja" href="{{ route('login') }}" style="margin-bottom: 10%">
                                                    {{ __('Déjà inscrit ? Connexion') }}
                                                </a>
                                            </div>

                                        </form>
                                    </div>
                        @endsection