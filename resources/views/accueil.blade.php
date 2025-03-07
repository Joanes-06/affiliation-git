<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, minimal-ui">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<link rel="apple-touch-icon" href="{{ asset('blix-main/images/apple-touch-icon.png') }}" />
<link rel="apple-touch-startup-image" href="{{ asset('blix-main/images/apple-touch-startup-image-640x920.png') }}">
<title>blix - mobile template</title>
<link rel="stylesheet" href="{{ asset('blix-main/css/framework7.css') }}">
<link rel="stylesheet" href="{{ asset('blix-main/style.css') }}">
<link rel="stylesheet" href="{{ asset('blix-main/jo.css') }}">
<link type="text/css" rel="stylesheet" href="{{ asset('blix-main/css/swipebox.css') }}" />
<link type="text/css" rel="stylesheet" href="{{ asset('blix-main/css/animations.css') }}" />
<link href="{{ asset('blix-main/https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('blix-main/https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.min.css') }}">

</head>
<body id="mobile_wrap">

    <div class="statusbar-overlay"></div>

    <div class="panel-overlay"></div>

    <div class="panel panel-left panel-reveal">
	<div class="view view-subnav">
	<div class="pages">
		<div data-page="panel-leftmenu" class="page pagepanel">	
                     <div class="page-content">
			<nav class="main_nav_underline">
			<ul>
			<li><a href="{{ asset('blix-main/index.html') }}" class="close-panel" data-view=".view-main"><img src="{{ asset('blix-main/images/icons/white/home.png') }}" alt="" title="" /><span>Home</span></a></li>
			<li><a href="{{ asset('blix-main/about.html') }}" class="close-panel" data-view=".view-main"><img src="{{ asset('blix-main/images/icons/white/mobile.png') }}" alt="" title="" /><span>About</span></a></li>
			<li><a href="{{ asset('blix-main/features.html') }}" class="close-panel" data-view=".view-main"><img src="{{ asset('blix-main/images/icons/white/features.png') }}" alt="" title="" /><span>Features</span></a></li>
			
			<li><a href="{{ asset('blix-main/#') }}" data-popup=".popup-login" class="open-popup close-panel"><img src="{{ asset('blix-main/images/icons/white/lock.png') }}" alt="" title="" /><span>Login</span></a></li>
			<li><a href="{{ asset('blix-main/team.html') }}" class="close-panel" data-view=".view-main"><img src="{{ asset('blix-main/images/icons/white/users.png') }}" alt="" title="" /><span>Team</span></a></li>
			<li><a href="{{ asset('blix-main/blog.html') }}" class="close-panel" data-view=".view-main"><img src="{{ asset('blix-main/images/icons/white/blog.png') }}" alt="" title="" /><span>Blog</span></a></li>		

			<li><a href="{{ asset('blix-main/photos.html') }}" class="close-panel" data-view=".view-main"><img src="{{ asset('blix-main/images/icons/white/photos.png') }}" alt="" title="" /><span>Photos</span></a></li>
			<li><a href="{{ asset('blix-main/videos.html') }}" class="close-panel" data-view=".view-main"><img src="{{ asset('blix-main/images/icons/white/video.png') }}" alt="" title="" /><span>Videos</span></a></li>
			<li><a href="{{ asset('blix-main/music.html') }}" class="close-panel" data-view=".view-main"><img src="{{ asset('blix-main/images/icons/white/music.png') }}" alt="" title="" /><span>Music</span></a></li>
			
			<li><a href="{{ asset('blix-main/shop.html') }}" class="close-panel" data-view=".view-main"><img src="{{ asset('blix-main/images/icons/white/shop.png') }}" alt="" title="" /><span>Shop</span></a></li>
			<li class="subnav"><a href="{{ asset('blix-main/categories.html') }}"><img src="{{ asset('blix-main/images/icons/white/categories.png') }}" alt="" title="" /><span>Sub level menu</span></a></li>
			<li><a href="{{ asset('blix-main/cart.html') }}" class="close-panel" data-view=".view-main"><img src="{{ asset('blix-main/images/icons/white/cart.png') }}" alt="" title="" /><span>Cart</span></a></li>
			
			<li><a href="{{ asset('blix-main/tables.html') }}" class="close-panel" data-view=".view-main"><img src="{{ asset('blix-main/images/icons/white/tables.png') }}" alt="" title="" /><span>Tables</span></a></li>
			<li><a href="{{ asset('blix-main/chat.html') }}" class="close-panel" data-view=".view-main"><img src="{{ asset('blix-main/images/icons/white/message.png') }}" alt="" title="" /><span>Chat messages</span></a></li>
			<li><a href="{{ asset('blix-main/form.html') }}" class="close-panel" data-view=".view-main"><img src="{{ asset('blix-main/images/icons/white/form.png') }}" alt="" title="" /><span>Custom Form</span></a></li>
			
			
			<li><a href="{{ asset('blix-main/tel:012345678') }}" class="close-panel external" data-view=".view-main"><img src="{{ asset('blix-main/images/icons/white/phone.png') }}" alt="" title="" /><span>Call now!</span></a></li>
			<li><a href="{{ asset('blix-main/contact.html') }}" class="close-panel" data-view=".view-main"><img src="{{ asset('blix-main/images/icons/white/contact.png') }}" alt="" title="" /><span>Contact</span></a></li>
			</ul>
			</nav>
                     </div>
		</div>
	  </div>
	</div>  
    </div>

    <div class="panel panel-right panel-reveal">
      <div class="user_login_info">
	  
                <div class="user_thumb">
                <img src="{{ asset('blix-main/images/page_photo.jpg') }}" alt="" title="" />
                  <div class="user_details">
                   <p>Welcome, <span>Nathalie</span></p>
                  </div>  
                  <div class="user_avatar"><img src="{{ asset('blix-main/images/avatar.jpg') }}" alt="" title="" /></div>       
                </div>
				
                  <nav class="user-nav">
                    <ul>
                      <li><a href="{{ asset('blix-main/features.html') }}" class="close-panel"><img src="{{ asset('blix-main/images/icons/white/settings.png') }}" alt="" title="" /><span>Account Settings</span></a></li>
                      <li><a href="{{ asset('blix-main/features.html') }}" class="close-panel"><img src="{{ asset('blix-main/images/icons/white/briefcase.png') }}" alt="" title="" /><span>My Account</span></a></li>
                      <li><a href="{{ asset('blix-main/features.html') }}" class="close-panel"><img src="{{ asset('blix-main/images/icons/white/message.png') }}" alt="" title="" /><span>Messages</span><strong>12</strong></a></li>
                      <li><a href="{{ asset('blix-main/features.html') }}" class="close-panel"><img src="{{ asset('blix-main/images/icons/white/love.png') }}" alt="" title="" /><span>Favorites</span><strong>5</strong></a></li>
                      <li><a href="{{ asset('blix-main/index.html') }}" class="close-panel"><img src="{{ asset('blix-main/images/icons/white/lock.png') }}" alt="" title="" /><span>Logout</span></a></li>
                    </ul>
                  </nav>
      </div>
    </div>

    <div class="views">

      <div class="view view-main">



        <div class="pages">

          <div data-page="index" class="page homepage">
            <div class="page-content">
			
			    <div class="navbarpages">
					<div class="navbar_left">
						<div class="logo_text"><a href="{{ asset('blix-main/index.html') }}">BLIX</a></div>
					</div>
								
				
                </div>

                  <!-- Slider -->
                 <div class="swiper-container slidertoolbar swiper-init" data-effect="slide" data-parallax="true" data-pagination=".swiper-pagination"  data-next-button=".swiper-button-next" data-prev-button=".swiper-button-prev">
                    <div class="swiper-wrapper">
                    
                      <div class="swiper-slide" style="background-image: url('{{ asset('blix-main/images/SL1.jpg') }}');">
		     <div class="slider_trans">
			 <div class="slider-caption">
			          <span class="subtitle" data-swiper-parallax="-60%">BIENVENUE SUR BLIX</span>
				  <h2 data-swiper-parallax="-100%">BOOSTEZ VOTRE RÉSEAU !</h2>
				  
				  <p data-swiper-parallax="-30%">Accédez à des contacts exclusifs et des formations enrichissantes. Gagnez 50 % sur chaque parrainage !</p>
			 </div>
		      </div> 
                       </div>
                      <div class="swiper-slide" style="background-image: url('{{ asset('blix-main/images/SL2.jpg') }}');">
			<div class="slider_trans">		  
				<div class="slider-caption">
				<span class="subtitle" data-swiper-parallax="-60%">BIENVENUE SUR BLIX</span>
				<h2 data-swiper-parallax="-100%">GAGNEZ JUSQU'À 50 % PAR PARRAINAGE !</h2>
				
				<p data-swiper-parallax="-30%">Invitez vos amis et touchez des commissions sur 5 générations !</p>
				</div>	
			</div>	
                      </div>
                      <div class="swiper-slide" style="background-image: url('{{ asset('blix-main/images/SL3.jpg') }}');">
			<div class="slider_trans">		  
				<div class="slider-caption">
				<span class="subtitle" data-swiper-parallax="-60%">BIENVENUE SUR BLIX</span>
				<h2 data-swiper-parallax="-100%">CHOISISSEZ VOTRE PACK MAINTENANT !</h2>
				
				<p data-swiper-parallax="-30%">Profitez de nos packs avantageux : contacts premium, formations variées et gains sur parrainage !</p>
				</div>
                       </div>
		   </div> 		   
                    </div>
                    <div class="swiper-pagination"></div>
			<div class="swiper-button-prev"></div>
			<div class="swiper-button-next"></div>	
                  </div>
			  
		 <div class="swiper-container-toolbar swiper-toolbar swiper-init" data-effect="slide" data-slides-per-view="1" data-slides-per-group="1" data-space-between="0" data-pagination=".swiper-pagination-toolbar">
			<div class=""></div>
			<div class="">
			  <div class="swiper-slide toolbar-icon">
				<a href="{{ asset('blix-main/#') }}" data-popup=".popup-signup" class="open-popup"><img src="{{ asset('blix-main/images/icons/blue/users.png') }}" alt="" title="" /><span>INSCRIPTION</span></a>
			        <a href="{{ asset('blix-main/#') }}" data-popup=".popup-login" class="open-popup"><img src="{{ asset('blix-main/images/icons/blue/user.png') }}" alt="" title="" /><span>CONNEXION</span></a>
				<a href="{{ asset('blix-main/#') }}" data-popup=".popup-plan" class="open-popup"><img src="{{ asset('blix-main/images/icons/blue/more.png') }}" alt="" title="" /><span>PACK DISPONIBLE</span></a>
				<a href="{{ asset('blix-main/#') }}" data-popup=".popup-temoignage" class="open-popup"><img src="{{ asset('blix-main/images/icons/blue/temoignage.png') }}" alt="" title="" /><span>TÉMOIGNAGE</span></a>
				<a href="{{ asset('blix-main/#') }}" data-popup=".popup-faq" class="open-popup"><img src="{{ asset('blix-main/images/icons/blue/features.png') }}" alt="" title="" /><span>FAQ</span></a>
				<a href="{{ asset('blix-main/#') }}" data-popup=".popup-contact" class="open-popup"><img src="{{ asset('blix-main/images/icons/blue/contact.png') }}" alt="" title="" /><span>CONTACT</span></a>
<!-- 				<a href="{{ asset('blix-main/about.html') }}" data-view=".view-main" class="open-popup"><img src="{{ asset('blix-main/images/icons/blue/contact.png') }}" alt="" title="" /><span>CONTACT</span></a>
 -->			  </div> 
			 

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
            <h4>BLIX</h4>
            <h3>Se connecter</h3>
            <p>Créez un compte pour développer votre réseau et augmenter vos revenus.</p>
            <div class="loginform">
                <form id="LoginForm" method="post">
                    <input type="text" name="Username" value="" class="form_input required" placeholder="Email" />
                    <input type="password" name="Password" value="" class="form_input required" placeholder="Mot de passe" />
                    <div class="forgot_pass"><a href="{{ asset('blix-main/#') }}" data-popup=".popup-forgot" class="open-popup">Mot de passe oublié?</a></div>
                    <input type="submit" name="submit" class="form_submit" id="submitlogin" value="SE CONNECTER" />
                </form>
                <div class="signup_bottom">
                    <p>Vous n'avez pas de compte ?</p>
                    <a href="{{ asset('blix-main/#') }}" data-popup=".popup-signup" class="open-popup">S'INSCRIRE</a>
                </div>
            </div>
            <div class="close_popup_button">
                <a href="{{ asset('blix-main/#') }}" class="close-popup"><img src="{{ asset('blix-main/images/icons/black/menu_close.png') }}" alt="" title="" /></a>
            </div>
        </div>
    </div>

    <!-- Register Popup -->
    <div class="popup popup-signup">
        <div class="content-block">
          <h4>BLIX</h4>
          <h3>Inscription</h3>
          <p>Créez un compte pour développer votre réseau et augmenter vos revenus.</p>
            <div class="loginform">
                <form id="RegisterForm" method="post">
                   
                    <input type="text" name="Username" value="" class="form_input required" placeholder="Nom et prénom" />
                    <input type="text" name="Email" value="" class="form_input required" placeholder="Email" />
                    <input type="password" name="Password" value="" class="form_input required" placeholder="Mot de de passe" />
                    <input type="password" name="Password" value="" class="form_input required" placeholder="Confirmez le mot de de passe" />
                    <input type="tel" id="phone" name="phone" class="form_input required" placeholder="Entrez votre numéro">
                    <input type="text" name="Ville" id="ville" class="form_input required" placeholder="Ville"  />
                    <input type="text" name="CodeParrain" id="code-parrain" class="form_input" placeholder="Code Parrain (Si vous en avez)" />
                    <input type="submit" name="submit" class="form_submit" id="submitregister" value="S'INSCRIRE" />
                </form>	
            </div>
            <div class="close_popup_button">
                <a href="{{ asset('blix-main/#') }}" class="close-popup"><img src="{{ asset('blix-main/images/icons/black/menu_close.png') }}" alt="" title="" /></a>
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
                <a href="{{ asset('blix-main/#') }}" class="close-popup"><img src="{{ asset('blix-main/images/icons/black/menu_close.png') }}" alt="" title="" /></a>
            </div>
        </div>
    </div>
    <!-- Forgot contact Popup -->
    <div class="popup popup-contact">
        <div class="content-block">
            <h4>NOS CONTACTS</h4>
           
              
              <div class="conteneur-coordonnees">
                  <div class="carte-coordonnee">
                      <div ><img src="{{ asset('blix-main/images/icons/blue/contact.png') }}" alt="" title="" /></div>
                      <div class="titre-coordonnee">Email Support</div>
                      <div class="detail-coordonnee">support@notreplateforme.com</div>
                      <button class="bouton-copier" data-copier="support@notreplateforme.com">Copier</button>
                  </div>
      
                  <div class="carte-coordonnee">
                      <div><img src="{{ asset('blix-main/images/icons/blue/phone.png') }}" alt="" title="" /></div>
                      <div class="titre-coordonnee">Téléphone</div>
                      <div class="detail-coordonnee">+33 1 23 45 67 89</div>
                      <button class="bouton-copier" data-copier="+33 1 23 45 67 89">Copier</button>
                  </div>
              </div>
          
            <div class="close_popup_button">
                <a href="{{ asset('blix-main/#') }}" class="close-popup"><img src="{{ asset('blix-main/images/icons/black/menu_close.png') }}" alt="" title="" /></a>
            </div>
        </div>
    </div>
    <!-- Forgot temoignage Popup -->
    <div class="popup popup-temoignage">
        <div class="content-block">
            <h4>TÉMOIGNAGE</h4>
            <h2 class="titre-section">Questions Témoignages</h2>
                  <div class="carte-temoignage">
                      <div class="nom-temoin">Marie Dubois</div>
                      <p class="texte-temoignage">
                          "Ce système de partage de fichiers a complètement transformé ma façon de collaborer avec mes collègues. Rapide, intuitif et sécurisé !"
                      </p>
                  </div>
      
                  <div class="carte-temoignage">
                      <div class="nom-temoin">Jean Mercier</div>
                      <p class="texte-temoignage">
                          "Le programme de parrainage est vraiment généreux. J'ai déjà invité plusieurs de mes contacts et tous sont ravis !"
                      </p>
                  </div>
                  <div class="carte-temoignage">
                      <div class="nom-temoin">Jean Mercier</div>
                      <p class="texte-temoignage">
                          "Le programme de parrainage est vraiment généreux. J'ai déjà invité plusieurs de mes contacts et tous sont ravis !"
                      </p>
                  </div>
                  <div class="carte-temoignage">
                      <div class="nom-temoin">Jean Mercier</div>
                      <p class="texte-temoignage">
                          "Le programme de parrainage est vraiment généreux. J'ai déjà invité plusieurs de mes contacts et tous sont ravis !"
                      </p>
                  </div>
                  <div class="carte-temoignage">
                      <div class="nom-temoin">Jean Mercier</div>
                      <p class="texte-temoignage">
                          "Le programme de parrainage est vraiment généreux. J'ai déjà invité plusieurs de mes contacts et tous sont ravis !"
                      </p>
    
          </div>
          <div class="close_popup_button">
            <a href="{{ asset('blix-main/#') }}" class="close-popup"><img src="{{ asset('blix-main/images/icons/black/menu_close.png') }}" alt="" title="" /></a>
        </div>
        </div>
    </div>
    <!-- popop-faq -->
    <div class="popup popup-faq">
        <div class="content-block">
            <h4>TÉMOIGNAGE</h4>
            
              <h2 class="titre-section">Questions Fréquentes</h2>
              
              <div class="carte-question">
                  <div class="entete-question">
                      Comment fonctionne le partage de fichiers ?
                      <span class="icone-plus">+</span>
                  </div>
                  <div class="contenu-reponse">
                      Le partage de fichiers est simple : téléchargez votre fichier, générez un lien unique et partagez-le avec vos contacts.
                  </div>
              </div>
  
              <div class="carte-question">
                  <div class="entete-question">
                      Comment marche le programme de parrainage ?
                      <span class="icone-plus">+</span>
                  </div>
                  <div class="contenu-reponse">
                      Chaque contact que vous parrainez vous rapporte des points ou des récompenses. Plus vous parrainez, plus vous gagnez !
                  </div>
              </div>
              <div class="carte-question">
                  <div class="entete-question">
                      Comment marche le programme de parrainage ?
                      <span class="icone-plus">+</span>
                  </div>
                  <div class="contenu-reponse">
                      Chaque contact que vous parrainez vous rapporte des points ou des récompenses. Plus vous parrainez, plus vous gagnez !
                  </div>
              </div>
              <div class="carte-question">
                  <div class="entete-question">
                      Comment marche le programme de parrainage ?
                      <span class="icone-plus">+</span>
                  </div>
                  <div class="contenu-reponse">
                      Chaque contact que vous parrainez vous rapporte des points ou des récompenses. Plus vous parrainez, plus vous gagnez !
                  </div>
              </div>
              <div class="carte-question">
                  <div class="entete-question">
                      Comment marche le programme de parrainage ?
                      <span class="icone-plus">+</span>
                  </div>
                  <div class="contenu-reponse">
                      Chaque contact que vous parrainez vous rapporte des points ou des récompenses. Plus vous parrainez, plus vous gagnez !
                  </div>
              </div>
  
              <div class="carte-question">
                  <div class="entete-question">
                      Mes fichiers sont-ils sécurisés ?
                      <span class="icone-plus">+</span>
                  </div>
                  <div class="contenu-reponse">
                      Nous utilisons un cryptage de pointe pour garantir la confidentialité et la sécurité de vos fichiers.
                  </div>
              </div>
          
          <div class="close_popup_button">
            <a href="{{ asset('blix-main/#') }}" class="close-popup"><img src="{{ asset('blix-main/images/icons/black/menu_close.png') }}" alt="" title="" /></a>
        </div>
        </div>
    </div>
	
    <div class="popup popup-plan">
        <div class="content-block">
            <h4>Plans d'Abonnement</h4>
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
                       
                    </div>
                </section>
                
        
           
         
            <div class="close_popup_button">
                <a href="{{ asset('blix-main/#') }}" class="close-popup"><img src="{{ asset('blix-main/images/icons/black/menu_close.png') }}" alt="" title="" /></a>
            </div>
        </div>
    </div>
	
    <!-- Social Icons Popup -->
    <div class="popup popup-social">
    <div class="content-block">
      <h4>Social Share</h4>
      <p>Share icons solution that allows you share and increase your social popularity.</p>
      <ul class="social_share">
      <li><a href="{{ asset('blix-main/http://twitter.com/') }}" class="external"><img src="{{ asset('blix-main/images/icons/black/twitter.png') }}" alt="" title="" /><span>TWITTER</span></a></li>
      <li><a href="{{ asset('blix-main/http://www.facebook.com/') }}" class="external"><img src="{{ asset('blix-main/images/icons/black/facebook.png') }}" alt="" title="" /><span>FACEBOOK</span></a></li>
      <li><a href="{{ asset('blix-main/http://plus.google.com') }}" class="external"><img src="{{ asset('blix-main/images/icons/black/gplus.png') }}" alt="" title="" /><span>GOOGLE</span></a></li>
      <li><a href="{{ asset('blix-main/http://www.dribbble.com/') }}" class="external"><img src="{{ asset('blix-main/images/icons/black/dribbble.png') }}" alt="" title="" /><span>DRIBBBLE</span></a></li>
      <li><a href="{{ asset('blix-main/http://www.linkedin.com/') }}" class="external"><img src="{{ asset('blix-main/images/icons/black/linkedin.png') }}" alt="" title="" /><span>LINKEDIN</span></a></li>
      <li><a href="{{ asset('blix-main/http://www.pinterest.com/') }}" class="external"><img src="{{ asset('blix-main/images/icons/black/pinterest.png') }}" alt="" title="" /><span>PINTEREST</span></a></li>
      </ul>
      <div class="close_popup_button"><a href="{{ asset('blix-main/#') }}" class="close-popup"><img src="{{ asset('blix-main/images/icons/black/menu_close.png') }}" alt="" title="" /></a></div>
    </div>
    </div>

    
    <script src="{{ asset('blix-main/https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js') }}"></script>
    <script>
      var input = document.querySelector("#phone");
      var iti = window.intlTelInput(input, {
        initialCountry: "bf", // Burkina Faso par défaut
        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js" // Validation et utils supplémentaires
      });
    </script>
   <script>
    // Script pour gérer l'interaction des questions FAQ
    document.querySelectorAll('.entete-question').forEach(entete => {
        entete.addEventListener('click', () => {
            const carteQuestion = entete.closest('.carte-question');
            carteQuestion.classList.toggle('actif');
        });
    });
</script>
<script>
  // Script pour la copie des coordonnées
  document.querySelectorAll('.bouton-copier').forEach(bouton => {
      bouton.addEventListener('click', (e) => {
          const textACopier = e.target.getAttribute('data-copier');
          
          // Créer un élément temporaire pour copier
          const elementTemp = document.createElement('textarea');
          elementTemp.value = textACopier;
          document.body.appendChild(elementTemp);
          
          // Sélectionner et copier
          elementTemp.select();
          document.execCommand('copy');
          
          // Supprimer l'élément temporaire
          document.body.removeChild(elementTemp);
          
          // Feedback visuel
          e.target.textContent = 'Copié !';
          e.target.style.backgroundColor = '#18ba1a';
          
          setTimeout(() => {
              e.target.textContent = 'Copier';
              e.target.style.backgroundColor = '#18ba1a';
          }, 2000);
      });
  });
</script>
<script src="{{ asset('blix-main/js/jquery-1.10.1.min.js') }}"></script>
<script src="{{ asset('blix-main/js/jquery.validate.min.js') }}" ></script>
<script src="{{ asset('blix-main/js/framework7.js') }}"></script>
<script src="{{ asset('blix-main/js/jquery.swipebox.js') }}"></script>
<script src="{{ asset('blix-main/js/jquery.fitvids.js') }}"></script>
<script src="{{ asset('blix-main/js/email.js') }}"></script>
<script src="{{ asset('blix-main/js/audio.min.js') }}"></script>
<script src="{{ asset('blix-main/js/my-app.js') }}"></script>
  </body>
</html>