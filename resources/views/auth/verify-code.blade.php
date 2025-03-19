@extends('front.layout_inscription_connexion')

@section('content')
    <div class="mp">
        <div class="top-register">
            <h3>VÉRIFICATION DU CODE</h3>
            <p>Veuillez entrer le code de vérification envoyé à votre e-mail.</p>
        </div>
    </div>
    <div class="loginform">
        <form method="POST" action="{{ route('password.verify.code') }}">
            @csrf
            <div class="mt-4">
                <x-label for="code" value="{{ __('Code de vérification') }}" />
                <x-input id="code" class="form_input" type="text" name="code" required placeholder="Ex : XXXXXX" />
                @error('code')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div id="countdownMessage" class="text-info mt-2">
                Vous pouvez demander un nouveau code dans <span id="countdown">60</span> secondes.
            </div>
            <div>
                <x-button class="btn-custom">{{ __("VÉRIFIER LE CODE") }}</x-button>
            </div>
        </form>

        <div class="espacement-haut">
            <form method="POST" action="{{ route('password.resend.code') }}" id="resendForm">
                @csrf
                <input type="hidden" name="resend" value="1">
            </form>
            <a href="javascript:void(0);" onclick="resendCode(event);" id="resendLink" style="pointer-events: none; opacity: 0.5;">
                {{ __('Vous n\'avez pas reçu de code ? Cliquez ici pour le renvoyer.') }}
            </a>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let countdown = 60;
            let resendLink = document.getElementById('resendLink');
            let countdownSpan = document.getElementById('countdown');

            if (sessionStorage.getItem('remainingTime')) {
                countdown = parseInt(sessionStorage.getItem('remainingTime'));
            }

            startCountdown();

            function startCountdown() {
                resendLink.style.pointerEvents = 'none';
                resendLink.style.opacity = '0.5';
                resendLink.style.cursor = 'default';

                let interval = setInterval(function () {
                    countdown--;
                    countdownSpan.textContent = countdown;
                    sessionStorage.setItem('remainingTime', countdown);

                    if (countdown <= 0) {
                        clearInterval(interval);
                        resendLink.style.pointerEvents = 'auto';
                        resendLink.style.opacity = '1';
                        resendLink.style.cursor = 'pointer';
                        sessionStorage.removeItem('remainingTime');
                    }
                }, 1000);
            }
        });

        function resendCode(event) {
            event.preventDefault(); // Empêche tout comportement indésirable
            let resendForm = document.getElementById('resendForm');
            resendForm.submit();
        }
    </script>

@endsection
