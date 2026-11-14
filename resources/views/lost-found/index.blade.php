<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>Animaux perdus/trouvés · Patte Douce</title>
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

        /* ========== BARRE DE RECHERCHE ========== */
        .search-container {
            margin-bottom: 1.5rem;
            background: white;
            padding: 1rem 1.2rem;
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

        /* Filtres */
        .filters-bar {
            background: white;
            border-radius: 1.2rem;
            padding: 1rem 1.5rem;
            margin-bottom: 1.5rem;
            border: 1px solid #ffefdf;
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            align-items: center;
            justify-content: space-between;
        }

        .filter-group {
            display: flex;
            gap: 0.8rem;
            flex-wrap: wrap;
        }

        .filter-select {
            padding: 0.5rem 1rem;
            border: 1.5px solid #f0e0d0;
            border-radius: 40px;
            background: #fefcf9;
            font-family: inherit;
            color: #5a4a3a;
            cursor: pointer;
            outline: none;
        }

        .filter-select:focus {
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

        /* Grille des annonces */
        .announces-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 1.8rem;
        }

        /* Carte annonce */
        .announce-card {
            background: white;
            border-radius: 1.5rem;
            overflow: hidden;
            transition: all 0.3s ease;
            border: 1px solid #ffefdf;
            box-shadow: 0 6px 14px rgba(0, 0, 0, 0.03);
            display: flex;
            flex-direction: column;
        }

        .announce-card:hover {
            transform: translateY(-6px);
            border-color: #e6cdb3;
            box-shadow: 0 20px 28px -12px rgba(153, 94, 49, 0.15);
        }

        /* Style de l'image */
        .card-photo {
            width: 100%;
            height: 200px;
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

        .type-badge {
            padding: 0.3rem 0.8rem;
            border-radius: 40px;
            font-size: 0.7rem;
            font-weight: 700;
        }

        .type-perdu {
            background: #fef2e6;
            color: #e0774b;
        }

        .type-trouve {
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
            font-size: 1.1rem;
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

        .location {
            display: flex;
            align-items: center;
            gap: 0.4rem;
            font-size: 0.8rem;
            color: #a56839;
            margin-bottom: 1rem;
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
            .filters-bar {
                flex-direction: column;
            }
            .announces-grid {
                grid-template-columns: 1fr;
            }
            .results-info {
                flex-direction: column;
                text-align: center;
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
                <span>🔎</span> Animaux perdus & trouvés
            </h1>
            <p>Signalez un animal perdu ou trouvé près de chez vous</p>
        </div>
        <a href="{{ route('lost-found.create') }}" class="btn-add">
            ➕ Ajouter une annonce
        </a>
    </div>

    <!-- 🔍 BARRE DE RECHERCHE -->
    <div class="search-container">
        <form method="GET" action="{{ route('lost-found.index') }}">
            <div class="search-wrapper">
                <div class="search-input-group">
                    <input type="text"
                           name="search"
                           class="search-input"
                           placeholder="Rechercher par description, localisation..."
                           value="{{ request('search') }}">
                </div>
                <button type="submit" class="btn-search">
                    🔍 Rechercher
                </button>
                @if(request('search') || request('type'))
                <a href="{{ route('lost-found.index') }}" class="btn-clear">
                    ✖️ Effacer
                </a>
                @endif
            </div>
        </form>
    </div>

    <!-- Filtres -->
    <div class="filters-bar">
        <div class="filter-group">
            <select id="typeFilter" class="filter-select" onchange="applyFilter()">
                <option value="">Tous les types</option>
                <option value="perdu" {{ request('type') == 'perdu' ? 'selected' : '' }}>🐾 Perdu</option>
                <option value="trouve" {{ request('type') == 'trouve' ? 'selected' : '' }}>🐕 Trouvé</option>
            </select>
        </div>
        <div class="filter-group">
            <span style="color:#9b7c64; font-size:0.8rem;">📌 {{ $losts->count() }} annonces</span>
        </div>
    </div>

    <!-- Informations résultats -->
    <div class="results-info">
        <div class="results-count">
            📊 {{ $losts->count() }} résultat(s) trouvé(s)
        </div>
        @if(request('search') || request('type'))
        <div>
            <a href="{{ route('lost-found.index') }}" class="filter-select" style="background: #fef2e6; text-decoration: none;">
                ✖️ Réinitialiser les filtres
            </a>
        </div>
        @endif
    </div>

    <!-- Grille des annonces -->
    @if($losts->count() > 0)
    <div class="announces-grid">
        @foreach($losts as $lost)
        <div class="announce-card">
            @if($lost->photo)
                <img src="{{ asset('uploads/'.$lost->photo) }}"
                     alt="photo"
                     class="card-photo">
            @endif
            <div class="card-header">
                <span class="type-badge {{ $lost->type == 'perdu' ? 'type-perdu' : 'type-trouve' }}">
                    @if($lost->type == 'perdu') 🐾 Perdu
                    @else 🐕 Trouvé
                    @endif
                </span>
                <span class="date-badge">📅 {{ $lost->created_at ? $lost->created_at->format('d/m/Y') : 'Récent' }}</span>
            </div>
            <div class="card-body">
                <h3 class="card-title">{{ $lost->titre ?? ($lost->type == 'perdu' ? 'Animal perdu' : 'Animal trouvé') }}</h3>
                <p class="card-description">{{ Str::limit($lost->description, 80) }}</p>
                <div class="location">
                    <span>📍</span> {{ $lost->localisation }}
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ route('lost-found.show', $lost->id) }}" class="btn-view">
                    👁️ Voir détails
                </a>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <!-- Message vide -->
    <div class="empty-state">
        <div class="emoji">🔎🐾</div>
        <h3>Aucune annonce</h3>
        <p style="color:#9b7c64;">
            @if(request('search') || request('type'))
                Aucune annonce ne correspond à vos critères de recherche.
            @else
                Aucune annonce d'animal perdu ou trouvé pour le moment.
            @endif
        </p>
        @if(request('search') || request('type'))
            <a href="{{ route('lost-found.index') }}" class="btn-add" style="margin-top: 1rem; display: inline-flex; background: #fef2e6; color: #c17b4c; box-shadow: none;">
                ✖️ Réinitialiser les filtres
            </a>
        @else
            <a href="{{ route('lost-found.create') }}" class="btn-add" style="margin-top: 1rem; display: inline-flex;">
                ➕ Créer la première annonce
            </a>
        @endif
    </div>
    @endif
</main>

<footer class="footer">
    <p>🐾 Patte Douce — Adopter, c'est offrir une famille pour la vie</p>
    <p style="margin-top: 6px;">📍 Ensemble, aidons les animaux perdus à retrouver leur famille</p>
</footer>

<!-- Script de filtrage -->
<script>
    function applyFilter() {
        const type = document.getElementById('typeFilter').value;
        let url = new URL(window.location.href);
        
        // Conserver le paramètre search s'il existe
        const search = url.searchParams.get('search');
        
        // Nettoyer les paramètres
        url.searchParams.delete('type');
        if (search) url.searchParams.set('search', search);
        
        // Ajouter le nouveau filtre
        if (type) url.searchParams.set('type', type);
        
        window.location.href = url.toString();
    }
</script>

</body>
</html>