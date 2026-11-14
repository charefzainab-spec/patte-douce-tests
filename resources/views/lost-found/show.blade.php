<x-app-layout>
    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
        <title>Détail de l'annonce · Patte Douce</title>
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

            .nav-links .active {
                color: #c17b4c;
                font-weight: 600;
                background: #fef2e6;
            }

            /* ========== MAIN CONTAINER ========== */
            .main-container {
                max-width: 1280px;
                margin: 0 auto;
                padding: 2rem;
            }

            /* En-tête */
            .page-header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                flex-wrap: wrap;
                gap: 1rem;
                margin-bottom: 2rem;
            }

            .page-header h1 {
                font-size: 2rem;
                font-weight: 800;
                background: linear-gradient(135deg, #c17b4c, #e7a16a);
                background-clip: text;
                -webkit-background-clip: text;
                color: transparent;
                display: inline-flex;
                align-items: center;
                gap: 0.6rem;
            }

            /* Carte de détail */
            .detail-card {
                background: white;
                border-radius: 1.5rem;
                overflow: hidden;
                border: 1px solid #ffefdf;
                box-shadow: 0 6px 14px rgba(0, 0, 0, 0.03);
                max-width: 700px;
                margin: 0 auto;
            }

            .detail-header {
                padding: 1.5rem;
                border-bottom: 1px solid #f0e0d0;
                text-align: center;
            }

            .type-badge-large {
                display: inline-flex;
                align-items: center;
                gap: 0.5rem;
                padding: 0.5rem 1.5rem;
                border-radius: 60px;
                font-size: 1.1rem;
                font-weight: 700;
            }

            .type-perdu-large {
                background: #fef2e6;
                color: #e0774b;
            }

            .type-trouve-large {
                background: #eef5ea;
                color: #7caf5a;
            }

            .detail-body {
                padding: 1.5rem;
            }

            .detail-photo {
                text-align: center;
                margin-bottom: 1.5rem;
            }

            .detail-photo img {
                width: 100%;
                max-width: 300px;
                height: 300px;
                object-fit: cover;
                border-radius: 1rem;
                border: 2px solid #f0e0d0;
            }

            .info-group {
                margin-bottom: 1.2rem;
                padding: 0.8rem;
                background: #fefcf9;
                border-radius: 1rem;
                border: 1px solid #f0e0d0;
            }

            .info-label {
                font-weight: 700;
                color: #c17b4c;
                display: block;
                margin-bottom: 0.5rem;
                font-size: 0.9rem;
            }

            .info-value {
                color: #5a4a3a;
                line-height: 1.5;
                font-size: 1rem;
            }

            .detail-footer {
                padding: 1.5rem;
                border-top: 1px solid #f0e0d0;
                background: white;
                display: flex;
                gap: 1rem;
                justify-content: center;
                flex-wrap: wrap;
            }

            .btn-back {
                background: #9b7c64;
                color: white;
                text-decoration: none;
                padding: 0.8rem 1.8rem;
                border-radius: 60px;
                font-weight: 600;
                display: inline-flex;
                align-items: center;
                gap: 0.6rem;
                transition: all 0.25s;
            }

            .btn-back:hover {
                background: #7d614b;
                transform: translateY(-2px);
            }

            .btn-edit {
                background: #fef2e6;
                color: #c17b4c;
                text-decoration: none;
                padding: 0.8rem 1.8rem;
                border-radius: 60px;
                font-weight: 600;
                display: inline-flex;
                align-items: center;
                gap: 0.6rem;
                transition: all 0.25s;
            }

            .btn-edit:hover {
                background: #f7e5cf;
                transform: translateY(-2px);
            }

            .btn-delete {
                background: transparent;
                border: 1px solid #e0774b;
                color: #e0774b;
                padding: 0.8rem 1.8rem;
                border-radius: 60px;
                font-weight: 600;
                cursor: pointer;
                transition: all 0.25s;
                display: inline-flex;
                align-items: center;
                gap: 0.6rem;
            }

            .btn-delete:hover {
                background: #e0774b;
                color: white;
                transform: translateY(-2px);
            }

            /* Alertes */
            .alert-warning {
                background: #fef7f0;
                border-left: 4px solid #c17b4c;
                padding: 1rem;
                border-radius: 1rem;
                margin-bottom: 1.5rem;
                color: #5a4a3a;
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
                .main-container {
                    padding: 1.5rem;
                }
                .detail-body {
                    padding: 1rem;
                }
                .detail-footer {
                    flex-direction: column;
                }
                .btn-back, .btn-edit, .btn-delete {
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
                <a href="{{ route('lost-found.index') }}" class="active">🔎 Lost & Found</a>
            </div>
        </div>
    </nav>

    <main class="main-container">
        <!-- En-tête -->
        <div class="page-header">
            <div>
                <h1>
                    <span>🔍</span> Détail de l'annonce
                </h1>
            </div>
        </div>

        <!-- Message si l'utilisateur est propriétaire -->
        @auth
            @if(auth()->id() == $lost->user_id)
                <div class="alert-warning" style="max-width: 700px; margin: 0 auto 1.5rem auto;">
                    <span>✏️</span> Vous êtes le propriétaire de cette annonce
                </div>
            @endif
        @endauth

        <!-- Carte de détail -->
        <div class="detail-card">
            <div class="detail-header">
                <span class="type-badge-large {{ $lost->type == 'perdu' ? 'type-perdu-large' : 'type-trouve-large' }}">
                    @if($lost->type == 'perdu')
                        🔍 Animal perdu
                    @else
                        🐾 Animal trouvé
                    @endif
                </span>
            </div>

            <div class="detail-body">
                <!-- Photo -->
                @if($lost->photo)
                    <div class="detail-photo">
                        <img src="{{ asset('uploads/'.$lost->photo) }}"
                             alt="Photo de l'animal">
                    </div>
                @endif

                <!-- Description -->
                <div class="info-group">
                    <span class="info-label">📝 Description</span>
                    <div class="info-value">{{ $lost->description }}</div>
                </div>

                <!-- Localisation -->
                <div class="info-group">
                    <span class="info-label">📍 Localisation</span>
                    <div class="info-value">{{ $lost->localisation }}</div>
                </div>

                <!-- Contact -->
                <div class="info-group">
                    <span class="info-label">📞 Contact</span>
                    <div class="info-value">{{ $lost->contact }}</div>
                </div>

                <!-- Date de publication -->
                <div class="info-group">
                    <span class="info-label">📅 Publiée le</span>
                    <div class="info-value">{{ $lost->created_at ? $lost->created_at->format('d/m/Y à H:i') : 'Date inconnue' }}</div>
                </div>
            </div>

            <div class="detail-footer">
                <a href="{{ route('lost-found.index') }}" class="btn-back">
                    ⬅ Retour aux annonces
                </a>
                
                @auth
                    @if(auth()->id() == $lost->user_id)
                        <a href="{{ route('lost-found.edit', $lost->id) }}" class="btn-edit">
                            ✏️ Modifier
                        </a>
                        <form method="POST" action="{{ route('lost-found.destroy', $lost->id) }}" style="display: inline;" onsubmit="return confirm('Supprimer cette annonce définitivement ?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-delete">
                                🗑️ Supprimer
                            </button>
                        </form>
                    @endif
                @endauth
            </div>
        </div>
    </main>

    <footer class="footer">
        <p>🐾 Patte Douce — Adopter, c'est offrir une famille pour la vie</p>
        <p style="margin-top: 6px;">📍 Ensemble, aidons les animaux perdus à retrouver leur famille</p>
    </footer>

    </body>
    </html>
</x-app-layout>