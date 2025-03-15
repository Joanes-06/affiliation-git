

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
                                        <input type="hidden" name="code" value="{{ session('code') }}">
                                        @csrf
                            
                                       
                                        <div class="mt-4">
                                            <x-label for="code" value="{{ __('Code de vérification') }}" />
                                            <x-input id="code" class="form_input" type="text" name="code" required placeholder="Ex : XXXXXX" />
                                            @error('code')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div>
                                            <x-button class="btn-custom">
                                                {{ __("VÉRIFIER LE CODE") }}
                                            </x-button>
                                        </div>

                                        <div class="espacement-haut">
                                            <x-label for="conditions">
                                                <div class="conteneur-flex">
                                                   
                                                    <div class="toto"> 
                                                        <a href="" >
                                                            {{ __('Vous n\'avez pas reçu de code ? Cliquez ici pour le renvoyer.') }}
                                                        </a>
                                                    </div>
                                                </div>
                                            </x-label>
                                        </div>
                            
                                        
                                    </form>
                                </div>
                                @endsection