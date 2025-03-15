<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, minimal-ui">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <link rel="apple-touch-icon" href="{{ asset('assets/images/apple-touch-icon.png') }}" />
    <link rel="apple-touch-startup-image" href="{{ asset('assets/images/apple-touch-startup-image-640x920.png') }}">
    <title>CONNEXION</title>
    <link rel="stylesheet" href="{{ asset('assets/css/swiper.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/jo.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
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

                    <div class="page-content">
                        <div class="page_single layout_fullwidth_padding ">
                            <div class="content-block">
                                <div class="mp">
                                  
                                    <div class="top-register">
                                        <h3>MOT DE PASSE OUBLIÉ</h3>

                                        @error('email')
    <div class="text-danger">{{ $message }}</div>
@enderror

                                        <p>Veuillez entrer votre e-mail pour récupérer votre compte.</p>
                                    </div>
                                    
                                </div>
                                <div class="loginform">
                      <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <!-- Champ Email -->
                        <div class="mt-4">
                            <x-label for="email" value="{{ __('Email') }}" />
                            <x-input id="email" class="form_input" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="Email" />
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Bouton de réinitialisation -->
                        <div>
                            <x-button class="btn-custom">
                                {{ __("Réinitialiser mot de passe") }}
                            </x-button>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
<script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('assets/js/swiper.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.custom.js') }}"></script>
</body>
</html>