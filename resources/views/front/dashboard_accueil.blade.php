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
  <div data-page="blog" class="page no-toolbar no-navbar">
    <div class="page-content">
    
	<div class="navbarpages navbarpagesbg">
                            <div class="navbar_left">
                                <div class="logo_text"><a href="{{ asset('assets/index.html') }}">BLIX</a></div>
                            </div>
					
			    <div class="navbar_right">
				<a href="#" data-panel="right" class="open-panel"><img src="{{ asset('assets/images/icons/white/user.png') }}" alt="" title="" /></a>
			    </div>
			   		
	</div>
	
     <div id="pages_maincontent">
      
      <h2 class="page_title">TABLEAU DE BORD - Accueil</h2>
     <div class="page_single layout_fullwidth_padding">  
   

		<div class="zkt47p">
			<!-- En-tête avec espacement optimisé -->
			<div class="hgx29m">
				<div class="jwe56d">L'équipe GBAYE</div>
				<div class="ftz87s">BLIX vous souhaite la bienvenue!</div>
			</div>
	
			<!-- Cartes Solde et Bénéfice -->
			<div class="bvx34q">
				<div class="mke93p nxw52p">
					<img src="{{ asset('assets/images/icons/white/portefeuil.png') }}" alt="Icône solde" class="rty67x">
					<div class="sau45w">Solde actuel</div>
					<div class="tgh78p">0.0 FCFA</div>
				</div>
	
				<div class="mke93p pqs89d">
					<img src="{{ asset('assets/images/icons/white/fleche.png') }}" alt="Icône bénéfice" class="rty67x">
					<div class="sau45w">Bénéfice total</div>
					<div class="tgh78p">0.0 FCFA</div>
				</div>
			</div>
	
			<!-- Lien de parrainage et bouton style image -->
			<div class="zmv23q" id="copyContainer">
				<button class="yxb67n" id="copyBtn">
				
					Copier mon lien
				</button>
				<div class="wut89q" id="referralLink">BLIX-parrainage.com/ref/votre-code-unique-ici</div>
			</div>
		</div>
      
			
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
                <a href="#" class="close-popup" data-popup=".popup-signup"><img src="{{ asset('assets/images/icons/black/menu_close.png') }}" alt="" title="" /></a>
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
      <li><a href="http://www.facebook.com"><img src="{{ asset('assets/images/icons/black/facebook.png') }}" alt="" title="" /><span>FACEBOOK</span></a></li>
      <li><a href="http://plus.google.com"><img src="{{ asset('assets/images/icons/black/gplus.png') }}" alt="" title="" /><span>GOOGLE</span></a></li>
      <li><a href="http://www.dribbble.com"><img src="{{ asset('assets/images/icons/black/dribbble.png') }}" alt="" title="" /><span>DRIBBBLE</span></a></li>
      <li><a href="http://www.linkedin.com/"><img src="{{ asset('assets/images/icons/black/linkedin.png') }}" alt="" title="" /><span>LINKEDIN</span></a></li>
      <li><a href="http://www.pinterest.com/"><img src="{{ asset('assets/images/icons/black/pinterest.png') }}" alt="" title="" /><span>PINTEREST</span></a></li>
      </ul>
      <div class="close_popup_button"><a href="#" class="close-popup" data-popup=".popup-social"><img src="{{ asset('assets/images/icons/black/menu_close.png') }}" alt="" title="" /></a></div>
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