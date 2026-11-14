<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>Admin Dashboard · Patte Douce</title>
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

        /* Titre principal */
        .page-title {
            text-align: center;
            margin-bottom: 2rem;
        }

        .page-title h1 {
            font-size: 2.2rem;
            font-weight: 800;
            background: linear-gradient(135deg, #c17b4c, #e7a16a);
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;
            display: inline-flex;
            align-items: center;
            gap: 0.6rem;
        }

        /* Cartes statistiques */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: white;
            border-radius: 1.5rem;
            padding: 1.5rem;
            text-align: center;
            border: 1px solid #ffefdf;
            box-shadow: 0 6px 14px rgba(0, 0, 0, 0.03);
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            border-color: #e6cdb3;
            box-shadow: 0 20px 28px -12px rgba(153, 94, 49, 0.15);
        }

        .stat-card h3 {
            font-size: 2.5rem;
            font-weight: 800;
            color: #c17b4c;
            margin-bottom: 0.3rem;
        }

        .stat-card p {
            color: #9b7c64;
            font-size: 0.9rem;
            font-weight: 500;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.4rem;
        }

        /* Grille de gestion */
        .management-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
        }

        .management-card {
            background: white;
            border-radius: 1.5rem;
            padding: 1.5rem;
            border: 1px solid #ffefdf;
            box-shadow: 0 6px 14px rgba(0, 0, 0, 0.03);
            transition: all 0.3s ease;
        }

        .management-card:hover {
            transform: translateY(-5px);
            border-color: #e6cdb3;
            box-shadow: 0 20px 28px -12px rgba(153, 94, 49, 0.15);
        }

        .management-card h4 {
            font-size: 1.3rem;
            font-weight: 700;
            color: #c17b4c;
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .management-card p {
            color: #9b7c64;
            font-size: 0.85rem;
            margin-bottom: 1.2rem;
            line-height: 1.5;
        }

        /* Boutons */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            padding: 0.7rem 1.2rem;
            border-radius: 60px;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.9rem;
            transition: all 0.25s;
            border: none;
            cursor: pointer;
            width: 100%;
        }

        .btn-primary {
            background: #c17b4c;
            color: white;
            box-shadow: 0 4px 10px rgba(193, 123, 76, 0.25);
        }

        .btn-primary:hover {
            background: #a86434;
            transform: translateY(-2px);
            box-shadow: 0 8px 18px rgba(168, 100, 52, 0.25);
        }

        .btn-success {
            background: #7caf5a;
            color: white;
            box-shadow: 0 4px 10px rgba(124, 175, 90, 0.25);
        }

        .btn-success:hover {
            background: #5e8a42;
            transform: translateY(-2px);
        }

        .btn-warning {
            background: #e7a16a;
            color: white;
            box-shadow: 0 4px 10px rgba(231, 161, 106, 0.25);
        }

        .btn-warning:hover {
            background: #d48a4f;
            transform: translateY(-2px);
        }

        .btn-info {
            background: #8fb4c7;
            color: white;
            box-shadow: 0 4px 10px rgba(143, 180, 199, 0.25);
        }

        .btn-info:hover {
            background: #7199ae;
            transform: translateY(-2px);
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
            .stats-grid {
                gap: 1rem;
            }
            .stat-card h3 {
                font-size: 1.8rem;
            }
            .management-grid {
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
            <span style="color:#b45f2e;">Patte Douce - Admin</span>
        </a>
        <div class="nav-links">
            <a href="{{ route('dashboard') }}">👤 Vue utilisateur</a>
            <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                @csrf
                <button type="submit" class="logout-btn">🚪 Déconnexion</button>
            </form>
        </div>
    </div>
</nav>

<main class="main-container">
    <div class="page-title">
        <h1>⚙️ Admin Dashboard</h1>
    </div>

    <!-- Statistiques -->
    <div class="stats-grid">
        <div class="stat-card">
            <h3>{{ $usersCount }}</h3>
            <p>👤 Utilisateurs</p>
        </div>
        <div class="stat-card">
            <h3>{{ $animalsCount }}</h3>
            <p>🐾 Animaux</p>
        </div>
        <div class="stat-card">
            <h3>{{ $lostCount }}</h3>
            <p>🔎 Lost & Found</p>
        </div>
        <div class="stat-card">
            <h3>{{ $vetsCount }}</h3>
            <p>🩺 Vétérinaires</p>
        </div>
    </div>

    <!-- Gestion -->
    <div class="management-grid">
        <div class="management-card">
            <h4>👤 Gestion Utilisateurs</h4>
            <p>Voir, supprimer et gérer les utilisateurs de la plateforme.</p>
            <a href="{{ route('users.index') }}" class="btn btn-primary">
                👥 Gérer utilisateurs
            </a>
        </div>

        <div class="management-card">
            <h4>🐾 Gestion Animaux</h4>
            <p>Gérer les animaux disponibles à l'adoption.</p>
            <a href="{{ route('admin.animals') }}" class="btn btn-success">
                🐕 Gérer animaux
            </a>
        </div>

        <div class="management-card">
            <h4>🔎 Gestion Lost & Found</h4>
            <p>Vérifier et supprimer les annonces d'animaux perdus ou trouvés.</p>
            <a href="{{ route('admin.lostfound') }}" class="btn btn-warning">
                📋 Gérer annonces
            </a>
        </div>

        <div class="management-card">
            <h4>🩺 Gestion Vétérinaires</h4>
            <p>Ajouter, modifier ou supprimer les vétérinaires partenaires.</p>
            <a href="{{ route('admin.vets') }}" class="btn btn-info">
                🏥 Gérer vétérinaires
            </a>
        </div>
    </div>
</main>

<footer class="footer">
    <p>🐾 Patte Douce — Administration | Gestion complète de la plateforme d'adoption</p>
    <p style="margin-top: 6px;">📍 Ensemble, offrons une seconde chance aux animaux</p>
</footer>

</body>
</html>