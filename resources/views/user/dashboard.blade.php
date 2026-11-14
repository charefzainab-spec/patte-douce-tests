<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>Mon espace · Patte Douce</title>
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

        .nav-user {
            display: flex;
            align-items: center;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .user-greeting {
            display: flex;
            align-items: center;
            gap: 0.6rem;
            background: #fef2e6;
            padding: 0.5rem 1.2rem;
            border-radius: 60px;
            font-weight: 500;
            color: #5a4a3a;
        }

        .logout-btn {
            background: transparent;
            border: 1.5px solid #f0e0d0;
            color: #9b7c64;
            padding: 0.5rem 1.2rem;
            border-radius: 60px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.2s;
            cursor: pointer;
            font-family: inherit;
        }

        .logout-btn:hover {
            background: #fff3e8;
            border-color: #c17b4c;
            color: #c17b4c;
        }

        .profile-link {
            background: #c17b4c;
            color: white !important;
            padding: 0.5rem 1.2rem;
            border-radius: 60px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.2s;
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
        }

        .profile-link:hover {
            background: #a86434;
            transform: translateY(-2px);
        }

        /* ========== MAIN CONTAINER ========== */
        .main-container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 2rem;
        }

        /* En-tête */
        .page-header {
            margin-bottom: 2rem;
        }

        .page-header h1 {
            font-size: 2.2rem;
            font-weight: 800;
            background: linear-gradient(135deg, #c17b4c, #e7a16a, #8f5e3c);
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;
            display: inline-flex;
            align-items: center;
            gap: 0.6rem;
        }

        .page-header p {
            color: #9b7c64;
            margin-top: 0.5rem;
            font-size: 1rem;
        }

        /* Statistiques rapides */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2.5rem;
        }

        .stat-card {
            background: white;
            border-radius: 1.5rem;
            padding: 1.2rem 1.5rem;
            display: flex;
            align-items: center;
            gap: 1rem;
            border: 1px solid #ffefdf;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.03);
            transition: transform 0.2s;
        }

        .stat-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(193, 123, 76, 0.08);
        }

        .stat-icon {
            font-size: 2.5rem;
            background: #fef2e6;
            width: 55px;
            height: 55px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 60px;
        }

        .stat-info h3 {
            font-size: 1.8rem;
            font-weight: 800;
            color: #c17b4c;
            line-height: 1.2;
        }

        .stat-info p {
            color: #9b7c64;
            font-size: 0.8rem;
            font-weight: 500;
        }

        /* Grille des cartes fonctionnalités */
        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1.8rem;
            margin-bottom: 2.5rem;
        }

        .feature-card {
            background: white;
            border-radius: 1.8rem;
            padding: 1.8rem;
            text-decoration: none;
            transition: all 0.3s ease;
            border: 1px solid #ffefdf;
            box-shadow: 0 6px 14px rgba(0, 0, 0, 0.03);
            display: block;
        }

        .feature-card:hover {
            transform: translateY(-6px);
            border-color: #e6cdb3;
            box-shadow: 0 20px 28px -12px rgba(153, 94, 49, 0.15);
        }

        .feature-icon {
            font-size: 2.8rem;
            margin-bottom: 1rem;
        }

        .feature-card h2 {
            font-size: 1.4rem;
            font-weight: 700;
            color: #c17b4c;
            margin-bottom: 0.6rem;
        }

        .feature-card p {
            color: #7a6854;
            font-size: 0.9rem;
            line-height: 1.5;
        }

        .card-footer {
            margin-top: 1.2rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.85rem;
            font-weight: 500;
            color: #c17b4c;
        }

        /* Section récente / activité */
        .recent-section {
            background: white;
            border-radius: 1.5rem;
            padding: 1.5rem;
            border: 1px solid #ffefdf;
            margin-top: 1rem;
        }

        .recent-section h3 {
            font-size: 1.2rem;
            font-weight: 700;
            color: #5a4a3a;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .activity-list {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .activity-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 0.8rem;
            background: #fefcf9;
            border-radius: 1rem;
            transition: background 0.2s;
        }

        .activity-item:hover {
            background: #fffaf5;
        }

        .activity-dot {
            width: 10px;
            height: 10px;
            background: #c17b4c;
            border-radius: 50%;
        }

        .activity-text {
            flex: 1;
            color: #5a4a3a;
            font-size: 0.9rem;
        }

        .activity-date {
            font-size: 0.75rem;
            color: #b3967a;
        }

        /* Conseils bienveillants */
        .advice-box {
            margin-top: 2rem;
            background: #fef2e6;
            border-radius: 1.2rem;
            padding: 1rem 1.5rem;
            text-align: center;
            border: 1px solid #f7e5cf;
        }

        .advice-box p {
            color: #a56839;
            font-size: 0.85rem;
        }

        /* Footer */
        .footer {
            text-align: center;
            padding: 2rem;
            margin-top: 2rem;
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
            .nav-user {
                justify-content: center;
            }
            .main-container {
                padding: 1.5rem;
            }
            .page-header h1 {
                font-size: 1.8rem;
            }
            .stat-card {
                padding: 1rem;
            }
            .features-grid {
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
        <div class="nav-user">
            <div class="user-greeting">
                <span>👋</span>
                <span>Bonjour, {{ Auth::user()->name ?? 'Utilisateur' }}</span>
            </div>
            <a href="{{ route('profile.edit') }}" class="profile-link">
                ✏️ Modifier mon profil
            </a>
            <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                @csrf
                <button type="submit" class="logout-btn">
                    🚪 Se déconnecter
                </button>
            </form>
        </div>
    </div>
</nav>

<main class="main-container">
    <!-- En-tête -->
    <div class="page-header">
        <h1>
            <span>👤</span> Mon espace Patte Douce
        </h1>
        <p>Gérez vos annonces, suivez vos demandes d'adoption et aidez les animaux près de chez vous.</p>
    </div>

    <!-- Grille des fonctionnalités principales -->
    <div class="features-grid">
        <!-- Voir les animaux à adopter -->
        <a href="{{ route('animals.index') }}" class="feature-card">
            <div class="feature-icon">🐕🐈</div>
            <h2>🐾 Voir les animaux</h2>
            <p>Consultez tous les animaux disponibles à l'adoption près de chez vous. Filtrez par espèce, âge, localisation.</p>
            <div class="card-footer">
                Découvrir →
            </div>
        </a>

        <!-- Ajouter une annonce -->
        <a href="{{ route('animals.create') }}" class="feature-card">
            <div class="feature-icon">➕📝</div>
            <h2>➕ Ajouter une annonce</h2>
            <p>Vous souhaitez faire adopter un animal ? Publiez une annonce en quelques clics et trouvez-lui une famille aimante.</p>
            <div class="card-footer">
                Publier une annonce →
            </div>
        </a>

        <!-- Animal perdu / trouvé -->
        <a href="{{ route('lost-found.index') }}" class="feature-card">
            <div class="feature-icon">🔎🐾</div>
            <h2>🔎 Animal perdu/trouvé</h2>
            <p>Signalez un animal perdu ou trouvé. Ensemble, aidons les familles à retrouver leurs compagnons.</p>
            <div class="card-footer">
                Signaler ou rechercher →
            </div>
        </a>

        <!-- Vétérinaires partenaires -->
        <a href="{{ route('veterinaires.index') }}" class="feature-card">
            <div class="feature-icon">🏥🩺</div>
            <h2>🏥 Vétérinaires à proximité</h2>
            <p>Trouvez des professionnels de confiance pour la santé de votre animal : cliniques, urgences, conseils.</p>
            <div class="card-footer">
                Explorer →
            </div>
        </a>

        <!-- Mes animaux -->
        <a href="{{ route('animals.my') }}" class="feature-card">
            <div class="feature-icon">🐶</div>
            <h2>Mes animaux</h2>
            <p>Gérez les animaux que vous avez publiés.</p>
            <div class="card-footer">
                Voir mes animaux →
            </div>
        </a>

        <!-- Mes annonces Lost & Found -->
        <a href="{{ route('lostfound.my') }}" class="feature-card">
            <div class="feature-icon">🔎</div>
            <h2>Mes annonces</h2>
            <p>Gérez vos annonces perdues/trouvées.</p>
            <div class="card-footer">
                Voir mes annonces →
            </div>
        </a>
    </div>

    <!-- Section activité récente -->
    <div class="recent-section">
        <h3>
            <span>📋</span> Dernières activités
        </h3>
        <div class="activity-list">
            @if(isset($recentActivities) && count($recentActivities) > 0)
                @foreach($recentActivities as $activity)
                <div class="activity-item">
                    <div class="activity-dot"></div>
                    <div class="activity-text">{{ $activity->description }}</div>
                    <div class="activity-date">{{ $activity->created_at->diffForHumans() }}</div>
                </div>
                @endforeach
            @else
                <div class="activity-item">
                    <div class="activity-dot"></div>
                    <div class="activity-text">Bienvenue sur Patte Douce ! Commencez par parcourir les animaux à adopter 🐶</div>
                    <div class="activity-date">À l'instant</div>
                </div>
                <div class="activity-item">
                    <div class="activity-dot"></div>
                    <div class="activity-text">Pensez à compléter votre profil pour recevoir des recommandations personnalisées</div>
                    <div class="activity-date">Suggestions</div>
                </div>
            @endif
        </div>
    </div>

    <!-- Petit conseil bienveillant -->
    <div class="advice-box">
        <p>💡 « Adopter un animal, c'est s'engager pour la vie. Merci de faire partie de notre communauté bienveillante. »</p>
    </div>
</main>

<footer class="footer">
    <p>🐾 Patte Douce — Plateforme d'adoption responsable | ensemble pour leur bien-être</p>
    <p style="margin-top: 6px;">📧 contact@pattedouce.adoption | 📞 01 23 45 67 89</p>
</footer>

</body>
</html>