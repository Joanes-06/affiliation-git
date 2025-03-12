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
			<div class="swiper-slide">		
				<div class="subnav_header backtonav"><img src="{{ asset('assets/images/icons/white/back.png') }}" alt="" title="" /><span>BACK TO MAIN MENU</span></div>
				<nav class="main_nav_underline">
				<ul>

				<li><a href="{{ asset('assets/shop.html') }}"><img src="{{ asset('assets/images/icons/white/car.png') }}" alt="" title="" /><span>Cars</span></a></li>
				<li><a href="{{ asset('assets/shop.html') }}"><img src="{{ asset('assets/images/icons/white/bus.png') }}" alt="" title="" /><span>Buses</span></a></li>
				<li><a href="{{ asset('assets/shop.html') }}"><img src="{{ asset('assets/images/icons/white/bike.png') }}" alt="" title="" /><span>Bikes</span></a></li>
				
				<li><a href="{{ asset('assets/shop.html') }}"><img src="{{ asset('assets/images/icons/white/drink.png') }}" alt="" title="" /><span>Drinks</span></a></li>
				<li><a href="{{ asset('assets/shop.html') }}"><img src="{{ asset('assets/images/icons/white/food.png') }}" alt="" title="" /><span>Food</span></a></li>
				<li><a href="{{ asset('assets/shop.html') }}"><img src="{{ asset('assets/images/icons/white/orders.png') }}" alt="" title="" /><span>Clothes</span></a></li>
				
				<li><a href="{{ asset('assets/shop.html') }}"><img src="{{ asset('assets/images/icons/white/rocket.png') }}" alt="" title="" /><span>Rockets</span></a></li>
				<li><a href="{{ asset('assets/shop.html') }}"><img src="{{ asset('assets/images/icons/white/briefcase.png') }}" alt="" title="" /><span>Accessories</span></a></li>
				<li><a href="{{ asset('assets/shop.html') }}"><img src="{{ asset('assets/images/icons/white/gift.png') }}" alt="" title="" /><span>Gifts</span></a></li>
				<li class="subnav opensubsubnav"><img src="{{ asset('assets/images/icons/white/categories.png') }}" alt="" title="" /><span>Third sublevel menu</span></li>
				</ul>
				</nav>
			</div>
			<div class="swiper-slide">		
				<div class="subnav_header backtosubnav"><img src="{{ asset('assets/images/icons/white/back.png') }}" alt="" title="" /><span>BACK TO 2 SUBLEVEL MENU</span></div>
				<nav class="main_nav_underline">
				<ul>

				<li><a href="{{ asset('assets/shop.html') }}"><img src="{{ asset('assets/images/icons/white/car.png') }}" alt="" title="" /><span>Subcategory 01</span></a></li>
				<li><a href="{{ asset('assets/shop.html') }}"><img src="{{ asset('assets/images/icons/white/bus.png') }}" alt="" title="" /><span>Subcategory 02</span></a></li>
				<li><a href="{{ asset('assets/shop.html') }}"><img src="{{ asset('assets/images/icons/white/bike.png') }}" alt="" title="" /><span>Subcategory 03</span></a></li>
				<li><a href="{{ asset('assets/shop.html') }}"><img src="{{ asset('assets/images/icons/white/drink.png') }}" alt="" title="" /><span>Subcategory 04</span></a></li>
				<li><a href="{{ asset('assets/shop.html') }}"><img src="{{ asset('assets/images/icons/white/food.png') }}" alt="" title="" /><span>Subcategory 05</span></a></li>

				
				</ul>
				</nav>
			</div>
		    </div>
		</div>
    </div>

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
			  
                  <!-- Slider -->
                 	  
                  @livewire('navigation-menu')

	<div class="page_single layout_fullwidth_padding">	
	  
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
                        <button class="boutonInscription"
                        id="pay-btn-1"
                        data-transaction-amount="1000"
                        data-transaction-description="Acheter mon produit"
                        data-customer-email="johndoe@gmail.com"
                        data-customer-lastname="Doe"
                        >S'inscrire</button>
                        <script type="text/javascript">
                            FedaPay.init('#pay-btn-1', { public_key:'pk_sandbox_PcLvHspU5B559J8ru0DErYg9',
                            transaction: {
                            amount: 2000,
                            description: 'Souscription au pack debutant de BLIX'
                            },
                            customer: {
                            email: "{{ auth()->user()->email }}",
                            lastname: "{{ auth()->user()->lastname }}",
                            firstname: "{{ auth()->user()->firstname }}",
                        }
                             });
                        </script>
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
                        <button id="pay-btn-2" class="boutonInscription">S'inscrire</button>
                        <script type="text/javascript">
                            FedaPay.init('#pay-btn-2', { public_key:'pk_sandbox_PcLvHspU5B559J8ru0DErYg9',
                            transaction: {
                            amount: 5000,
                            description: 'Souscription au pack pro de BLIX'
                            },
                            customer: {
                            email: "{{ auth()->user()->email }}",
                            lastname: "{{ auth()->user()->lastname }}",
                            firstname: "{{ auth()->user()->firstname }}",
                            
                        }
                             });
                        </script>
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
                        <button id="pay-btn-3" class="boutonInscription">S'inscrire</button>
                        <script type="text/javascript">
                            FedaPay.init('#pay-btn-3', { public_key:'pk_sandbox_PcLvHspU5B559J8ru0DErYg9',
                            transaction: {
                            amount: 10000,
                            description: 'Souscription au pack Elite de BLIX'
                            },
                            customer: {
                            email: "{{ auth()->user()->email }}",
                            lastname: "{{ auth()->user()->lastname }}",
                            firstname: "{{ auth()->user()->firstname }}",
                        }
                             });
                        </script>
                    </div>
                </div>
            </section>
             
            <li class="nav-item">
                <a class="nav-link" href="{{ route('contacts.index') }}">
                    <i class="fas fa-address-book"></i> Télécharger contacts
                </a>
            </li>
              <a href="{{ asset('assets/index.html') }}" class="button_full btyellow">Revenir à l'accueil</a>

           
			  
			  
			  
			  
         </div>
      
      </div>
      
      
    </div>
  </div>
</div>
         </div>
    </div>

    <!-- Login Popup -->
    <div class="popup popup-login">
        <div class="content-block">
            <h4>LOGIN</h4>
            <div class="loginform">
                <form id="LoginForm" method="post">
                    <input type="text" name="Username" value="" class="form_input required" placeholder="username" />
                    <input type="password" name="Password" value="" class="form_input required" placeholder="password" />
                    <div class="forgot_pass"><a href="{{ asset('assets/#') }}" data-popup=".popup-forgot" class="open-popup">Forgot Password?</a></div>
                    <input type="submit" name="submit" class="form_submit" id="submit" value="SIGN IN" />
                </form>
                <div class="signup_bottom">
                    <p>Don't have an account?</p>
                    <a href="{{ asset('assets/#') }}" data-popup=".popup-signup" class="open-popup">SIGN UP</a>
                </div>
            </div>
            <div class="close_popup_button">
                <a href="{{ asset('assets/#') }}" class="close-popup" data-popup=".popup-login"><img src="{{ asset('assets/images/icons/black/menu_close.png') }}" alt="" title="" /></a>
            </div>
        </div>
    </div>

    <!-- Register Popup -->
    <div class="popup popup-signup">
        <div class="content-block">
            <h4>REGISTER</h4>
            <div class="loginform">
                <form id="RegisterForm" method="post">
                    <input type="text" name="Username" value="" class="form_input required" placeholder="Username" />
                    <input type="text" name="Email" value="" class="form_input required" placeholder="Email" />
                    <input type="password" name="Password" value="" class="form_input required" placeholder="Password" />
                    <input type="submit" name="submit" class="form_submit" id="submitregister" value="SIGN UP" />
                </form>
		<h5>- OR REGISTER WITH A SOCIAL ACCOUNT -</h5>
		<div class="signup_social">
			<a href="http://www.facebook.com/" class="signup_facebook">FACEBOOK</a>
			<a href="http://www.twitter.com/" class="signup_twitter">TWITTER</a>            
		</div>		
            </div>
            <div class="close_popup_button">
                <a href="{{ asset('assets/#') }}" class="close-popup" data-popup=".popup-signup"><img src="{{ asset('assets/images/icons/black/menu_close.png') }}" alt="" title="" /></a>
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