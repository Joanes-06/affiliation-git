
@extends('front.layout_inscription_connexion')     
          
@section('content')
                                <div class="mp">
                                  
                                    <div class="top-register">
                                        <h3>CONNEXION</h3>
                                        <p>Connectez-vous pour accéder à votre compte.</p>
                                    </div>
                                </div>
                                <div class="loginform">
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf

                                        <!-- Champ Email -->
                                        <div class="mt-4">
                                            <x-label for="email" value="{{ __('Email') }}" />
                                            <x-input id="email" class="form_input" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="Email" />
                                            @error('email')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Champ Mot de passe -->
                                        <div class="mt-4">
                                            <x-label for="password" value="{{ __('Mot de passe') }}" />
                                            <x-input id="password" class="form_input" type="password" name="password" required autocomplete="current-password" placeholder="Mot de passe" />
                                            @error('password')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Bouton de connexion -->
                                        <div>
                                            <x-button class="btn-custom">
                                                {{ __("CONNEXION") }}
                                            </x-button>
                                        </div>
                             
                                        <!-- ... -->
                                        <div>
                                            <a class="deja" href="{{ route('register') }}">
                                                {{ __('Pas encore inscrit ? Inscrivez-vous') }}
                                            </a>
                                        </div>

                                        <div class="espacement-haut">
                                            <x-label for="conditions">
                                                <div class="conteneur-flex">
                                                   
                                                    <div class=""> 
                                                        <a href="{{ route('password.request') }}" >
                                                            {{ __('Mot de passe oublié ?') }}
                                                        </a>
                                                    </div>
                                                </div>
                                            </x-label>
                                        </div>

                                    </form>
                                </div>
                                @endsection