@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Télécharger les contacts') }}</div>

                <div class="card-body">
                    @if (session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                    @endif

                    @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif

                    <form method="POST" action="{{ route('contacts.download') }}">
                        @csrf

                        <div class="form-group row mb-3">
                            <label for="start_date" class="col-md-4 col-form-label text-md-right">{{ __('Date de début') }}</label>

                            <div class="col-md-6">
                                <input id="start_date" type="date" class="form-control @error('start_date') is-invalid @enderror" name="start_date" value="{{ old('start_date', \Carbon\Carbon::now()->subMonth()->format('Y-m-d')) }}" required>

                                @error('start_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="end_date" class="col-md-4 col-form-label text-md-right">{{ __('Date de fin') }}</label>

                            <div class="col-md-6">
                                <input id="end_date" type="date" class="form-control @error('end_date') is-invalid @enderror" name="end_date" value="{{ old('end_date', \Carbon\Carbon::now()->format('Y-m-d')) }}" required>

                                @error('end_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Télécharger les contacts') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    
                    <hr>
                    
                    <div class="mt-3">
                        <h5>Derniers téléchargements</h5>
                        @if(auth()->user()->last_vcard_downloads && count(auth()->user()->last_vcard_downloads) > 0)
                            <ul class="list-group">
                                @foreach(auth()->user()->last_vcard_downloads as $download)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Du {{ \Carbon\Carbon::parse($download['start_date'])->format('d/m/Y') }} 
                                        au {{ \Carbon\Carbon::parse($download['end_date'])->format('d/m/Y') }}
                                        <span class="badge bg-primary rounded-pill">{{ $download['count'] }} contacts</span>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p>Aucun téléchargement précédent enregistré.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection