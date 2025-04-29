@extends('front.layout_dashboard')

@section('content')
    


		<div class="zkt47p">
			<!-- En-tête avec espacement optimisé -->
<div class="hgx29m">
    <div class="jwe56d">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</div>
    <div class="ftz87s"> VISIBILITY vous souhaite la bienvenue!</div>
</div>

@if(session('success'))
    <div class="custom-alert-success">
        {{ session('success') }}
    </div>
@endif




	
			<!-- Cartes Solde et Bénéfice -->
			<div class="bvx34q">
				<div class="mke93p nxw52p">
					<img src="{{ asset('assets/images/icons/white/portefeuil.png') }}" alt="Icône solde" class="rty67x">
					<div class="sau45w">Solde actuel</div>
					<div class="tgh78p">{{ number_format($solde, 2) }}FCFA</div>
				</div>

                <div class="pp mt-2">
                    <a href="{{ route('withdraw.funds') }}" class="bouton_whatsapp_unique mt-2">
                        <span class="icone_retrait_speciale">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <!-- Icône de retrait (exemple : une flèche vers le bas) -->
                                <path d="M12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2ZM12 20C7.59 20 4 16.41 4 12C4 7.59 7.59 4 12 4C16.41 4 20 7.59 20 12C20 16.41 16.41 20 12 20ZM13 13H16L12 17L8 13H11V7H13V13Z" fill="white"/>
                            </svg>
                        </span>
                        <span class="texte_bouton_retrait">Retirer des fonds</span>
                    </a>
                  </div>
	
				<div class="mke93p pqs89d">
					<img src="{{ asset('assets/images/icons/white/fleche.png') }}" alt="Icône bénéfice" class="rty67x">
					<div class="sau45w">Bénéfice total</div>
					<div class="tgh78p">{{ number_format($benefice_total, 2) }}FCFA</div> 
				</div>
			</div>
	
		<!-- Lien de parrainage et bouton style image -->
<div class="zmv23q" id="copyContainer">
    <button class="yxb67n" id="copyBtn">
        Copier mon lien
    </button>
    <div class="wut89q" id="referralLink">{{ route('register', ['code' => Auth::user()->code_promo]) }}</div>
</div>


      <div class="pp mb-2">
        <a href="https://wa.me/votrenuméro" class="bouton_whatsapp_unique mb-2">
            <span class="icone_whatsapp_speciale">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M17.6 6.31999C16.8 5.49999 15.8 4.84999 14.7 4.39999C13.6 3.94999 12.5 3.69999 11.3 3.69999C10.3 3.69999 9.30001 3.84999 8.40001 4.19999C7.50001 4.54999 6.60001 4.99999 5.90001 5.69999C5.20001 6.29999 4.60001 7.09999 4.20001 7.89999C3.80001 8.69999 3.60001 9.69999 3.60001 10.7C3.60001 11.9 3.90001 13.1 4.50001 14.1L3.50001 20.3L9.80001 19.3C10.8 19.8 11.9 20.1 13 20.1C14 20.1 15 19.9 15.9 19.6C16.8 19.2 17.7 18.7 18.4 18C19.1 17.3 19.7 16.5 20.1 15.7C20.5 14.8 20.7 13.8 20.7 12.8C20.7 11.6 20.4 10.5 20 9.39999C19.6 8.19999 18.7 7.19999 17.6 6.31999ZM11.3 18.7C10.3 18.7 9.30001 18.4 8.40001 17.9L8.00001 17.7L4.60001 18.2L5.10001 15L4.80001 14.6C4.20001 13.7 3.90001 12.7 3.90001 11.6C3.90001 10.7 4.10001 9.89999 4.50001 9.09999C4.90001 8.29999 5.40001 7.69999 6.00001 7.09999C6.60001 6.49999 7.30001 6.09999 8.10001 5.79999C8.90001 5.49999 9.70001 5.29999 10.6 5.29999C11.5 5.29999 12.4 5.49999 13.1 5.79999C13.9 6.09999 14.5 6.59999 15.1 7.09999C15.7 7.69999 16.1 8.29999 16.4 8.99999C16.7 9.69999 16.9 10.5 16.9 11.3C16.9 12.2 16.7 13 16.3 13.8C15.9 14.6 15.4 15.2 14.8 15.8C14.2 16.4 13.5 16.8 12.7 17.1C12.2 18.2 11.8 18.7 11.3 18.7ZM14.6 13.5C14.8 13.6 14.9 13.6 15 13.8C15.1 13.9 15.1 14.2 15 14.5C14.9 15 14.4 15.4 14.1 15.5C13.8 15.6 13.4 15.6 13 15.5C12.7 15.4 12.4 15.3 12 15.2C11.1 14.8 10.3 14.2 9.70001 13.5C9.10001 12.9 8.60001 12.2 8.30001 11.5C8.20001 11.2 8.10001 10.9 8.00001 10.6C8.00001 10.3 8.00001 10 8.10001 9.79999C8.20001 9.69999 8.30001 9.49999 8.40001 9.39999C8.50001 9.29999 8.60001 9.19999 8.70001 9.09999C8.80001 8.99999 8.90001 8.79999 9.00001 8.69999C9.10001 8.49999 9.20001 8.49999 9.30001 8.49999H9.60001C9.70001 8.49999 9.90001 8.49999 10 8.69999C10.1 8.89999 10.3 9.29999 10.5 9.59999C10.6 9.79999 10.7 9.89999 10.7 9.99999C10.8 10.1 10.8 10.3 10.7 10.4C10.6 10.5 10.6 10.7 10.5 10.8C10.4 10.9 10.2 11.1 10.1 11.2C10 11.3 9.90001 11.4 9.80001 11.5C9.70001 11.6 9.60001 11.8 9.70001 11.9C9.80001 12.3 10.1 12.7 10.4 13C10.8 13.3 11.2 13.6 11.6 13.8C11.8 13.9 12 14 12.2 14C12.4 14 12.5 13.9 12.6 13.8L12.8 13.6C12.9 13.5 13 13.4 13.1 13.4C13.2 13.4 13.3 13.4 13.4 13.5C13.8 13.3 14.2 13.4 14.6 13.5Z" fill="white"/>
                </svg>
            </span>
            <span class="texte_bouton_whatsapp">Rejoindre notre communauté</span>
        </a>
      </div>
     


		</div>
        
      
    @endsection