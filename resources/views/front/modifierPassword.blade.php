

@extends('front.layout_inscription_connexion')     
          
@section('content')
                                <div class="mp">
                                  
                                    <div class="top-register">
                                        <h3>RÉINITIALISATION DU MOT DE PASSE</h3>
                                        <p>Veuillez entrer votre nouveau mot de passe.</p>
                                    </div>
                                </div>

                                <div class="loginform">
                        
                                    <form method="POST" action="{{ route('password.resett') }}">
                                        @csrf
                                      
                            
                                        <!-- Champ Email -->
                                        <div class="mt-4">
                                            <x-input id="email" class="form_input" type="hidden" name="email" value="{{ Auth::user()->email }}" />
                                        </div>
                                           
                                        <!-- Champ  Ancien Mot de passe -->
                                        <div class="mt-4">
                                            <x-label for="oldpassword" value="{{ __('Ancien mot de passe') }}" />
                                            <x-input id="oldpassword" class="form_input" type="password" name="oldpassword" required  placeholder="Ancien mot de passe" />
                                            @error('oldpassword')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!-- Champ Mot de passe -->
                                        <div class="mt-4">
                                            <x-label for="password" value="{{ __('Nouveau mot de passe') }}" />
                                            <x-input id="password" class="form_input" type="password" name="password" required  placeholder="Nouveau mot de passe" />
                                            @error('password')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                       
                                          <!-- Champ Confirmation du mot de passe -->
                                          <div class="mt-4">
                                            <x-label for="password_confirmation" value="{{ __('Confirmer le mot de passe') }}" />
                                            <x-input id="password_confirmation" class="form_input" type="password" name="password_confirmation" required  placeholder="Confirmez le mot de passe" />
                                            @error('Password_confirmation')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                
                                        <div>
                                            <x-button class="btn-custom">
                                                {{ __("RÉINITIALISATION LE MOT DE PASSE") }}
                                            </x-button>
                                        </div>
                                    </form>
                                </div>
                                @endsection