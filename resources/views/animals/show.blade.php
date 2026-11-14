<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>{{ $animal->titre }} · Patte Douce</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', 'Poppins', system-ui, -apple-system, 'Inter', sans-serif;
            background: linear-gradient(145deg, #fffaf5 0%, #fef5e8 100%);
            color: #2d3e2b;
            min-height: 100vh;
        }

        /* ========== NAVIGATION ========== */
        .navbar {
            background: #ffffffdd;
            backdrop-filter: blur(8px);
            border-bottom: 1px solid #f0e0d0;
            position: sticky;
            top: 0;
            z-index: 50;
        }

        .nav-container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 0.6rem;
            font-size: 1.5rem;
            font-weight: 700;
            color: #c17b4c;
            letter-spacing: -0.3px;
            text-decoration: none;
        }

        .logo span {
            background: #f7e5cf;
            padding: 0.3rem 0.8rem;
            border-radius: 40px;
            font-size: 1.6rem;
        }

        .nav-links {
            display: flex;
            gap: 1rem;
            align-items: center;
            flex-wrap: wrap;
        }

        .nav-links a {
            text-decoration: none;
            color: #9b7c64;
            font-weight: 500;
            padding: 0.5rem 1rem;
            border-radius: 40px;
            transition: all 0.2s;
        }

        .nav-links a:hover {
            background: #fef2e6;
            color: #c17b4c;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            background: #fef2e6;
            padding: 0.5rem 1.2rem;
            border-radius: 40px;
            color: #c17b4c !important;
        }

        .back-link:hover {
            background: #f7e5cf;
        }

        /* ========== MAIN CONTAINER ========== */
        .main-container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 2rem 1.5rem;
        }

        /* Carte détail */
        .detail-card {
            background: white;
            border-radius: 2rem;
            overflow: hidden;
            border: 1px solid #ffefdf;
            box-shadow: 0 20px 35px -12px rgba(0, 0, 0, 0.08);
        }

        /* En-tête avec image */
        .detail-header {
            position: relative;
            height: 350px;
            overflow: hidden;
        }

        .detail-header img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s;
        }

        .detail-header:hover img {
            transform: scale(1.02);
        }

        .statut-badge {
            position: absolute;
            top: 20px;
            right: 20px;
            padding: 0.6rem 1.2rem;
            border-radius: 60px;
            font-weight: 700;
            font-size: 0.85rem;
            backdrop-filter: blur(8px);
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        .statut-disponible {
            background: rgba(124, 175, 90, 0.95);
            color: white;
        }

        .statut-adopte {
            background: rgba(193, 123, 76, 0.95);
            color: white;
        }

        .statut-attente {
            background: rgba(231, 161, 106, 0.95);
            color: white;
        }

        /* Corps de la carte */
        .detail-body {
            padding: 2rem;
        }

        .detail-title {
            font-size: 2.2rem;
            font-weight: 800;
            background: linear-gradient(135deg, #c17b4c, #e7a16a);
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;
            margin-bottom: 0.5rem;
        }

        .detail-subtitle {
            color: #9b7c64;
            border-bottom: 2px solid #fef2e6;
            padding-bottom: 1rem;
            margin-bottom: 1.5rem;
        }

        /* Grille d'informations */
        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .info-item {
            background: #fefcf9;
            padding: 1rem 1.2rem;
            border-radius: 1.2rem;
            border: 1px solid #f0e0d0;
        }

        .info-label {
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #b3967a;
            margin-bottom: 0.3rem;
        }

        .info-value {
            font-size: 1.2rem;
            font-weight: 700;
            color: #2d3e2b;
        }

        .info-value small {
            font-weight: normal;
            font-size: 0.9rem;
            color: #9b7c64;
        }

        /* Description */
        .description-section {
            background: #fefcf9;
            padding: 1.5rem;
            border-radius: 1.2rem;
            margin-bottom: 2rem;
            border: 1px solid #f0e0d0;
        }

        .description-section h3 {
            font-size: 1.2rem;
            color: #c17b4c;
            margin-bottom: 0.8rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .description-section p {
            color: #5a4a3a;
            line-height: 1.6;
            font-size: 1rem;
        }

        /* Actions */
        .action-buttons {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
            margin-top: 1rem;
        }

        .btn-adopt {
            background: #c17b4c;
            color: white;
            text-decoration: none;
            padding: 0.9rem 2rem;
            border-radius: 60px;
            font-weight: 700;
            display: inline-flex;
            align-items: center;
            gap: 0.6rem;
            transition: all 0.25s;
            border: none;
            cursor: pointer;
        }

        .btn-adopt:hover {
            background: #a86434;
            transform: translateY(-2px);
            box-shadow: 0 8px 18px rgba(168, 100, 52, 0.25);
        }

        .btn-contact {
            background: transparent;
            border: 2px solid #c17b4c;
            color: #c17b4c;
            text-decoration: none;
            padding: 0.85rem 2rem;
            border-radius: 60px;
            font-weight: 700;
            display: inline-flex;
            align-items: center;
            gap: 0.6rem;
            transition: all 0.25s;
        }

        .btn-contact:hover {
            background: #fef2e6;
            transform: translateY(-2px);
        }

        /* Footer */
        .footer {
            text-align: center;
            padding: 1.8rem;
            font-size: 0.75rem;
            color: #b3967a;
            border-top: 1px solid #f0e0d0;
            margin-top: 2rem;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .nav-container {
                flex-direction: column;
                text-align: center;
            }
            .detail-header {
                height: 250px;
            }
            .detail-title {
                font-size: 1.6rem;
            }
            .detail-body {
                padding: 1.5rem;
            }
            .info-grid {
                grid-template-columns: 1fr;
            }
            .action-buttons {
                flex-direction: column;
            }
            .btn-adopt, .btn-contact {
                justify-content: center;
            }
        }
    </style>
</head>
<body>

<nav class="navbar">
    <div class="nav-container">
        <a href="/" class="logo">
            <span>🐾</span> 
            <span style="color:#b45f2e;">Patte Douce</span>
        </a>
        <div class="nav-links">
            <a href="{{ route('user.dashboard') }}">👤 Mon espace</a>
            <a href="{{ route('animals.index') }}">🐕 Nos animaux</a>
            <a href="{{ route('animals.index') }}" class="back-link">← Retour à la liste</a>
        </div>
    </div>
</nav>

<main class="main-container">
    <div class="detail-card">
        <!-- En-tête avec image -->
        <div class="detail-header">
            <img src="{{ asset('uploads/'.$animal->photo) }}" alt="{{ $animal->titre }}">
            
            <!-- Badge statut -->
            <span class="statut-badge 
                @if($animal->statut == 'disponible') statut-disponible
                @elseif($animal->statut == 'adopté') statut-adopte
                @else statut-attente @endif">
                @if($animal->statut == 'disponible') ✅ Disponible
                @elseif($animal->statut == 'adopté') 🏠 Adopté
                @else ⏳ En attente
                @endif
            </span>
        </div>

        <!-- Corps de la carte -->
        <div class="detail-body">
            <h1 class="detail-title">{{ $animal->titre }}</h1>
            <div class="detail-subtitle">
                <span>✨ Fiche d'identité</span>
            </div>

            <!-- Grille d'informations -->
            <div class="info-grid">
    
            <div class="info-item">
                <div class="info-label">🐕 RACE</div>
                <div class="info-value">{{ $animal->race ?: 'Race inconnue' }}</div>
            </div>

            <div class="info-item">
                <div class="info-label">🎂 ÂGE</div>
                <div class="info-value">{{ $animal->age }} <small>ans</small></div>
            </div>

            <div class="info-item">
                <div class="info-label">📞 TÉLÉPHONE</div>
                <div class="info-value">
                    {{ $animal->tel ?: 'Non disponible' }}
                </div>
            </div>

            @if(isset($animal->sexe) && $animal->sexe)
            <div class="info-item">
                <div class="info-label">⚥ SEXE</div>
                <div class="info-value">{{ $animal->sexe == 'F' ? '♀ Femelle' : '♂ Mâle' }}</div>
            </div>
            @endif

            <div class="info-item">
                <div class="info-label">📅 Mise en ligne</div>
                <div class="info-value">{{ $animal->created_at ? $animal->created_at->format('d/m/Y') : 'Récemment' }}</div>
            </div>

        </div>

            <!-- Description -->
            <div class="description-section">
                <h3>
                    <span>📝</span> À propos de {{ $animal->titre }}
                </h3>
                <p>{{ $animal->description }}</p>
            </div>

            <!-- Boutons d'action -->
            <div class="action-buttons">
                @if($animal->statut == 'disponible')
                <a href="#" class="btn-adopt">
                    💌 Adopter {{ $animal->titre }}
                </a>
                @endif
                
            </div>
        </div>
    </div>
</main>

<footer class="footer">
    <p>🐾 Patte Douce — Adopter, c'est offrir une famille pour la vie</p>
    <p style="margin-top: 6px;">📍 Refuge partenaire | 📞 01 23 45 67 89 | ✉️ adoption@pattedouce.fr</p>
</footer>

</body>
</html>