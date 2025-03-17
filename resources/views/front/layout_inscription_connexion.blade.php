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
                        
                        <a href="{{ route('front.accueil') }}" class="boutonRetour">Retour à l'accueil

                       </a>
                    
                    </header>

                    <div class="page-content" style="margin-bottom: 10%">
                        <div class="page_single layout_fullwidth_padding ">
                            <div class="content-block">
                                    
                                @yield('content')

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