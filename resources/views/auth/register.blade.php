<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, minimal-ui">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <link rel="apple-touch-icon" href="{{ asset('assets/images/apple-touch-icon.png') }}" />
    <link rel="apple-touch-startup-image" href="{{ asset('assets/images/apple-touch-startup-image-640x920.png') }}">
    <title>VISIBILITY</title>
    <link rel="stylesheet" href="{{ asset('assets/css/swiper.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/jo.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
</head>
<body id="mobile_wrap">
    <!-- Main Content -->
    <div class="views">
        <div class="view view-main">
            <div class="pages">
                <div data-page="about" class="page no-toolbar no-navbar">
                    <header class="enTetePremium">
                        <img src="{{asset('assets/images/VISI noir vert.png')}}" alt="Logo" class="logoEntreprise">
                        
                        <a href="{{ route('logout') }}" class="boutonRetour" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Deconnexion
                       </a>
                       <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                           @csrf
                       </form>
                    </header>

                    <div class="page-content" style="margin-bottom: 10%">
                        <div class="page_single layout_fullwidth_padding ">
                            <div class="content-block">
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
                                </div>
                            </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Récupérer le paramètre 'code' de l'URL
            const urlParams = new URLSearchParams(window.location.search);
            const codeParam = urlParams.get('code');
            
            // Si un code est présent dans l'URL, remplir le champ
            if (codeParam) {
                const codeField = document.getElementById('code_promo');
                if (codeField) {
                    codeField.value = codeParam;
                    codeField.readOnly = true;
                }
            }
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Récupérer le paramètre 'code' de l'URL
            const urlParams = new URLSearchParams(window.location.search);
            const codeParam = urlParams.get('code');
            
            // Si un code est présent dans l'URL, remplir le champ
            if (codeParam) {
                const codeField = document.getElementById('code_promo');
                if (codeField) {
                    codeField.value = codeParam;
                    codeField.readOnly = true;
                }
            }
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
    const phoneInput = document.getElementById('phone');
    const iti = window.intlTelInput(phoneInput, {
        initialCountry: "bf", // Burkina Faso par défaut
        utilsScript: 'https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.min.js',
    });
});
    </script>

    <script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/js/swiper.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.custom.js') }}"></script>
</body>
</html>