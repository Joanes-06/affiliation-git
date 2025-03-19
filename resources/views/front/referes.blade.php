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

    <div id="referes-panels">
        <!-- Palier 1 -->
        <div class="hh-panel hh-active" id="generation-1">
            <h2 class="hh-section-title">Palier 1 - Vos référes directs</h2>
            <div class="hh-user-grid">
                @foreach ($palier1 as $user)
                    @php
                        $pack = '';
                        if ($user->souscription->amount == 2000.00) { $pack = 'Débutant'; }
                        elseif ($user->souscription->amount == 5000.00) { $pack = 'Pro'; }
                        elseif ($user->souscription->amount == 10000.00) { $pack = 'Élite'; }
                        $gain = 0;
                        if ($user->inviteur_id == Auth::user()->id) {
                            $gain = $user->souscription->amount * 0.50; 
                        }
                    @endphp
                    <div class="hh-user-card">
                        <div class="hh-user-avatar">{{ strtoupper(substr($user->lastname, 0, 1)) }}{{ strtoupper(substr($user->firstname, 0, 1)) }}</div>
                        <h3 class="hh-user-name">{{ $user->lastname }} {{ $user->firstname }}</h3>
                        <div class="hh-user-info">
                            <div class="hh-user-badge">gain:{{ number_format($gain, 2) }} FCFA ({{ $pack }})</div>
                            <div class="hh-user-referrals">
                                <div class="hh-user-circle">{{ $user->where('inviteur_id', $user->id)->count() }}</div>
                                Référés
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- Message quand vide -->
        <div class="hh-panel" id="generation-1-empty" style="display:none;">
            <p>Aucun référé direct trouvé.</p>
        </div>

        <!-- Palier 2 -->
        <div class="hh-panel" id="generation-2">
            <h2 class="hh-section-title">Palier 2 - référes de vos référes</h2>
            <div class="hh-user-grid">
                @foreach ($palier2 as $user)
                    @php
                        $pack = '';
                        if ($user->souscription->amount == 2000.00) { $pack = 'Débutant'; }
                        elseif ($user->souscription->amount == 5000.00) { $pack = 'Pro'; }
                        elseif ($user->souscription->amount == 10000.00) { $pack = 'Élite'; }
                        $gain = 0;
                        if ($user->generation1_id == Auth::id()) { 
                            $gain = $user->souscription->amount * 0.25; 
                        }
                    @endphp
                    <div class="hh-user-card">
                        <div class="hh-user-avatar">{{ strtoupper(substr($user->lastname, 0, 1)) }}{{ strtoupper(substr($user->firstname, 0, 1)) }}</div>
                        <h3 class="hh-user-name">{{ $user->lastname }} {{ $user->firstname }}</h3>
                        <div class="hh-user-info">
                            <div class="hh-user-badge">gain:{{ number_format($gain, 2) }} FCFA ({{ $pack }})</div>
                            <div class="hh-user-referrals">
                                <div class="hh-user-circle">{{ $user->where('inviteur_id', $user->id)->count() }}</div>
                                Référés
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- Message quand vide -->
        <div class="hh-panel" id="generation-2-empty" style="display:none;">
            <p>Aucun référé indirect trouvé.</p>
        </div>

        <!-- Palier 3 -->
        <div class="hh-panel" id="generation-3">
            <h2 class="hh-section-title">Palier 3 - Réseau étendu</h2>
            <div class="hh-user-grid">
                @foreach ($palier3 as $user)
                    @php
                        $pack = '';
                        if ($user->souscription->amount == 2000.00) { $pack = 'Débutant'; }
                        elseif ($user->souscription->amount == 5000.00) { $pack = 'Pro'; }
                        elseif ($user->souscription->amount == 10000.00) { $pack = 'Élite'; }
                        $gain = 0;
                        if ($user->generation2_id == Auth::id()) { 
                            $gain = $user->souscription->amount * 0.125; 
                        }
                    @endphp
                    <div class="hh-user-card">
                        <div class="hh-user-avatar">{{ strtoupper(substr($user->lastname, 0, 1)) }}{{ strtoupper(substr($user->firstname, 0, 1)) }}</div>
                        <h3 class="hh-user-name">{{ $user->lastname }} {{ $user->firstname }}</h3>
                        <div class="hh-user-info">
                            <div class="hh-user-badge">gain:{{ number_format($gain, 2) }} FCFA ({{ $pack }})</div>
                            <div class="hh-user-referrals">
                                <div class="hh-user-circle">{{ $user->where('inviteur_id', $user->id)->count() }}</div>
                                Référés
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- Message quand vide -->
        <div class="hh-panel" id="generation-3-empty" style="display:none;">
            <p>Aucun référé niveau 3 trouvé.</p>
        </div>
    </div>
</div>

<script>
   document.addEventListener('DOMContentLoaded', function() {
    // Tab functionality
    const tabs = document.querySelectorAll('.hh-tab');
    const panels = document.querySelectorAll('.hh-panel');
    const messages = {
        1: "Aucun référé direct trouvé.",
        2: "Aucun référé indirect trouvé.",
        3: "Aucun référé niveau 3 trouvé."
    };

    tabs.forEach(tab => {
        tab.addEventListener('click', function() {
            // Remove active class from all tabs
            tabs.forEach(t => t.classList.remove('hh-active'));

            // Add active class to clicked tab
            this.classList.add('hh-active');

            // Hide all panels
            panels.forEach(panel => {
                panel.classList.remove('hh-active');
            });

            // Get the generation number from the tab
            const generation = this.getAttribute('data-generation');
            const panel = document.getElementById('generation-' + generation);

            // Show corresponding panel
            panel.classList.add('hh-active');

            // Check if the panel is empty
            const userCards = panel.querySelectorAll('.hh-user-card');
            const messageContainer = panel.querySelector('.hh-message');

            if (userCards.length === 0) {
                // Show message if the panel is empty
                if (!messageContainer) {
                    const messageElement = document.createElement('p');
                    messageElement.classList.add('hh-message');
                    messageElement.textContent = messages[generation];
                    panel.appendChild(messageElement);
                }
            } else {
                // Remove message if the panel is not empty
                if (messageContainer) {
                    messageContainer.remove();
                }
            }
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
