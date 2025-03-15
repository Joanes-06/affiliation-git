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
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.3/dist/tailwind.min.css" rel="stylesheet">
</head>
<body id="mobile_wrap">

    <div class="panel-overlay"></div>

 

    <div class="panel panel-right panel-reveal">
      <div class="user_login_info">
	  
                <div class="user_thumb">
                <img src="{{ asset('assets/images/abonné.jpg') }}" alt="" title="" />
                  <div class="user_details">

                   <p>Bienvenue, <span>l'equipe GBAYE</span></p>
                   
                  </div>  
                  <div class="user_avatar"><img src="{{ asset('assets/images/profil.jpg') }}" alt="" title="" /></div>       
                </div>
				
                  <nav class="user-nav">
                    <ul>
                      <li><a href="#"><img src="{{ asset('assets/images/icons/white/profilead.png') }}" alt="" title="" /><span>Modifier Profil</span></a></li>
                      <li><a href="#"><img src="{{ asset('assets/images/icons/white/affiliation.png') }}" alt="" title="" /><span>Code Promo</span></a></li>
                      <li><a href="#"><img src="{{ asset('assets/images/icons/white/tout contact.png') }}" alt="" title="" /><span>Tout les contacts</span></a></li>
                      <li><a href="{{ route('contacts.index') }}"><img src="{{ asset('assets/images/icons/white/mise contact.png') }}" alt="" title="" /><span>Mise a jour des contact</span></a></li>
                     
                      <li><a href="#"><img src="{{ asset('assets/images/icons/white/com.png') }}" alt="" title="" /><span>Rejoindre la communauter</span></a></li>
                      <li><a href="#"><img src="{{ asset('assets/images/icons/white/telegram.png') }}" alt="" title="" /><span>Rejoindre la formation trading</span></a></li>
                      <li><a href="#"><img src="{{ asset('assets/images/icons/white/telegram.png') }}" alt="" title="" /><span>Marketing</span></a></li>
                    </ul>
                  </nav>
                  <nav class="user-navi">
                    <ul>
                      <li><a href="{{ asset('assets/index.html') }}"><img src="{{ asset('assets/images/icons/white/deconnexion.png') }}" alt="" title="" /><span>Déconnexion</span></a></li>
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
        <a href="{{ route('logout') }}" class="boutonRetour" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Deconnexion
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        <a href="#" data-panel="right" class="open-panel"><img src="{{asset('assets/images/profil avatar.png')}}" alt="Logo" class="logoEntreprise">
       </a>
       
    </header>
	
    <div class="page_single layout_fullwidth_padding">  
        <div class="content-block">
            <div class="">
                <div class="tt-row justify-content-center">
                <div class="tt-col-md-8">
                    <div class="tt-card">
                        <div class="tt-card-header">
                            {{ __('Télécharger les contacts') }}
                        </div>
                        <div class="tt-card-body">
                            @if (session('error'))
                            <div class="tt-alert tt-alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                            @endif
                            
                            @if (session('success'))
                            <div class="tt-alert tt-alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                            @endif
                            
                            <form method="POST" action="{{ route('contacts.download') }}">
                                @csrf
                                
                                <div class="tt-form-group tt-row mb-3">
                                    <label for="start_date" class="tt-col-md-4 tt-form-label text-md-right">{{ __('Date de début') }}</label>
                                    <div class="tt-col-md-6">
                                        <input id="start_date" type="date" class="tt-form-control @error('start_date') tt-is-invalid @enderror" name="start_date" value="{{ old('start_date', \Carbon\Carbon::now()->subMonth()->format('Y-m-d')) }}" required>
                                        @error('start_date')
                                        <span class="tt-invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="tt-form-group tt-row mb-3">
                                    <label for="end_date" class="tt-col-md-4 tt-form-label text-md-right">{{ __('Date de fin') }}</label>
                                    <div class="tt-col-md-6">
                                        <input id="end_date" type="date" class="tt-form-control @error('end_date') tt-is-invalid @enderror" name="end_date" value="{{ old('end_date', \Carbon\Carbon::now()->format('Y-m-d')) }}" required>
                                        @error('end_date')
                                            <span class="tt-invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="tt-form-group tt-row mb-0">
                                    <div class="tt-col-md-6 tt-offset-md-4">
                                        <button type="submit" class="tt-btn tt-btn-primary">
                                            {{ __('Télécharger les contacts') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
        
                            <hr class="tt-hr">
                            
                            <div class="mt-3">
                                
                                <div class="tt-h5">
                                    <p>Derniers téléchargements</p>
                                </div>
                                @if(auth()->user()->last_vcard_downloads && count(auth()->user()->last_vcard_downloads) > 0)
                                    <ul class="tt-list-group">
                                        @foreach(auth()->user()->last_vcard_downloads as $download)
                                            <li class="tt-list-group-item d-flex justify-content-between align-items-center">
                                                Du {{ \Carbon\Carbon::parse($download['start_date'])->format('d/m/Y') }} 
                                                au {{ \Carbon\Carbon::parse($download['end_date'])->format('d/m/Y') }}
                                                <span class="tt-badge tt-bg-primary tt-rounded-pill">{{ $download['count'] }} contacts</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                @else
                                    <p class="tt-text-muted">Aucun téléchargement précédent enregistré.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      
			
       </div>		
       </div>		
      
      </div>
      
      
    </div>
  </div>
</div>

         </div>
    </div>

   
	
    <!-- Social Icons Popup -->
    <div class="popup popup-social">
    <div class="content-block">
      <h4>Social Share</h4>
      <p>Share icons solution that allows you share and increase your social popularity.</p>
      <ul class="social_share">
      <li><a href="http://twitter.com/"><img src="{{ asset('assets/images/icons/black/twitter.png') }}" alt="" title="" /><span>TWITTER</span></a></li>
      <li><a href="http://www.facebook.com"><img src="{{ asset('assets/images/icons/black/facebook.png') }}" alt="" title="" /><span>FACEBOOK</span></a></li>
      <li><a href="http://plus.google.com"><img src="{{ asset('assets/images/icons/black/gplus.png') }}" alt="" title="" /><span>GOOGLE</span></a></li>
      <li><a href="http://www.dribbble.com"><img src="{{ asset('assets/images/icons/black/dribbble.png') }}" alt="" title="" /><span>DRIBBBLE</span></a></li>
      <li><a href="http://www.linkedin.com/"><img src="{{ asset('assets/images/icons/black/linkedin.png') }}" alt="" title="" /><span>LINKEDIN</span></a></li>
      <li><a href="http://www.pinterest.com/"><img src="{{ asset('assets/images/icons/black/pinterest.png') }}" alt="" title="" /><span>PINTEREST</span></a></li>
      </ul>
      <div class="close_popup_button"><a href="#" class="close-popup" data-popup=".popup-social"><img src="{{ asset('assets/images/icons/black/menu_close.png') }}" alt="" title="" /></a></div>
    </div>
    </div>
    <script src="https://cdn.tailwindcss.com"></script>
<script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.validate.min.js') }}" ></script>
<script src="{{ asset('assets/js/swiper.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.custom.js') }}"></script>
  </body>
</html>

