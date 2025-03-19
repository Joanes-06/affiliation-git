@extends('front.layout_dashboard')

@section('content')

<div class="hh-container">
    <header class="hh-header">
        <h1 class="hh-title">Programme de Référés</h1>
        <p class="hh-subtitle">Découvrez votre réseau de référés à travers les Paliers et suivez l’évolution de votre communauté.</p>
    </header>
    
    <div class="hh-tabs">
        <div class="hh-tab hh-active" data-generation="1">Palier 1</div>
        <div class="hh-tab" data-generation="2">Palier 2</div>
        <div class="hh-tab" data-generation="3">Palier 3</div>
    </div>
    
    <div class="">
        @if (isset($palier1) && $palier1->count() > 0)
        <div class="hh-panel hh-active" id="generation-1">
            <h2 class="hh-section-title">Palier 1 - Vos référes directs</h2>
            <div class="hh-user-grid">
                @foreach ($palier1 as $user)
                    @php
                        // Déterminer le pack en fonction du montant de la souscription
                        $pack = '';
                        if ($user->souscription->amount == 2000.00) {
                            $pack = 'Débutant';
                             
                        } elseif ($user->souscription->amount == 5000.00) {
                            $pack = 'Pro';
                        } elseif ($user->souscription->amount == 10000.00) {
                            $pack = 'Élite';
                        }
                        

                        // Calculer le gain en fonction du palier
                        $gain = 0;
                        if ($user->inviteur_id == Auth::user()->id) {
                           

                            $gain = $user->souscription->amount * 0.50; // 50% pour le palier 1
                        }
                    @endphp
                    <div class="hh-user-card">
                        <div class="hh-user-avatar">
                            {{ strtoupper(substr($user->lastname, 0, 1)) }}{{ strtoupper(substr($user->firstname, 0, 1)) }}
                        </div>
                        <h3 class="hh-user-name">{{ $user->lastname }} {{ $user->firstname }}</h3>
                        <div class="hh-user-info">
                            <div class="hh-user-badge">gain:{{ number_format($gain, 2) }} FCFA ({{ $pack }})</div>
                            <div class="hh-user-referrals">
                                <div class="hh-user-circle">
                                    {{ $user->where('inviteur_id', $user->id)->count()}}
                                          
                                </div>
                                Référés
                            </div>
                          
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        @else
        <p>Aucun référé direct trouvé.</p>
        @endif

        @if (isset($palier2) && $palier2->count() > 0)
        <div class="hh-panel" id="generation-2">
            <h2 class="hh-section-title">Palier 2 - référes de vos référes</h2>
            <div class="hh-user-grid">
                @foreach ($palier2 as $user)
                    @php
                        // Déterminer le pack en fonction du montant de la souscription
                        $pack = '';
                        if ($user->souscription->amount == 2000.00) {
                            $pack = 'Débutant';
                        } elseif ($user->souscription->amount == 5000.00) {
                            $pack = 'Pro';
                        } elseif ($user->souscription->amount == 10000.00) {
                            $pack = 'Élite';
                        }

                        // Calculer le gain en fonction du palier
                        $gain = 0;
                        if ($user->generation1_id == Auth::id()) {
                            $gain = $user->souscription->amount * 0.25; // 25% pour le palier 2
                        }
                    @endphp
                    <div class="hh-user-card">
                        <div class="hh-user-avatar">
                            {{ strtoupper(substr($user->lastname, 0, 1)) }}{{ strtoupper(substr($user->firstname, 0, 1)) }}
                        </div>
                        <h3 class="hh-user-name">{{ $user->lastname }} {{ $user->firstname }}</h3>
                        <div class="hh-user-info">
                            <div class="hh-user-badge">gain:{{ number_format($gain, 2) }} FCFA ({{ $pack }})</div>
                            <div class="hh-user-referrals">
                                <div class="hh-user-circle">
                                    {{ $user->where('inviteur_id', $user->id)->count()}}
                                </div>
                                Référés
                            </div>
                            
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        @else
        <p>Aucun référé indirect trouvé.</p>
        @endif

        @if (isset($palier3) && $palier3->count() > 0)
        <div class="hh-panel" id="generation-3">
            <h2 class="hh-section-title">Palier 3 - Réseau étendu</h2>
            <div class="hh-user-grid">
                @foreach ($palier3 as $user)
                    @php
                        // Déterminer le pack en fonction du montant de la souscription
                        $pack = '';
                        if ($user->souscription->amount == 2000.00) {
                            $pack = 'Débutant';
                        } elseif ($user->souscription->amount == 5000.00) {
                            $pack = 'Pro';
                        } elseif ($user->souscription->amount == 10000.00) {
                            $pack = 'Élite';
                        }

                        // Calculer le gain en fonction du palier
                        $gain = 0;
                        if ($user->generation2_id == Auth::id()) {
                            $gain = $user->souscription->amount * 0.125; // 12.5% pour le palier 3
                        }
                    @endphp
                    <div class="hh-user-card">
                        <div class="hh-user-avatar">
                            {{ strtoupper(substr($user->lastname, 0, 1)) }}{{ strtoupper(substr($user->firstname, 0, 1)) }}
                        </div>
                        <h3 class="hh-user-name">{{ $user->lastname }} {{ $user->firstname }}</h3>
                        <div class="hh-user-info">
                            <div class="hh-user-badge">gain:{{ number_format($gain, 2) }} FCFA ({{ $pack }})</div>
                            <div class="hh-user-referrals">
                                <div class="hh-user-circle">
                                    {{ $user->where('inviteur_id', $user->id)->count()}}
                                </div>
                                Référés
                            </div>
                            <div class="hh-user-gain">
                              
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        @else
        <p>Aucun référé niveau 3 trouvé.</p>
        @endif
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Tab functionality
        const tabs = document.querySelectorAll('.hh-tab');
        const panels = document.querySelectorAll('.hh-panel');
        
        tabs.forEach(tab => {
            tab.addEventListener('click', function() {
                // Remove active class from all tabs
                tabs.forEach(t => t.classList.remove('hh-active'));
                
                // Add active class to clicked tab
                this.classList.add('hh-active');
                
                // Hide all panels
                panels.forEach(panel => panel.classList.remove('hh-active'));
                
                // Show corresponding panel
                const generation = this.getAttribute('data-generation');
                document.getElementById('generation-' + generation).classList.add('hh-active');
            });
        });
        
        // Add subtle hover effect to user cards
        const userCards = document.querySelectorAll('.hh-user-card');
        userCards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transition = 'all 0.3s ease';
            });
        });
        
        // Subtle animation on page load
        setTimeout(function() {
            document.querySelectorAll('.hh-user-card').forEach((card, index) => {
                setTimeout(function() {
                    card.style.opacity = '0';
                    card.style.transform = 'translateY(20px)';
                    card.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                    
                    setTimeout(function() {
                        card.style.opacity = '1';
                        card.style.transform = 'translateY(0)';
                    }, 100);
                }, index * 100);
            });
        }, 300);
    });
</script>

@endsection
