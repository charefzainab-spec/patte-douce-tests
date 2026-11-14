<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>Vétérinaires · Patte Douce</title>
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

        .logout-btn {
            background: transparent;
            border: 1.5px solid #f0e0d0;
            color: #9b7c64;
            padding: 0.5rem 1.2rem;
            border-radius: 40px;
            cursor: pointer;
            font-family: inherit;
            font-weight: 500;
            transition: all 0.2s;
        }

        .logout-btn:hover {
            background: #fff3e8;
            border-color: #c17b4c;
            color: #c17b4c;
        }

        /* ========== MAIN CONTAINER ========== */
        .main-container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 2rem;
        }

        /* En-tête */
        .page-header {
            margin-bottom: 1.5rem;
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

        /* ========== BARRE DE RECHERCHE ========== */
        .search-container {
            margin-bottom: 2rem;
            background: white;
            padding: 1.2rem;
            border-radius: 1.2rem;
            border: 1px solid #ffefdf;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.03);
        }

        .search-wrapper {
            display: flex;
            gap: 0.8rem;
            flex-wrap: wrap;
            align-items: center;
        }

        .search-input-group {
            flex: 1;
            min-width: 250px;
            position: relative;
        }

        .search-input-group .search-input {
            width: 100%;
            padding: 0.85rem 1rem 0.85rem 3rem;
            border: 1.5px solid #f0e0d0;
            border-radius: 60px;
            font-size: 1rem;
            transition: all 0.25s;
            background: #fefcf9;
            font-family: inherit;
        }

        .search-input-group .search-input:focus {
            outline: none;
            border-color: #c17b4c;
            box-shadow: 0 0 0 3px rgba(193, 123, 76, 0.15);
            background: white;
        }

        .search-input-group::before {
            content: "🔍";
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            font-size: 1.1rem;
            pointer-events: none;
            z-index: 1;
        }

        .btn-search {
            background: #c17b4c;
            color: white;
            border: none;
            padding: 0.85rem 1.8rem;
            border-radius: 60px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            font-family: inherit;
            font-size: 0.9rem;
            box-shadow: 0 2px 8px rgba(193, 123, 76, 0.2);
        }

        .btn-search:hover {
            background: #a86434;
            transform: translateY(-2px);
            box-shadow: 0 6px 14px rgba(168, 100, 52, 0.25);
        }

        .btn-clear {
            background: #fef2e6;
            color: #c17b4c;
            border: 1.5px solid #f0e0d0;
            padding: 0.85rem 1.8rem;
            border-radius: 60px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            font-family: inherit;
            font-size: 0.9rem;
            text-decoration: none;
        }

        .btn-clear:hover {
            background: #f7e5cf;
            transform: translateY(-2px);
            border-color: #c17b4c;
        }

        /* Résultats de recherche */
        .results-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
            gap: 0.5rem;
        }

        .results-count {
            background: #fef2e6;
            padding: 0.4rem 1rem;
            border-radius: 60px;
            font-size: 0.8rem;
            color: #a56839;
        }

        /* Grille des vétérinaires */
        .vets-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 1.8rem;
        }

        /* Carte vétérinaire */
        .vet-card {
            background: white;
            border-radius: 1.5rem;
            overflow: hidden;
            transition: all 0.3s ease;
            border: 1px solid #ffefdf;
            box-shadow: 0 6px 14px rgba(0, 0, 0, 0.03);
            display: flex;
            flex-direction: column;
        }

        .vet-card:hover {
            transform: translateY(-6px);
            border-color: #e6cdb3;
            box-shadow: 0 20px 28px -12px rgba(153, 94, 49, 0.15);
        }

        .card-header {
            background: linear-gradient(135deg, #c17b4c, #e7a16a);
            padding: 1rem 1.2rem;
            color: white;
        }

        .card-header h3 {
            font-size: 1.2rem;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .card-body {
            padding: 1.2rem;
            flex: 1;
        }

        .info-item {
            display: flex;
            align-items: center;
            gap: 0.6rem;
            margin-bottom: 0.8rem;
            color: #5a4a3a;
            font-size: 0.9rem;
        }

        .info-item .icon {
            font-size: 1.1rem;
            min-width: 28px;
            color: #c17b4c;
        }

        .info-item .label {
            font-weight: 600;
            color: #9b7c64;
            min-width: 70px;
        }

        .info-item .value {
            color: #2d3e2b;
            word-break: break-word;
        }

        .date-info {
            margin-top: 1rem;
            padding-top: 0.8rem;
            border-top: 1px solid #f0e0d0;
            font-size: 0.7rem;
            color: #b3967a;
            display: flex;
            align-items: center;
            gap: 0.4rem;
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

        .empty-state p {
            color: #9b7c64;
        }

        /* Pagination */
        .pagination {
            display: flex;
            justify-content: center;
            gap: 0.5rem;
            margin-top: 2.5rem;
            flex-wrap: wrap;
        }

        .pagination a, .pagination span {
            padding: 0.5rem 1rem;
            border-radius: 40px;
            text-decoration: none;
            color: #9b7c64;
            background: white;
            border: 1px solid #f0e0d0;
            transition: all 0.2s;
        }

        .pagination a:hover {
            background: #fef2e6;
            border-color: #c17b4c;
            color: #c17b4c;
        }

        .pagination .active {
            background: #c17b4c;
            color: white;
            border-color: #c17b4c;
        }

        /* Footer */
        .footer {
            text-align: center;
            padding: 1.8rem;
            margin-top: 2rem;
            font-size: 0.75rem;
            color: #b3967a;
            border-top: 1px solid #f0e0d0;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .nav-container {
                flex-direction: column;
                text-align: center;
            }
            .main-container {
                padding: 1rem;
            }
            .search-wrapper {
                flex-direction: column;
            }
            .search-input-group {
                width: 100%;
            }
            .btn-search, .btn-clear {
                width: 100%;
                justify-content: center;
            }
            .results-info {
                flex-direction: column;
                text-align: center;
            }
            .vets-grid {
                gap: 1rem;
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
            <a href="{{ route('lost-found.index') }}">🔎 Lost & Found</a>
            <a href="{{ route('veterinaires.index') }}" class="active">🏥 Vétérinaires</a>
            <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                @csrf
                <button type="submit" class="logout-btn">🚪 Déconnexion</button>
            </form>
        </div>
    </div>
</nav>

<main class="main-container">
    <div class="page-header">
        <h1>
            <span>🏥</span> Vétérinaires à proximité
        </h1>
        <p>Trouvez un vétérinaire de confiance près de chez vous</p>
    </div>

    <!-- 🔍 BARRE DE RECHERCHE -->
    <div class="search-container">
        <form method="GET" action="{{ route('veterinaires.index') }}">
            <div class="search-wrapper">
                <div class="search-input-group">
                    <input type="text"
                           name="search"
                           class="search-input"
                           placeholder="Rechercher par nom, adresse, téléphone..."
                           value="{{ request('search') }}">
                </div>
                <button type="submit" class="btn-search">
                    🔍 Rechercher
                </button>
                @if(request('search'))
                <a href="{{ route('veterinaires.index') }}" class="btn-clear">
                    ✖️ Effacer
                </a>
                @endif
            </div>
        </form>
    </div>

    <!-- Informations résultats -->
    <div class="results-info">
        <div class="results-count">
            📊 {{ $vets->count() }} vétérinaire(s) trouvé(s)
        </div>
        @if(request('search'))
        <div>
            <a href="{{ route('veterinaires.index') }}" class="filter-select" style="background: #fef2e6; text-decoration: none; padding: 0.4rem 1rem; border-radius: 40px; font-size: 0.8rem;">
                ✖️ Réinitialiser la recherche
            </a>
        </div>
        @endif
    </div>

    <!-- 📋 LISTE DES VÉTÉRINAIRES -->
    @if($vets->count() > 0)
    <div class="vets-grid">
        @foreach($vets as $vet)
        <div class="vet-card">
            <div class="card-header">
                <h3>
                    <span>🏥</span> {{ $vet->nom }}
                </h3>
            </div>
            <div class="card-body">
                <div class="info-item">
                    <span class="icon">📧</span>
                    <span class="label">Email :</span>
                    <span class="value">{{ $vet->email }}</span>
                </div>
                <div class="info-item">
                    <span class="icon">📞</span>
                    <span class="label">Téléphone :</span>
                    <span class="value">{{ $vet->telephone }}</span>
                </div>
                <div class="info-item">
                    <span class="icon">📍</span>
                    <span class="label">Adresse :</span>
                    <span class="value">{{ $vet->adresse }}</span>
                </div>
                <div class="date-info">
                    <span>📅</span> Membre depuis le {{ $vet->created_at ? $vet->created_at->format('d/m/Y') : 'Récemment' }}
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Pagination -->
    @if(method_exists($vets, 'links') && $vets->hasPages())
    <div class="pagination">
        {{ $vets->links() }}
    </div>
    @endif

    @else
    <!-- Message vide -->
    <div class="empty-state">
        <div class="emoji">🏥😔</div>
        <h3>Aucun vétérinaire trouvé</h3>
        <p>
            @if(request('search'))
                Aucun vétérinaire ne correspond à votre recherche.
            @else
                Aucun vétérinaire n'est encore enregistré.
            @endif
        </p>
        @if(request('search'))
        <a href="{{ route('veterinaires.index') }}" class="btn-clear" style="display: inline-flex; margin-top: 1rem;">
            ✖️ Effacer la recherche
        </a>
        @endif
    </div>
    @endif
</main>

<footer class="footer">
    <p>🐾 Patte Douce — Prenez soin de vos compagnons avec des professionnels de confiance</p>
    <p style="margin-top: 6px;">📍 Trouvez le vétérinaire le plus proche de chez vous</p>
</footer>

</body>
</html>