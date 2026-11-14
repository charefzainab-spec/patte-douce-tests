<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>Gestion vétérinaires · Patte Douce</title>
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
            max-width: 1400px;
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
            max-width: 1400px;
            margin: 0 auto;
            padding: 2rem;
        }

        /* Titre principal */
        .main-container > h2 {
            font-size: 1.8rem;
            font-weight: 800;
            background: linear-gradient(135deg, #c17b4c, #e7a16a);
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;
            display: inline-flex;
            align-items: center;
            gap: 0.6rem;
            margin-bottom: 1rem;
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

        /* Résultats info */
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

        /* Bouton ajouter */
        .main-container > a {
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
            margin-bottom: 1.5rem;
            border: none;
        }

        .main-container > a:hover {
            background: #a86434;
            transform: translateY(-2px);
            box-shadow: 0 8px 18px rgba(168, 100, 52, 0.25);
        }

        /* Grille des cartes */
        .cards-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 1.8rem;
            margin-top: 0;
        }

        /* Cartes */
        .card {
            background: white;
            border-radius: 1.2rem;
            overflow: hidden;
            transition: all 0.3s ease;
            border: 1px solid #ffefdf;
            box-shadow: 0 6px 14px rgba(0, 0, 0, 0.03);
            display: flex;
            flex-direction: column;
        }

        .card:hover {
            transform: translateY(-6px);
            border-color: #e6cdb3;
            box-shadow: 0 20px 28px -12px rgba(153, 94, 49, 0.15);
        }

        /* En-tête de la carte avec dégradé */
        .card h3 {
            background: linear-gradient(135deg, #c17b4c, #e7a16a);
            color: white;
            padding: 1rem 1.2rem;
            font-size: 1.2rem;
            font-weight: 700;
            margin: 0;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        /* Corps de la carte */
        .card p {
            padding: 0.6rem 1.2rem;
            margin: 0;
            color: #5a4a3a;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 0.6rem;
            border-bottom: 1px solid #faf5ee;
        }

        .card p:last-of-type {
            border-bottom: none;
        }

        /* Style des icônes dans les paragraphes */
        .card p:nth-of-type(1)::before {
            content: "📧";
            font-size: 1rem;
            min-width: 28px;
            color: #c17b4c;
        }

        .card p:nth-of-type(2)::before {
            content: "📞";
            font-size: 1rem;
            min-width: 28px;
            color: #c17b4c;
        }

        .card p:nth-of-type(3)::before {
            content: "📍";
            font-size: 1rem;
            min-width: 28px;
            color: #c17b4c;
        }

        /* Actions */
        .card-actions {
            padding: 1rem 1.2rem 1.2rem;
            border-top: 1px solid #f0e0d0;
            background: white;
            display: flex;
            gap: 0.8rem;
            flex-wrap: wrap;
        }

        .card a {
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
            flex: 1;
            justify-content: center;
            border: none;
        }

        .card a:hover {
            background: #f7e5cf;
            transform: translateY(-2px);
        }

        .card form {
            flex: 1;
            margin: 0;
        }

        .card form button {
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
            font-family: inherit;
            width: 100%;
            justify-content: center;
        }

        .card form button:hover {
            background: #e0774b;
            color: white;
            transform: translateY(-2px);
        }

        /* Message vide (si pas de vétérinaires) */
        .empty-message {
            text-align: center;
            padding: 4rem 2rem;
            background: white;
            border-radius: 2rem;
            border: 1px solid #ffefdf;
            margin-top: 1rem;
        }

        .empty-message p {
            color: #9b7c64;
            font-size: 1rem;
        }

        /* Footer */
        .footer {
            text-align: center;
            padding: 1.5rem;
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
            .main-container > a {
                display: flex;
                width: 100%;
                justify-content: center;
            }
            .cards-container {
                gap: 1rem;
            }
            .card-actions {
                flex-direction: column;
            }
            .card a, .card form button {
                width: 100%;
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
            <span style="color:#b45f2e;">Patte Douce - Admin</span>
        </a>
        <div class="nav-links">
            <a href="{{ route('admin.dashboard') }}">🛡️ Dashboard</a>
            <a href="{{ route('admin.animals') }}">🐕 Animaux</a>
            <a href="{{ route('users.index') }}">👥 Utilisateurs</a>
            <a href="{{ route('admin.lostfound') }}">🔎 Lost & Found</a>
            <a href="{{ route('admin.vets') }}" style="color:#c17b4c; font-weight:600;">🏥 Vétérinaires</a>
            <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                @csrf
                <button type="submit" class="logout-btn">🚪 Déconnexion</button>
            </form>
        </div>
    </div>
</nav>

<main class="main-container">
    <h2>🏥 Gestion Vétérinaires</h2>

    <!-- 🔍 BARRE DE RECHERCHE -->
    <div class="search-container">
        <form method="GET" action="{{ route('admin.vets') }}">
            <div class="search-wrapper">
                <div class="search-input-group">
                    <input type="text"
                           name="search"
                           class="search-input"
                           placeholder="Rechercher par nom, email, téléphone, adresse..."
                           value="{{ request('search') }}">
                </div>
                <button type="submit" class="btn-search">
                    🔍 Rechercher
                </button>
                @if(request('search'))
                <a href="{{ route('admin.vets') }}" class="btn-clear">
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
            <a href="{{ route('admin.vets') }}" style="background: #fef2e6; padding: 0.4rem 1rem; border-radius: 40px; text-decoration: none; color: #c17b4c; font-size: 0.8rem;">
                ✖️ Réinitialiser la recherche
            </a>
        </div>
        @endif
    </div>

    <a href="{{ route('admin.vets.create') }}">➕ Ajouter vétérinaire</a>

    <div class="cards-container">
        @forelse($vets as $vet)
        <div class="card">
            <h3>{{ $vet->nom }}</h3>
            <p>{{ $vet->email }}</p>
            <p>{{ $vet->telephone }}</p>
            <p>{{ $vet->adresse }}</p>

            <div class="card-actions">
                <a href="{{ route('admin.vets.edit', $vet->id) }}">✏️ Modifier</a>

                <form method="POST" action="{{ route('admin.vets.destroy', $vet->id) }}" onsubmit="return confirm('Supprimer définitivement ce vétérinaire ?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit">🗑️ Supprimer</button>
                </form>
            </div>
        </div>
        @empty
        <div class="empty-message">
            <p>😢 Aucun vétérinaire trouvé</p>
            @if(request('search'))
            <a href="{{ route('admin.vets') }}" class="btn-clear" style="display: inline-flex; margin-top: 1rem;">
                ✖️ Effacer la recherche
            </a>
            @endif
        </div>
        @endforelse
    </div>
</main>

<footer class="footer">
    <p>🐾 Patte Douce — Administration | Gestion des vétérinaires partenaires</p>
</footer>

</body>
</html>