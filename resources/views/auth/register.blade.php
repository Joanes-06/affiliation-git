<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, minimal-ui">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <link rel="apple-touch-icon" href="{{ asset('assets/images/apple-touch-icon.png') }}" />
    <link rel="apple-touch-startup-image" href="{{ asset('assets/images/apple-touch-startup-image-640x920.png') }}">
    <title>blix - mobile template</title>
    <link rel="stylesheet" href="{{ asset('assets/css/swiper.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/jo.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.min.css">
</head>
<body id="mobile_wrap">

    <div class="panel-overlay"></div>

    <!-- Left Panel -->
    <div class="panel panel-left panel-reveal">
        <!-- Slider -->
        <div class="swiper-container-subnav multinav">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <nav class="main_nav_underline">
                        <ul>
                            <li><a href="{{ asset('assets/index.html') }}"><img src="{{ asset('assets/images/icons/white/home.png') }}" alt="" title="" /><span>Home</span></a></li>
                            <li><a href="{{ asset('assets/about.html') }}"><img src="{{ asset('assets/images/icons/white/mobile.png') }}" alt="" title="" /><span>About</span></a></li>
                            <li><a href="{{ asset('assets/features.html') }}"><img src="{{ asset('assets/images/icons/white/features.png') }}" alt="" title="" /><span>Features</span></a></li>
                            <li><a href="{{ asset('assets/#') }}" data-popup=".popup-login" class="open-popup"><img src="{{ asset('assets/images/icons/white/lock.png') }}" alt="" title="" /><span>Login</span></a></li>
                            <li><a href="{{ asset('assets/team.html') }}"><img src="{{ asset('assets/images/icons/white/users.png') }}" alt="" title="" /><span>Team</span></a></li>
                            <li><a href="{{ asset('assets/blog.html') }}"><img src="{{ asset('assets/images/icons/white/blog.png') }}" alt="" title="" /><span>Blog</span></a></li>
                            <li><a href="{{ asset('assets/photos.html') }}"><img src="{{ asset('assets/images/icons/white/photos.png') }}" alt="" title="" /><span>Photos</span></a></li>
                            <li><a href="{{ asset('assets/videos.html') }}"><img src="{{ asset('assets/images/icons/white/video.png') }}" alt="" title="" /><span>Videos</span></a></li>
                            <li><a href="{{ asset('assets/music.html') }}"><img src="{{ asset('assets/images/icons/white/music.png') }}" alt="" title="" /><span>Music</span></a></li>
                            <li><a href="{{ asset('assets/shop.html') }}"><img src="{{ asset('assets/images/icons/white/shop.png') }}" alt="" title="" /><span>Shop</span></a></li>
                            <li class="subnav opensubnav"><img src="{{ asset('assets/images/icons/white/categories.png') }}" alt="" title="" /><span>Sub level menu</span></li>
                            <li><a href="{{ asset('assets/cart.html') }}"><img src="{{ asset('assets/images/icons/white/cart.png') }}" alt="" title="" /><span>Cart</span></a></li>
                            <li><a href="{{ asset('assets/tables.html') }}"><img src="{{ asset('assets/images/icons/white/tables.png') }}" alt="" title="" /><span>Tables</span></a></li>
                            <li><a href="{{ asset('assets/form.html') }}"><img src="{{ asset('assets/images/icons/white/form.png') }}" alt="" title="" /><span>Custom Form</span></a></li>
                            <li><a href="{{ asset('assets/tel:012345678') }}"><img src="{{ asset('assets/images/icons/white/phone.png') }}" alt="" title="" /><span>Call now!</span></a></li>
                            <li><a href="{{ asset('assets/contact.html') }}"><img src="{{ asset('assets/images/icons/white/contact.png') }}" alt="" title="" /><span>Contact</span></a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Right Panel -->
    <div class="panel panel-right panel-reveal">
        <div class="user_login_info">
            <div class="user_thumb">
                <img src="{{ asset('assets/images/page_photo.jpg') }}" alt="" title="" />
                <div class="user_details">
                    <p>Welcome, <span>Nathalie</span></p>
                </div>
                <div class="user_avatar"><img src="{{ asset('assets/images/avatar.jpg') }}" alt="" title="" /></div>
            </div>
            <nav class="user-nav">
                <ul>
                    <li><a href="{{ asset('assets/features.html') }}"><img src="{{ asset('assets/images/icons/white/settings.png') }}" alt="" title="" /><span>Account Settings</span></a></li>
                    <li><a href="{{ asset('assets/features.html') }}"><img src="{{ asset('assets/images/icons/white/briefcase.png') }}" alt="" title="" /><span>My Account</span></a></li>
                    <li><a href="{{ asset('assets/features.html') }}"><img src="{{ asset('assets/images/icons/white/message.png') }}" alt="" title="" /><span>Messages</span><strong>12</strong></a></li>
                    <li><a href="{{ asset('assets/features.html') }}"><img src="{{ asset('assets/images/icons/white/love.png') }}" alt="" title="" /><span>Favorites</span><strong>5</strong></a></li>
                    <li><a href="{{ asset('assets/index.html') }}"><img src="{{ asset('assets/images/icons/white/lock.png') }}" alt="" title="" /><span>Logout</span></a></li>
                </ul>
            </nav>
        </div>
    </div>

    <!-- Main Content -->
    <div class="views">
        <div class="view view-main">
            <div class="pages">
                <div data-page="about" class="page no-toolbar no-navbar">
                    <div class="page-content">
                        <div class="navbarpages navbarpagesbg">
                            <div class="navbar_left">
                                <div class="logo_text"><a href="{{ asset('assets/index.html') }}">BLIX</a></div>
                            </div>
                        </div>
                        <div id="pages_maincontent">
                            <h2 class="page_title">PLAN D'ABONNEMENT</h2>
                            <div class="page_single layout_fullwidth_padding">
                                <div class="content-block">
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
                                <x-label for="phone" value="{{ __('Téléphone') }}" />
                                <input type="tel" id="phone" name="phone" class="form_input" placeholder="Entrez votre numéro" value="{{ old('phone') }}" />
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


                                            <!-- Conditions d'utilisation (si activé dans Jetstream) -->
                                            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                                                <div class="mt-4">
                                                    <x-label for="terms">
                                                        <div class="flex items-center">
                                                            <x-checkbox name="terms" id="terms" required />
                                                            <div class="ms-2">
                                                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                                    'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                                                    'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                                                ]) !!}
                                                            </div>
                                                        </div>
                                                    </x-label>
                                                </div>
                                            @endif

                                            <!-- Bouton d'inscription -->
                                            <div class="flex items-center justify-end mt-4">
                                                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                                                    {{ __('Already registered?') }}
                                                </a>

                                                <x-button class="ms-4">
                                                    {{ __('Register') }}
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
    <script>
        var input = document.querySelector("#phone");
        var iti = window.intlTelInput(input, {
            initialCountry: "bf", // Burkina Faso par défaut
            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js" // Validation et utils supplémentaires
        });
    </script>
    <script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/js/swiper.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.custom.js') }}"></script>
</body>
</html>