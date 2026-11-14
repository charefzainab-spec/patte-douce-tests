<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>Nos animaux · Patte Douce</title>
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
            margin-bottom: 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
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

        .counter-badge {
            background: #fef2e6;
            padding: 0.5rem 1rem;
            border-radius: 40px;
            font-size: 0.85rem;
            color: #a56839;
        }

        /* ========== BARRE DE RECHERCHE ========== */
        .search-container {
            margin-bottom: 2rem;
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

        /* Filtres rapides */
        .filters-row {
            display: flex;
            gap: 0.8rem;
            flex-wrap: wrap;
            margin-top: 1rem;
            padding-top: 1rem;
            border-top: 1px solid #f0e0d0;
        }

        .filter-chip {
            background: #fefcf9;
            border: 1.5px solid #f0e0d0;
            padding: 0.4rem 1rem;
            border-radius: 40px;
            font-size: 0.8rem;
            cursor: pointer;
            transition: all 0.2s;
            text-decoration: none;
            color: #9b7c64;
        }

        .filter-chip:hover, .filter-chip.active {
            background: #fef2e6;
            border-color: #c17b4c;
            color: #c17b4c;
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

        /* Grille des animaux */
        .animals-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
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

        .card-img {
            height: 200px;
            overflow: hidden;
            position: relative;
        }

        .card-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s;
        }

        .animal-card:hover .card-img img {
            transform: scale(1.05);
        }

        .animal-badge {
            position: absolute;
            top: 12px;
            right: 12px;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(4px);
            padding: 0.3rem 0.8rem;
            border-radius: 40px;
            font-size: 0.7rem;
            font-weight: 600;
            color: #c17b4c;
        }

        .card-body {
            padding: 1.2rem;
            flex: 1;
        }

        .card-title {
            font-size: 1.2rem;
            font-weight: 700;
            color: #2d3e2b;
            margin-bottom: 0.5rem;
        }

        .card-info {
            display: flex;
            flex-wrap: wrap;
            gap: 0.8rem;
            margin: 0.8rem 0;
            font-size: 0.8rem;
        }

        .info-tag {
            background: #fef2e6;
            padding: 0.2rem 0.6rem;
            border-radius: 40px;
            color: #a56839;
        }

        .description {
            color: #9b7c64;
            font-size: 0.85rem;
            line-height: 1.4;
            margin: 0.8rem 0;
        }

        .card-footer {
            padding: 1rem 1.2rem 1.2rem;
            border-top: 1px solid #f0e0d0;
            background: white;
        }

        .btn-details {
            display: inline-block;
            width: 100%;
            text-align: center;
            background: #c17b4c;
            color: white;
            text-decoration: none;
            padding: 0.7rem;
            border-radius: 60px;
            font-weight: 600;
            transition: all 0.2s;
            border: none;
            cursor: pointer;
        }

        .btn-details:hover {
            background: #a86434;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(168, 100, 52, 0.25);
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
            padding: 2rem;
            margin-top: 3rem;
            border-top: 1px solid #f0e0d0;
            font-size: 0.75rem;
            color: #b3967a;
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
            .filters-row {
                justify-content: center;
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
            <a href="{{ route('animals.index') }}" class="active">🐕 Nos animaux</a>
        </div>
    </div>
</nav>

<main class="main-container">
    <!-- En-tête -->
    <div class="page-header">
        <div>
            <h1>
                <span>🐾</span> Nos animaux à adopter
            </h1>
            <p>Ils n'attendent que vous pour trouver une famille aimante</p>
        </div>
        <div>
            <span class="counter-badge">
                ❤️ {{ $animals->count() }} compagnons disponibles
            </span>
        </div>
    </div>

    <!-- 🔍 BARRE DE RECHERCHE -->
    <div class="search-container">
        <form method="GET" action="{{ route('animals.index') }}">
            <div class="search-wrapper">
                <div class="search-input-group">
                    <input type="text"
                           name="search"
                           class="search-input"
                           placeholder="Rechercher par nom, race..."
                           value="{{ request('search') }}">
                </div>
                <button type="submit" class="btn-search">
                    🔍 Rechercher
                </button>
                @if(request('search'))
                <a href="{{ route('animals.index') }}" class="btn-clear">
                    ✖️ Effacer
                </a>
                @endif
            </div>
        </form>

        <!-- Filtres rapides -->
        <div class="filters-row">
            <a href="{{ route('animals.index') }}" class="filter-chip {{ !request('age_filter') && !request('species_filter') ? 'active' : '' }}">
                Tous
            </a>
            @php
                $currentAgeFilter = request('age_filter');
                $currentSpeciesFilter = request('species_filter');
            @endphp
            <a href="{{ route('animals.index', array_merge(request()->except('age_filter'), ['age_filter' => 'baby'])) }}" 
               class="filter-chip {{ $currentAgeFilter == 'baby' ? 'active' : '' }}">
                🐣 Bébé (0-1 an)
            </a>
            <a href="{{ route('animals.index', array_merge(request()->except('age_filter'), ['age_filter' => 'young'])) }}" 
               class="filter-chip {{ $currentAgeFilter == 'young' ? 'active' : '' }}">
                🌟 Jeune (1-5 ans)
            </a>
            <a href="{{ route('animals.index', array_merge(request()->except('age_filter'), ['age_filter' => 'adult'])) }}" 
               class="filter-chip {{ $currentAgeFilter == 'adult' ? 'active' : '' }}">
                🍂 Adulte (5-10 ans)
            </a>
            <a href="{{ route('animals.index', array_merge(request()->except('age_filter'), ['age_filter' => 'senior'])) }}" 
               class="filter-chip {{ $currentAgeFilter == 'senior' ? 'active' : '' }}">
                🦮 Senior (10+ ans)
            </a>
        </div>
    </div>

    <!-- Informations résultats -->
    <div class="results-info">
        <div class="results-count">
            📊 {{ $animals->count() }} résultat(s) trouvé(s)
        </div>
        @if(request('search') || request('age_filter') || request('species_filter'))
        <div>
            <a href="{{ route('animals.index') }}" class="filter-chip" style="background: #fef2e6;">
                ✖️ Réinitialiser les filtres
            </a>
        </div>
        @endif
    </div>

    <!-- Grille des animaux -->
    @if($animals->count() > 0)
    <div class="animals-grid">
        @foreach($animals as $animal)
        <div class="animal-card">
            <div class="card-img">
                <img src="{{ asset('uploads/'.$animal->photo) }}" alt="{{ $animal->titre }}">
                <span class="animal-badge">
                    @if($animal->age < 1) 🐣 Bébé
                    @elseif($animal->age < 5) 🌟 Jeune
                    @elseif($animal->age < 10) 🍂 Adulte
                    @else 🦮 Senior
                    @endif
                </span>
            </div>
            <div class="card-body">
                <h3 class="card-title">{{ $animal->titre }}</h3>
                <div class="card-info">
                    <span class="info-tag">🐕 {{ $animal->race ?: 'Race mixte' }}</span>
                    <span class="info-tag">🎂 {{ $animal->age }} ans</span>
                    @if(isset($animal->sexe))
                    <span class="info-tag">{{ $animal->sexe == 'F' ? '♀ Féminin' : '♂ Masculin' }}</span>
                    @endif
                </div>
                <div class="description">
                    {{ Str::limit($animal->description, 80) }}
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ route('animals.show', $animal->id) }}" class="btn-details">
                    Voir détails →
                </a>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Pagination -->
    @if(method_exists($animals, 'links') && $animals->hasPages())
    <div class="pagination">
        {{ $animals->links() }}
    </div>
    @endif

    @else
    <!-- Message quand aucun animal -->
    <div class="empty-state">
        <div class="emoji">🐾💔</div>
        <h3>Aucun animal trouvé</h3>
        <p style="color:#9b7c64;">Aucun animal ne correspond à vos critères de recherche.</p>
        <a href="{{ route('animals.index') }}" class="btn-details" style="display: inline-block; width: auto; padding: 0.7rem 1.8rem; margin-top: 1rem;">
            Voir tous les animaux
        </a>
    </div>
    @endif
</main>

<footer class="footer">
    <p>🐾 Patte Douce — Adopter, c'est offrir une famille pour la vie</p>
    <p style="margin-top: 6px;">📍 Refuge partenaire | 📞 01 23 45 67 89 | ✉️ adoption@pattedouce.fr</p>
</footer>

</body>
</html>