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
<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,900" rel="stylesheet"> 
</head>
<body id="mobile_wrap">

    <div class="panel-overlay"></div>

 

    <div class="panel panel-right panel-reveal">
      <div class="user_login_info">
	  
                <div class="user_thumb">
                <img src="{{ asset('assets/images/abonné.jpg') }}" alt="" title="" />
                  <div class="user_details">

                    <p>Bienvenue, <span>{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</span></p>
                   
                  </div>  
                  <div class="user_avatar"><img src="{{ asset('assets/images/profil.jpg') }}" alt="" title="" /></div>       
                </div>
				
                  <nav class="user-nav">
                    <ul>
                      <li><a href="{{route('front.modifier')}}"><img src="{{ asset('assets/images/icons/white/profilead.png') }}" alt="" title="" /><span>Modifier Profil</span></a></li>
                      <li><a href="{{ route('front.referes') }}"><img src="{{ asset('assets/images/icons/white/affiliation.png') }}" alt="" title="" /><span>Programme de référés</span></a></li>
                      <li><a href="#"><img src="{{ asset('assets/images/icons/white/tout contact.png') }}" alt="" title="" /><span>Tout les contacts</span></a></li>
                      <li><a href="{{ route('contacts.index') }}"><img src="{{ asset('assets/images/icons/white/mise contact.png') }}" alt="" title="" /><span>Mise a jour des contact</span></a></li>
                     
                      <li><a href="#"><img src="{{ asset('assets/images/icons/white/com.png') }}" alt="" title="" /><span>Rejoindre la communauter</span></a></li>
                      <li><a href="#"><img src="{{ asset('assets/images/icons/white/telegram.png') }}" alt="" title="" /><span>Rejoindre la formation trading</span></a></li>
                      <li><a href="#"><img src="{{ asset('assets/images/icons/white/telegram.png') }}" alt="" title="" /><span>Marketing</span></a></li>
                    </ul>
                  </nav>
                  <nav class="user-navi">
                    <ul>
                      <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><img src="{{ asset('assets/images/icons/white/deconnexion.png') }}" alt="" title="" /><span>Déconnexion</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li> 
                    </ul>
                  </nav>
      </div>
    </div>

    <div class="views">

      <div class="view view-main">
<div class="pages">
  <div data-page="blog" class="page no-toolbar no-navbar">
    <div class="page-content">
    
      <header class="enTetePremium">
        <img src="{{asset('assets/images/VISI noir vert.png')}}" alt="Logo" class="logoEntreprise">
        <a href="#" data-panel="right" class="open-panel"><img src="{{asset('assets/images/profil avatar.png')}}" alt="Logo" class="logoEntreprise">
       </a>
       
    </header>
	
      
     <div class="page_single layout_fullwidth_padding">  
      <div class="content-block">
  

            <div class="">
                @yield('content')
            </div>
                

      
			
       </div>		
       </div>		
      
      </div>
      
      
    </div>
  </div>
</div>

         </div>
  





<script>
    // Fonction pour copier le lien de parrainage
    document.getElementById('copyBtn').addEventListener('click', function() {
        const linkText = document.getElementById('referralLink').textContent;
        navigator.clipboard.writeText(linkText)
            .then(() => {
                // Changer le texte du bouton
                this.innerHTML = '<i class="fas fa-check"></i> Lien copié!';
                
                // Rétablir le texte original après 3 secondes
                setTimeout(() => {
                    this.innerHTML = '<i class="fas fa-copy"></i> Copier mon lien';
                }, 3000);
            })
            .catch(err => {
                console.error('Erreur lors de la copie: ', err);
            });
    });
</script>    
<script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.validate.min.js') }}" ></script>
<script src="{{ asset('assets/js/swiper.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.custom.js') }}"></script>
  </body>
</html>
