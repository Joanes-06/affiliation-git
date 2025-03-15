
@extends('front.layout_inscription_connexion')     
          
@section('content')
                                <div class="mp">
                                  
                                    <div class="top-register">
                                        <h3>MOT DE PASSE OUBLIÉ</h3>

                                        <p>Veuillez entrer votre e-mail pour récupérer votre compte.</p>
                                    </div>
                                    
                                </div>
                                <div class="loginform">
                      <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <!-- Champ Email -->
                        <div class="mt-4">
                            <x-label for="email" value="{{ __('Email') }}" />
                            <x-input id="email" class="form_input" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="Email" />
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Bouton de réinitialisation -->
                        <div>
                            <x-button class="btn-custom">
                                {{ __("Réinitialiser mot de passe") }}
                            </x-button>
                        </div>

                        

                        

                      </form>
                    </div>
                    @endsection