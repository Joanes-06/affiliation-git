@extends('front.layout_dashboard')

@section('content')

<div class="hh-container">
    <header class="hh-header">
        <h1 class="hh-title">Programme de Référés</h1>
        <p class="hh-subtitle">Découvrez votre réseau de référés à travers les Paliers et suivez l’évolution de votre communauté.</p>
    </header>
    
    <div class="hh-tabs">
        <div class="hh-tab hh-active" data-generation="1">Palier 1</div>
        <div class="hh-tab" data-generation="2">Palier 2</div>
        <div class="hh-tab" data-generation="3">Palier 3</div>
    </div>
    
    <div class="">
        <div class="hh-panel hh-active" id="generation-1">
            <h2 class="hh-section-title">Palier 1 - Vos référes directs</h2>
            <div class="hh-user-grid">
                <div class="hh-user-card">
                    <div class="hh-user-avatar">MT</div>
                    <h3 class="hh-user-name">Marie Torval</h3>
                    <div class="hh-user-info">
                        <div class="hh-user-badge">P1</div>
                        <div class="hh-user-referrals">
                            <div class="hh-user-circle">4</div>
                            Référes
                        </div>
                    </div>
                </div>
                
                <div class="hh-user-card">
                    <div class="hh-user-avatar">PD</div>
                    <h3 class="hh-user-name">Philippe Durand</h3>
                    <div class="hh-user-info">
                        <div class="hh-user-badge">P1</div>
                        <div class="hh-user-referrals">
                            <div class="hh-user-circle">3</div>
                            Référes
                        </div>
                    </div>
                </div>
                
                <div class="hh-user-card">
                    <div class="hh-user-avatar">SL</div>
                    <h3 class="hh-user-name">Sophie Legrand</h3>
                    <div class="hh-user-info">
                        <div class="hh-user-badge">P1</div>
                        <div class="hh-user-referrals">
                            <div class="hh-user-circle">5</div>
                            Référes
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="hh-panel" id="generation-2">
            <h2 class="hh-section-title">Palier 2 - référes de vos référes</h2>
            <div class="hh-user-grid">
                <div class="hh-user-card">
                    <div class="hh-user-avatar">JM</div>
                    <h3 class="hh-user-name">Jean Martin</h3>
                    <div class="hh-user-info">
                        <div class="hh-user-badge">P2</div>
                        <div class="hh-user-referrals">
                            <div class="hh-user-circle">2</div>
                            Référes
                        </div>
                    </div>
                </div>
                
                <div class="hh-user-card">
                    <div class="hh-user-avatar">LB</div>
                    <h3 class="hh-user-name">Lucas Blanc</h3>
                    <div class="hh-user-info">
                        <div class="hh-user-badge">P2</div>
                        <div class="hh-user-referrals">
                            <div class="hh-user-circle">3</div>
                            Référes
                        </div>
                    </div>
                </div>
                
                <div class="hh-user-card">
                    <div class="hh-user-avatar">AM</div>
                    <h3 class="hh-user-name">Alice Mercier</h3>
                    <div class="hh-user-info">
                        <div class="hh-user-badge">P2</div>
                        <div class="hh-user-referrals">
                            <div class="hh-user-circle">1</div>
                            Référes
                        </div>
                    </div>
                </div>
                
                <div class="hh-user-card">
                    <div class="hh-user-avatar">CD</div>
                    <h3 class="hh-user-name">Claire Dubois</h3>
                    <div class="hh-user-info">
                        <div class="hh-user-badge">P2</div>
                        <div class="hh-user-referrals">
                            <div class="hh-user-circle">2</div>
                            Référes
                        </div>
                    </div>
                </div>
                
                <div class="hh-user-card">
                    <div class="hh-user-avatar">TR</div>
                    <h3 class="hh-user-name">Thomas Rousseau</h3>
                    <div class="hh-user-info">
                        <div class="hh-user-badge">P2</div>
                        <div class="hh-user-referrals">
                            <div class="hh-user-circle">4</div>
                            Référes
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="hh-panel" id="generation-3">
            <h2 class="hh-section-title">Palier 3 - Réseau étendu</h2>
            <div class="hh-user-grid">
                <div class="hh-user-card">
                    <div class="hh-user-avatar">EL</div>
                    <h3 class="hh-user-name">Emma Laurent</h3>
                    <div class="hh-user-info">
                        <div class="hh-user-badge">P3</div>
                        <div class="hh-user-referrals">
                            <div class="hh-user-circle">4</div>
                            Référes
                        </div>
                    </div>
                </div>
                
                <div class="hh-user-card">
                    <div class="hh-user-avatar">NR</div>
                    <h3 class="hh-user-name">Nicolas Robert</h3>
                    <div class="hh-user-info">
                        <div class="hh-user-badge">P3</div>
                        <div class="hh-user-referrals">
                            <div class="hh-user-circle">1</div>
                            Référes
                        </div>
                    </div>
                </div>
                
                <div class="hh-user-card">
                    <div class="hh-user-avatar">NR</div>
                    <h3 class="hh-user-name">Nicolas Robert</h3>
                    <div class="hh-user-info">
                        <div class="hh-user-badge">P3</div>
                        <div class="hh-user-referrals">
                            <div class="hh-user-circle">1</div>
                            Référes
                        </div>
                    </div>
                </div>
                
                <div class="hh-user-card">
                    <div class="hh-user-avatar">JD</div>
                    <h3 class="hh-user-name">Julie Dupont</h3>
                    <div class="hh-user-info">
                        <div class="hh-user-badge">P3</div>
                        <div class="hh-user-referrals">
                            <div class="hh-user-circle">0</div>
                            Référes
                        </div>
                    </div>
                </div>
                
                <div class="hh-user-card">
                    <div class="hh-user-avatar">MB</div>
                    <h3 class="hh-user-name">Marc Bertrand</h3>
                    <div class="hh-user-info">
                        <div class="hh-user-badge">P3</div>
                        <div class="hh-user-referrals">
                            <div class="hh-user-circle">2</div>
                            Référes
                        </div>
                    </div>
                </div>
                
                <div class="hh-user-card">
                    <div class="hh-user-avatar">CP</div>
                    <h3 class="hh-user-name">Camille Petit</h3>
                    <div class="hh-user-info">
                        <div class="hh-user-badge">P3</div>
                        <div class="hh-user-referrals">
                            <div class="hh-user-circle">1</div>
                            Référes
                        </div>
                    </div>
                </div>
            </div>
        </div>
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