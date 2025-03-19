@extends('front.layout_dashboard')

@section('content')

            <div class="">
                <div class="tt-row justify-content-center">
                <div class="tt-col-md-8">
                    <div class="tt-card">
                        <div class="tt-card-header">
                            {{ __('Télécharger les contacts') }}
                        </div>
                        <div class="tt-card-body">
                            @if (session('error'))
                            <div class="tt-alert tt-alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                            @endif
                            
                            @if (session('success'))
                            <div class="tt-alert tt-alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                            @endif
                            
                            <form method="POST" action="{{ route('contacts.download') }}">
                                @csrf
                                
                                <div class="tt-form-group tt-row mb-3">
                                    <label for="start_date" class="tt-col-md-4 tt-form-label text-md-right">{{ __('Date de début') }}</label>
                                    <div class="tt-col-md-6">
                                        <input id="start_date" type="date" class="tt-form-control @error('start_date') tt-is-invalid @enderror" name="start_date" value="{{ old('start_date', \Carbon\Carbon::now()->subMonth()->format('Y-m-d')) }}" required>
                                        @error('start_date')
                                        <span class="tt-invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="tt-form-group tt-row mb-3">
                                    <label for="end_date" class="tt-col-md-4 tt-form-label text-md-right">{{ __('Date de fin') }}</label>
                                    <div class="tt-col-md-6">
                                        <input id="end_date" type="date" class="tt-form-control @error('end_date') tt-is-invalid @enderror" name="end_date" value="{{ old('end_date', \Carbon\Carbon::now()->format('Y-m-d')) }}" required>
                                        @error('end_date')
                                            <span class="tt-invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="tt-form-group tt-row mb-0">
                                    <div class="tt-col-md-6 tt-offset-md-4">
                                        <button type="submit" class="tt-btn tt-btn-primary">
                                            {{ __('Télécharger les contacts') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
        
                            <hr class="tt-hr">
                            
                            <div class="mt-3">
                                
                                <div class="tt-h5">
                                    <p>Derniers téléchargements</p>
                                </div>
                                @if(auth()->user()->last_vcard_downloads && count(auth()->user()->last_vcard_downloads) > 0)
                                <ul class="tt-list-group">
                                    
                                    @foreach(auth()->user()->last_vcard_downloads as $download)
                                    <li class="tt-list-group-item d-flex justify-content-between align-items-center">
                                        Du {{ \Carbon\Carbon::parse($download['start_date'])->format('d/m/Y') }} 
                                        au {{ \Carbon\Carbon::parse($download['end_date'])->format('d/m/Y') }}
                                        <span class="tt-badge tt-bg-primary tt-rounded-pill">{{ $download['count'] }} contacts</span>
                                    </li>
                                    @endforeach
                                </ul>
                                
                                @else
                                    <p class="tt-text-muted">Aucun téléchargement précédent enregistré.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.tailwindcss.com"></script>
        @endsection