<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>Patte Douce - Adoption d'animaux</title>
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
            line-height: 1.5;
            min-height: 100vh;
        }

        /* Navigation élégante */
        .navbar {
            max-width: 1280px;
            margin: 0 auto;
            padding: 1.5rem 2rem;
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
            font-size: 1.7rem;
            font-weight: 700;
            color: #c17b4c;
            letter-spacing: -0.3px;
        }

        .logo span {
            background: #f7e5cf;
            padding: 0.4rem 0.9rem;
            border-radius: 40px;
            font-size: 1.8rem;
        }

        .nav-links {
            display: flex;
            gap: 1.2rem;
            background: rgba(255, 248, 240, 0.8);
            backdrop-filter: blur(4px);
            padding: 0.5rem 1rem;
            border-radius: 60px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.02);
        }

        .nav-links a {
            text-decoration: none;
            font-weight: 600;
            padding: 0.6rem 1.4rem;
            border-radius: 40px;
            transition: all 0.25s ease;
            font-size: 1rem;
        }

        .nav-links a:first-child {
            background: #ffffffdd;
            color: #b45f2e;
            border: 1px solid #ffe2c6;
        }

        .nav-links a:first-child:hover {
            background: #ffffff;
            border-color: #c17b4c;
            transform: scale(1.02);
            box-shadow: 0 6px 14px rgba(193, 123, 76, 0.15);
        }

        .nav-links a:last-child {
            background: #c17b4c;
            color: white;
            border: none;
            box-shadow: 0 4px 10px rgba(193, 123, 76, 0.3);
        }

        .nav-links a:last-child:hover {
            background: #a86434;
            transform: translateY(-2px);
            box-shadow: 0 8px 18px rgba(168, 100, 52, 0.25);
        }

        /* section héroïque avec illustration douce */
        .hero {
            max-width: 1200px;
            margin: 1rem auto 2rem;
            padding: 2rem 2rem 3rem;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            gap: 2rem;
        }

        .hero-text {
            flex: 1.2;
            min-width: 260px;
        }

        .hero-text h1 {
            font-size: 3.2rem;
            font-weight: 800;
            background: linear-gradient(135deg, #c17b4c, #e7a16a, #8f5e3c);
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;
            margin-bottom: 1.2rem;
            line-height: 1.2;
            letter-spacing: -0.5px;
        }

        .hero-text p {
            font-size: 1.2rem;
            color: #5a4a3a;
            margin-bottom: 2rem;
            max-width: 500px;
        }

        .hero-buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .btn-primary {
            background: #c17b4c;
            color: white;
            padding: 0.9rem 2rem;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            transition: 0.2s;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            box-shadow: 0 5px 12px rgba(193, 123, 76, 0.3);
        }

        .btn-primary:hover {
            background: #a86434;
            transform: scale(1.02);
            box-shadow: 0 8px 18px rgba(168, 100, 52, 0.3);
        }

        .btn-outline {
            background: transparent;
            border: 2px solid #c17b4c;
            color: #c17b4c;
            padding: 0.85rem 2rem;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            transition: 0.2s;
        }

        .btn-outline:hover {
            background: #fff2e6;
            border-color: #a86434;
            color: #a86434;
        }

        .hero-image {
            flex: 1;
            min-width: 260px;
            text-align: center;
        }

        .hero-image svg {
            max-width: 100%;
            height: auto;
            filter: drop-shadow(0 12px 18px rgba(0,0,0,0.05));
        }

        /* section des valeurs / cartes */
        .features {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 2rem;
        }

        .features h2 {
            text-align: center;
            font-size: 2.2rem;
            color: #4a6b3c;
            margin-bottom: 2rem;
            font-weight: 600;
        }

        .cards {
            display: flex;
            flex-wrap: wrap;
            gap: 2rem;
            justify-content: center;
        }

        .card {
            background: #ffffffdd;
            backdrop-filter: blur(2px);
            flex: 1;
            min-width: 220px;
            background: white;
            border-radius: 2rem;
            padding: 1.8rem 1.2rem;
            text-align: center;
            transition: all 0.3s;
            border: 1px solid #ffefdf;
            box-shadow: 0 12px 22px -12px rgba(0, 0, 0, 0.05);
        }

        .card:hover {
            transform: translateY(-6px);
            border-color: #e6cdb3;
            box-shadow: 0 20px 28px -12px rgba(153, 94, 49, 0.15);
        }

        .card-icon {
            font-size: 2.8rem;
            margin-bottom: 1rem;
        }

        .card h3 {
            font-size: 1.5rem;
            margin-bottom: 0.8rem;
            color: #c17b4c;
        }

        .card p {
            color: #6b5a48;
        }

        /* galerie miniature d'animaux (ambiance) */
        .gallery-preview {
            max-width: 1200px;
            margin: 3rem auto 2rem;
            padding: 1rem 2rem;
        }

        .gallery-preview h2 {
            text-align: center;
            font-size: 2rem;
            color: #4a6b3c;
            margin-bottom: 1.5rem;
        }

        .animal-showcase {
            display: flex;
            flex-wrap: wrap;
            gap: 1.5rem;
            justify-content: center;
        }

        .animal-card {
            background: white;
            border-radius: 28px;
            width: 200px;
            padding: 1rem 0.8rem 1.2rem;
            text-align: center;
            box-shadow: 0 10px 15px -5px rgba(0, 0, 0, 0.05);
            transition: 0.2s ease;
            border: 1px solid #fbeadb;
        }

        .animal-card:hover {
            transform: scale(1.02);
            border-color: #f0cfb0;
        }

        .animal-avatar {
            background: #fef2e6;
            border-radius: 100px;
            width: 90px;
            height: 90px;
            margin: 0 auto 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3.4rem;
        }

        .animal-name {
            font-weight: 700;
            color: #2d3e2b;
            font-size: 1.2rem;
        }

        .animal-desc {
            font-size: 0.8rem;
            color: #9b7c62;
            margin: 6px 0;
        }

        .badge {
            background: #e7d9ce;
            padding: 4px 12px;
            border-radius: 30px;
            font-size: 0.7rem;
            font-weight: 600;
            color: #845d3e;
            display: inline-block;
        }

        /* section adoption call */
        .cta {
            background: #fffaef;
            margin: 3rem 2rem;
            border-radius: 50px;
            padding: 2rem 2rem;
            text-align: center;
            border: 1px solid #efe2d2;
            box-shadow: 0 6px 14px rgba(0,0,0,0.02);
        }

        .cta h3 {
            font-size: 1.8rem;
            color: #a26438;
            margin-bottom: 0.5rem;
        }

        .cta p {
            margin-bottom: 1.6rem;
            color: #5e4d3a;
            font-size: 1rem;
        }

        .footer {
            background: #eddccd60;
            text-align: center;
            padding: 2rem;
            margin-top: 2rem;
            font-size: 0.85rem;
            color: #9b7c64;
            border-top: 1px solid #f0e0d0;
        }

        @media (max-width: 720px) {
            .navbar {
                flex-direction: column;
                text-align: center;
            }
            .hero-text h1 {
                font-size: 2.4rem;
            }
            .hero {
                text-align: center;
                justify-content: center;
            }
            .hero-buttons {
                justify-content: center;
            }
        }
    </style>
</head>
<body>

<nav class="navbar">
    <div class="logo">
        <span>🐾</span> 
        <span style="color:#b45f2e;">Patte Douce</span>
    </div>
    <div class="nav-links">
        <a href="/login">🔐 Connexion</a>
        <a href="/register">✨ Créer un compte</a>
    </div>
</nav>

<main>
    <div class="hero">
        <div class="hero-text">
            <h1>Une famille, <br>un compagnon ❤️</h1>
            <p>Des milliers d'animaux attendent une seconde chance. Adoptez celui qui fera battre votre cœur et rejoignez une communauté bienveillante.</p>
            <div class="hero-buttons">
                <a href="/register" class="btn-primary">📋 Commencer l'aventure</a>
                <a href="/adopt" class="btn-outline">🐕 Voir nos pensionnaires</a>
            </div>
        </div>
        <div class="hero-image">
            <!-- SVG Illustration chaleureuse -->   
            <svg viewBox="0 0 380 280" xmlns="http://www.w3.org/2000/svg" style="max-width:100%">
                <path d="M70,160 C60,120 90,80 130,80 C170,80 190,110 200,130 C210,110 240,80 280,80 C320,80 340,120 320,160 C300,200 260,210 200,200 C140,210 90,200 70,160Z" fill="#FADEB8" opacity="0.9"/>
                <circle cx="140" cy="130" r="17" fill="#FEF9E6" stroke="#D9A066" stroke-width="2"/>
                <circle cx="270" cy="130" r="17" fill="#FEF9E6" stroke="#D9A066" stroke-width="2"/>
                <circle cx="137" cy="127" r="4" fill="#4A2E1E"/>
                <circle cx="267" cy="127" r="4" fill="#4A2E1E"/>
                <path d="M185,155 Q200,175 215,155" stroke="#B97F50" stroke-width="3" fill="none" stroke-linecap="round"/>
                <ellipse cx="200" cy="190" rx="30" ry="15" fill="#E7B188"/>
                <path d="M100 90 L115 70 M300 90 L285 70" stroke="#C28B5B" stroke-width="3" stroke-linecap="round"/>
                <text x="155" y="240" font-size="10" fill="#A56839">🐱 🐶 🐰</text>
            </svg>
        </div>
    </div>

    <div class="features">
        <h2>Pourquoi adopter avec nous ?</h2>
        <div class="cards">
            <div class="card">
                <div class="card-icon">🏡</div>
                <h3>Famille & suivi</h3>
                <p>Accompagnement avant et après l'adoption, conseils personnalisés.</p>
            </div>
            <div class="card">
                <div class="card-icon">❤️</div>
                <h3>Santé & soins</h3>
                <p>Tous nos animaux sont vaccinés, identifiés et stérilisés.</p>
            </div>
            <div class="card">
                <div class="card-icon">🤝</div>
                <h3>Engagement éthique</h3>
                <p>Refuge partenaire, zéro achat, 100% adoption responsable.</p>
            </div>
        </div>
    </div>

    <div class="gallery-preview">
        <h2>Ils cherchent une famille 🐕🐈</h2>
        <div class="animal-showcase">
            <div class="animal-card">
                <div class="animal-avatar">🐕‍🦺</div>
                <div class="animal-name">Lucky</div>
                <div class="animal-desc">Golden x • 2 ans</div>
                <span class="badge">Joueur</span>
            </div>
            <div class="animal-card">
                <div class="animal-avatar">🐈⬛</div>
                <div class="animal-name">Noisette</div>
                <div class="animal-desc">Chatte tigrée • 1 an</div>
                <span class="badge">Câline</span>
            </div>
            <div class="animal-card">
                <div class="animal-avatar">🐇</div>
                <div class="animal-name">Caramel</div>
                <div class="animal-desc">Lapin nain • 8 mois</div>
                <span class="badge">Douceur</span>
            </div>
            <div class="animal-card">
                <div class="animal-avatar">🐩</div>
                <div class="animal-name">Milo</div>
                <div class="animal-desc">Caniche • 3 ans</div>
                <span class="badge">Sage</span>
            </div>
        </div>
    </div>

    <div class="cta">
        <h3>✨ Prêt(e) à donner une deuxième chance ?</h3>
        <p>Rejoins notre communauté d'amoureux des animaux et trouve ton compagnon idéal.</p>
        <a href="/register" class="btn-primary" style="background:#a56839; box-shadow:0 4px 12px #b77a4b;">💌 Créer mon compte</a>
        <a href="/login" style="margin-left:12px; text-decoration: none; color:#b45f2e; font-weight:500;"> J'ai déjà un compte →</a>
    </div>
</main>

<footer class="footer">
    <p>🐾 Patte Douce — Plateforme d'adoption animale | ensemble pour leur bien-être</p>
    <p style="margin-top:6px;">📞 Contact refuge : 01 23 45 67 89 | ✉️ bonjour@pattedouce.adoption</p>
    <p style="margin-top: 10px; font-size:0.7rem;">© 2025 — Adopter, c'est aimer pour la vie.</p>
</footer>

</body>
</html>