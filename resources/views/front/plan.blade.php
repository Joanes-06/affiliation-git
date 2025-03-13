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
    <script src="https://cdn.fedapay.com/checkout.js?v=1.1.7"></script>
    @livewireStyles

</head>
<body id="mobile_wrap">

    <div class="panel-overlay"></div>

    <div class="views">

      <div class="view view-main">
	  
<div class="pages">
  <div data-page="about" class="page no-toolbar no-navbar">
      <!-- En-tête Premium -->
      <header class="enTetePremium">
         <img src="{{asset('assets/images/VISI noir vert.png')}}" alt="Logo" class="logoEntreprise">
         
         <a href="{{ route('logout') }}" class="boutonRetour" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Deconnexion
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
     </header>

    <div class="page-content" >
    
	
      
        <!-- Slider -->
        
        
        <div class="page_single layout_fullwidth_padding">	
            <div class="content-bl">
            <div class="top-title">
              <h3>PLAN D'ABONNEMENT</h3>
          </div>
              <blockquote>
                Accédez à des fichiers de contacts et à des formations exclusives selon votre abonnement. Choisissez votre pack et développez votre réseau !                         </blockquote>
                <section class="sectionCartes">
                    <!-- Carte Débutant -->
                    <div class="carte">
                        <div class="carteEntete">
                            <h2 class="carteTitre">Débutant</h2>
                            <div class="cartePrix" id="prixDebutant">2.000f</div>
                            <div class="carteFrequence" id="frequenceDebutant">à vie</div>
                        </div>
                        <div class="carteContenu">
                            <ul class="listeAvantages">
                                <li class="avantage avantageActif">Accès à la fiche de nos contacts</li>
                                <li class="avantage avantageActif">Retrait d'argent</li>
                                <li class="avantage avantageActif">Accès au groupe WhatsApp</li>
                                <li class="avantage avantageInactif">Formation en trading</li>
                                <li class="avantage avantageInactif">Formation en marketing 360</li>
                                <li class="avantage avantageInactif">Formation sur l'achat en Chine</li>
                                <li class="avantage avantageInactif">Formation en art oratoire</li>
                            </ul>                        
                        </div>
                        <div class="cartePied">
                            <form action="{{ route('feda.callback') }}" method="post" id="payment-form-debutant">
                                @csrf
                                <input type="hidden" name="field" value="test">
                                <script
                                    src="https://cdn.fedapay.com/checkout.js?v=1.1.7"
                                    data-public-key="pk_sandbox_Vur68NwXhzndDz5kBO2TgyZ1"
                                    data-button-text="Souscrire"
                                    data-button-class="boutonInscription"
                                    data-transaction-amount="2000"
                                    data-transaction-description="Souscription au pack débutant de BLIX"
                                    data-currency-iso="XOF"
                                    data-customer-email="{{ Auth::user()->email }}" 
                                    data-customer-firstname="{{ Auth::user()->firstname }}" 
                                    data-customer-lastname="{{ Auth::user()->lastname }}" 
                                    data-callback-url="{{ route('feda.callback') }}"
                                ></script>
                            </form>
                        </div>
                    </div>
                
                    <!-- Carte Pro -->
                    <div class="carte cartePopulaire">
                        <div class="etiquettePopulaire">Populaire</div>
                        <div class="carteEntete">
                            <h2 class="carteTitre">Pro</h2>
                            <div class="cartePrix" id="prixPro">5.000f</div>
                            <div class="carteFrequence" id="frequencePro">à vie</div>
                        </div>
                        <div class="carteContenu">
                            <ul class="listeAvantages">
                                <li class="avantage avantageActif">Accès à la fiche de nos contacts</li>
                                <li class="avantage avantageActif">Retrait d'argent</li>
                                <li class="avantage avantageActif">Accès au groupe WhatsApp</li>
                                <li class="avantage avantageActif">Formation en trading</li>
                                <li class="avantage avantageActif">Formation en marketing 360</li>
                                <li class="avantage avantageActif">Formation sur l'achat en Chine</li>
                                <li class="avantage avantageInactif">Formation en art oratoire</li>
                            </ul>
                        </div>
                        <div class="cartePied">
                            <form action="{{ route('feda.callback') }}" method="post" id="payment-form-pro">
                                @csrf
                                <input type="hidden" name="field" value="test">
                                <script
                                    src="https://cdn.fedapay.com/checkout.js?v=1.1.7"
                                    data-public-key="pk_sandbox_Vur68NwXhzndDz5kBO2TgyZ1"
                                    data-button-text="Souscrire"
                                    data-button-class="boutonInscription"
                                    data-transaction-amount="5000"
                                    data-transaction-description="Souscription au pack pro de BLIX"
                                    data-currency-iso="XOF"
                                    data-customer-email="{{ Auth::user()->email }}" 
                                    data-customer-firstname="{{ Auth::user()->firstname }}" 
                                    data-customer-lastname="{{ Auth::user()->lastname }}" 
                                    data-callback-url="{{ route('feda.callback') }}"
                                ></script>
                            </form>
                            </form>
                        </div>
                    </div>
                
                    <!-- Carte Élite -->
                    <div class="carte">
                        <div class="carteEntete">
                            <h2 class="carteTitre">Élite</h2>
                            <div class="cartePrix" id="prixElite">10.000f</div>
                            <div class="carteFrequence" id="frequenceElite">à vie</div>
                        </div>
                        <div class="carteContenu">
                            <ul class="listeAvantages">
                                <li class="avantage avantageActif">Accès à la fiche de nos contacts</li>
                                <li class="avantage avantageActif">Retrait d'argent</li>
                                <li class="avantage avantageActif">Accès au groupe WhatsApp</li>
                                <li class="avantage avantageActif">Formation en trading</li>
                                <li class="avantage avantageActif">Formation en marketing 360</li>
                                <li class="avantage avantageActif">Formation sur l'achat en Chine</li>
                                <li class="avantage avantageActif">Formation en art oratoire</li>
                            </ul>
                        </div>
                        <div class="cartePied">
                            <form action="{{ route('feda.callback') }}" method="post" id="payment-form-elite">
                                @csrf
                                <input type="hidden" name="field" value="test">
                                <script
                                    src="https://cdn.fedapay.com/checkout.js?v=1.1.7"
                                    data-public-key="pk_sandbox_Vur68NwXhzndDz5kBO2TgyZ1"
                                    data-button-text="Souscrire"
                                    data-button-class="boutonInscription"
                                    data-transaction-amount="10000"
                                    data-transaction-description="Souscription au pack elite de BLIX"
                                    data-currency-iso="XOF"
                                    data-customer-email="{{ Auth::user()->email }}" 
                                    data-customer-firstname="{{ Auth::user()->firstname }}" 
                                    data-customer-lastname="{{ Auth::user()->lastname }}" 
                                    data-callback-url="{{ route('feda.callback') }}"
                                ></script>
                            </form>
                        </div>
                    </div>
                </section>
                
             
        
               {{--  <a class="nav-link" href="{{ route('contacts.index') }}">
                    <i class="fas fa-address-book"></i> Télécharger contacts
                </a> --}}
            
          
			  
			  
			  
			  
         </div>
         </div>
      
      
      
      
    </div>
  </div>
</div>
         </div>
    </div>

    
	
    <!-- Forgot Password Popup -->
    <div class="popup popup-forgot">
        <div class="content-block">
            <h4>FORGOT PASSWORD</h4>
            <div class="loginform">
                <form id="ForgotForm" method="post">
                    <input type="text" name="Email" value="" class="form_input required" placeholder="email" />
                    <input type="submit" name="submit" class="form_submit" id="submitforgot" value="RESEND PASSWORD" />
                </form>
                <div class="signup_bottom">
                    <p>Check your email and follow the instructions to reset your password.</p>
                </div>
            </div>
            <div class="close_popup_button">
                <a href="{{ asset('assets/#') }}" class="close-popup" data-popup=".popup-forgot"><img src="{{ asset('assets/images/icons/black/menu_close.png') }}" alt="" title="" /></a>
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
      <li><a href="http://www.facebook.com/"><img src="{{ asset('assets/images/icons/black/facebook.png') }}" alt="" title="" /><span>FACEBOOK</span></a></li>
      <li><a href="http://plus.google.com'"><img src="{{ asset('assets/images/icons/black/gplus.png') }}" alt="" title="" /><span>GOOGLE</span></a></li>
      <li><a href="http://www.dribbble.com/"><img src="{{ asset('assets/images/icons/black/dribbble.png') }}" alt="" title="" /><span>DRIBBBLE</span></a></li>
      <li><a href="http://www.linkedin.com/"><img src="{{ asset('assets/images/icons/black/linkedin.png') }}" alt="" title="" /><span>LINKEDIN</span></a></li>
      <li><a href="http://www.pinterest.com/"><img src="{{ asset('assets/images/icons/black/pinterest.png') }}" alt="" title="" /><span>PINTEREST</span></a></li>
      </ul>
      <div class="close_popup_button"><a href="{{ asset('assets/#') }}" class="close-popup" data-popup=".popup-social"><img src="{{ asset('assets/images/icons/black/menu_close.png') }}" alt="" title="" /></a></div>
    </div>
    </div>
    
<script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.validate.min.js') }}" ></script>
<script src="{{ asset('assets/js/swiper.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.custom.js') }}"></script>
@livewireScripts
  </body>
</html>