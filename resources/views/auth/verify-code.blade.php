<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, minimal-ui">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <link rel="apple-touch-icon" href="{{ asset('assets/images/apple-touch-icon.png') }}" />
    <link rel="apple-touch-startup-image" href="{{ asset('assets/images/apple-touch-startup-image-640x920.png') }}">
    <title>CODE DE RÉCUPÉRATION</title>
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
                                        <h3>VÉRIFICATION DU CODE</h3>
                                        <p>Veuillez entrer le code de vérification envoyé à votre e-mail.</p>
                                    </div>
                                </div>
                                <div class="loginform">
                                   
                                    <form method="POST" action="{{ route('password.verify.code') }}">
                                        <input type="hidden" name="code" value="{{ session('code') }}">
                                        @csrf
                            
                                       
                                        <div class="mt-4">
                                            <x-label for="code" value="{{ __('Code de vérification') }}" />
                                            <x-input id="code" class="form_input" type="text" name="code" required placeholder="Ex : XXXXXX" />
                                            @error('code')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div>
                                            <x-button class="btn-custom">
                                                {{ __("VÉRIFIER LE CODE") }}
                                            </x-button>
                                        </div>

                                        <div class="espacement-haut">
                                            <x-label for="conditions">
                                                <div class="conteneur-flex">
                                                   
                                                    <div class="toto"> 
                                                        <a href="" >
                                                            {{ __('Vous n\'avez pas reçu de code ? Cliquez ici pour le renvoyer.') }}
                                                        </a>
                                                    </div>
                                                </div>
                                            </x-label>
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

    <div class="container">
        <h3>Vérification du code</h3>
        <p>Veuillez entrer le code de vérification envoyé à votre e-mail.</p>

        <form method="POST" action="{{ route('password.verify.code') }}">
            <input type="hidden" name="code" value="{{ session('code') }}">
            @csrf

            <div>
                <label for="code">Code de vérification</label>
                <input id="code" type="text" name="code" required>
                @error('code')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <button type="submit">Vérifier le code</button>
            </div>
        </form>
    </div>

