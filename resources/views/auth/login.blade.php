<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, minimal-ui">
    <title>Login - BLIX</title>
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/jo.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,900" rel="stylesheet">
</head>
<body id="mobile_wrap">

    <div class="panel-overlay"></div>

    <div class="panel panel-left panel-reveal">
        <!-- Slider -->
        <div class="swiper-container-subnav multinav">
            <div class="swiper-wrapper">
                <!-- Your navigation content here -->
            </div>
        </div>
    </div>

    <div class="panel panel-right panel-reveal">
        <div class="user_login_info">
            <!-- User login info content here -->
        </div>
    </div>

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
                            <h2 class="page_title">CONNEXION</h2>

                            <div class="page_single layout_fullwidth_padding">
                                <div class="content-block">
                                    <h4>BLIX</h4>
                                    <h3>Se connecter</h3>
                                    <p>Créez un compte pour développer votre réseau et augmenter vos revenus.</p>
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf

                                        <div>
                                            <label for="email">Email</label>
                                            <input id="email" class="form_input required" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                                        </div>

                                        <div class="mt-4">
                                            <label for="password">Mot de passe</label>
                                            <input id="password" class="form_input required" type="password" name="password" required autocomplete="current-password" />
                                        </div>

                                        <div class="block mt-4">
                                            <label for="remember_me" class="flex items-center">
                                                <input type="checkbox" id="remember_me" name="remember" />
                                                <span class="ms-2 text-sm text-gray-600">Se souvenir de moi</span>
                                            </label>
                                        </div>

                                        <div class="flex items-center justify-end mt-4">
                                            @if (Route::has('password.request'))
                                                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                                                    Mot de passe oublié?
                                                </a>
                                            @endif

                                            <button type="submit" class="form_submit">
                                                Se connecter
                                            </button>
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

    <script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/js/swiper.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.custom.js') }}"></script>
</body>
</html>