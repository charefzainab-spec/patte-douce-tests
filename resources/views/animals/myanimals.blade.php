<x-app-layout>
    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
        <title>Mes animaux · Patte Douce</title>
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

            .page-header p {
                color: #9b7c64;
                margin-top: 0.3rem;
                font-size: 0.9rem;
            }

            .btn-add {
                background: #c17b4c;
                color: white;
                text-decoration: none;
                padding: 0.8rem 1.5rem;
                border-radius: 60px;
                font-weight: 600;
                display: inline-flex;
                align-items: center;
                gap: 0.6rem;
                transition: all 0.25s;
                box-shadow: 0 4px 10px rgba(193, 123, 76, 0.25);
            }

            .btn-add:hover {
                background: #a86434;
                transform: translateY(-2px);
                box-shadow: 0 8px 18px rgba(168, 100, 52, 0.25);
            }

            /* Grille des animaux */
            .animals-grid {
                display: grid;
                grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
                gap: 1.8rem;
            }

            /* Carte animal */
            .animal-card {
                background: white;
                border-radius: 1.5rem;
                overflow: hidden;
                transition: all 0.3s ease;
                border: 1px solid #ffefdf;
                box-shadow: 0 6px 14px rgba(0, 0, 0, 0.03);
                display: flex;
                flex-direction: column;
            }

            .animal-card:hover {
                transform: translateY(-6px);
                border-color: #e6cdb3;
                box-shadow: 0 20px 28px -12px rgba(153, 94, 49, 0.15);
            }

            /* Photo dans la carte */
            .card-photo {
                width: 100%;
                height: 220px;
                object-fit: cover;
                background: #fef5e8;
                display: block;
            }

            .card-header {
                padding: 1rem 1.2rem 0.5rem;
                display: flex;
                justify-content: space-between;
                align-items: center;
            }

            .status-badge {
                padding: 0.3rem 0.8rem;
                border-radius: 40px;
                font-size: 0.7rem;
                font-weight: 700;
                background: #eef5ea;
                color: #7caf5a;
            }

            .date-badge {
                font-size: 0.7rem;
                color: #b3967a;
            }

            .card-body {
                padding: 0.8rem 1.2rem;
                flex: 1;
            }

            .card-title {
                font-size: 1.2rem;
                font-weight: 700;
                color: #2d3e2b;
                margin-bottom: 0.5rem;
            }

            .card-description {
                color: #9b7c64;
                font-size: 0.85rem;
                line-height: 1.4;
                margin-bottom: 0.8rem;
            }

            .animal-type {
                display: flex;
                align-items: center;
                gap: 0.4rem;
                font-size: 0.8rem;
                color: #a56839;
                margin-bottom: 0.5rem;
            }

            .age {
                display: flex;
                align-items: center;
                gap: 0.4rem;
                font-size: 0.8rem;
                color: #a56839;
            }

            .card-footer {
                padding: 1rem 1.2rem 1.2rem;
                border-top: 1px solid #f0e0d0;
                background: white;
                display: flex;
                gap: 0.6rem;
                flex-wrap: wrap;
            }

            .btn-view {
                background: #c17b4c;
                color: white;
                text-decoration: none;
                padding: 0.5rem 1rem;
                border-radius: 40px;
                font-size: 0.8rem;
                font-weight: 600;
                transition: all 0.2s;
                display: inline-flex;
                align-items: center;
                gap: 0.4rem;
            }

            .btn-view:hover {
                background: #a86434;
                transform: translateY(-2px);
            }

            .btn-edit {
                background: #fef2e6;
                color: #c17b4c;
                text-decoration: none;
                padding: 0.5rem 1rem;
                border-radius: 40px;
                font-size: 0.8rem;
                font-weight: 600;
                transition: all 0.2s;
                display: inline-flex;
                align-items: center;
                gap: 0.4rem;
            }

            .btn-edit:hover {
                background: #f7e5cf;
                transform: translateY(-2px);
            }

            .btn-delete {
                background: transparent;
                border: 1px solid #e0774b;
                color: #e0774b;
                padding: 0.5rem 1rem;
                border-radius: 40px;
                font-size: 0.8rem;
                font-weight: 600;
                cursor: pointer;
                transition: all 0.2s;
                display: inline-flex;
                align-items: center;
                gap: 0.4rem;
            }

            .btn-delete:hover {
                background: #e0774b;
                color: white;
                transform: translateY(-2px);
            }

            /* Message vide */
            .empty-state {
                text-align: center;
                padding: 4rem 2rem;
                background: white;
                border-radius: 2rem;
                border: 1px solid #ffefdf;
            }

            .empty-state .emoji {
                font-size: 4rem;
                margin-bottom: 1rem;
            }

            .empty-state h3 {
                color: #c17b4c;
                margin-bottom: 0.5rem;
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
                .page-header {
                    flex-direction: column;
                    text-align: center;
                }
                .animals-grid {
                    grid-template-columns: 1fr;
                }
                .card-footer {
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
                <a href="{{ route('animals.index') }}" class="active">🐕 Nos animaux</a>
                <a href="{{ route('lost-found.index') }}">🔎 Lost & Found</a>
            </div>
        </div>
    </nav>

    <main class="main-container">
        <!-- En-tête -->
        <div class="page-header">
            <div>
                <h1>
                    <span>🐕</span> Mes animaux
                </h1>
                <p>Gérez vos compagnons à adopter</p>
            </div>
            <a href="{{ route('animals.create') }}" class="btn-add">
                ➕ Ajouter un animal
            </a>
        </div>

        <!-- Grille des animaux -->
        @if($animals->count() > 0)
        <div class="animals-grid">
            @foreach($animals as $animal)
            <div class="animal-card">
                @if($animal->photo)
                    <img src="{{ asset('uploads/'.$animal->photo) }}"
                         alt="Photo de {{ $animal->titre }}"
                         class="card-photo"
                         onerror="this.src='https://placehold.co/400x220/fef5e8/c17b4c?text=🐾+Photo+animale'">
                @else
                    <img src="https://placehold.co/400x220/fef5e8/c17b4c?text=🐾+Sans+photo" 
                         alt="Pas de photo"
                         class="card-photo">
                @endif
                
                <div class="card-header">
                    <span class="status-badge">
                        🏠 Disponible
                    </span>
                    <span class="date-badge">📅 {{ $animal->created_at ? $animal->created_at->format('d/m/Y') : 'Récent' }}</span>
                </div>
                
                <div class="card-body">
                    <h3 class="card-title">{{ $animal->titre }}</h3>
                    <p class="card-description">{{ Str::limit($animal->description, 80) }}</p>
                    @if($animal->type)
                    <div class="animal-type">
                        <span>🐾</span> {{ $animal->type }}
                    </div>
                    @endif
                    @if($animal->age)
                    <div class="age">
                        <span>🎂</span> {{ $animal->age }}
                    </div>
                    @endif
                </div>
                
                <div class="card-footer">
                    <a href="{{ route('animals.show', $animal->id) }}" class="btn-view">
                        👁️ Voir détails
                    </a>
                    <a href="{{ route('animals.edit', $animal->id) }}" class="btn-edit">
                        ✏️ Modifier
                    </a>
                    <form method="POST" action="{{ route('animals.destroy', $animal->id) }}" style="display: inline;" onsubmit="return confirm('Supprimer cet animal définitivement ?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete">
                            🗑️ Supprimer
                        </button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <!-- Message vide -->
        <div class="empty-state">
            <div class="emoji">🐾💔</div>
            <h3>Aucun animal</h3>
            <p style="color:#9b7c64;">Vous n'avez pas encore ajouté d'animal à adopter.</p>
            <a href="{{ route('animals.create') }}" class="btn-add" style="margin-top: 1rem; display: inline-flex;">
                ➕ Ajouter mon premier animal
            </a>
        </div>
        @endif
    </main>

    <footer class="footer">
        <p>🐾 Patte Douce — Adopter, c'est offrir une famille pour la vie</p>
        <p style="margin-top: 6px;">📍 Donnez une seconde chance à ces animaux</p>
    </footer>

    </body>
    </html>
</x-app-layout>