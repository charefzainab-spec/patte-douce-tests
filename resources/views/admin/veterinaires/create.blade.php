<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>Ajouter un vétérinaire · Patte Douce</title>
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
            min-height: calc(100vh - 180px);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 1.5rem;
        }

        /* Formulaire card */
        .form-card {
            background: white;
            border-radius: 2rem;
            box-shadow: 0 20px 35px -12px rgba(0, 0, 0, 0.08), 0 1px 3px rgba(0, 0, 0, 0.02);
            max-width: 600px;
            width: 100%;
            padding: 2rem;
            border: 1px solid #ffefdf;
            transition: transform 0.2s;
        }

        .form-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 25px 40px -12px rgba(193, 123, 76, 0.15);
        }

        /* En-tête */
        .form-header {
            text-align: center;
            margin-bottom: 1.8rem;
        }

        .form-header .icon {
            background: #fef2e6;
            width: 70px;
            height: 70px;
            border-radius: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            font-size: 2.2rem;
        }

        .form-header h2 {
            font-size: 1.8rem;
            font-weight: 700;
            background: linear-gradient(135deg, #c17b4c, #e7a16a);
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;
            margin-bottom: 0.3rem;
        }

        .form-header p {
            color: #9b7c64;
            font-size: 0.85rem;
        }

        /* Champs du formulaire */
        .form-group {
            margin-bottom: 1.2rem;
        }

        .input-wrapper {
            position: relative;
            display: flex;
            align-items: center;
        }

        .input-icon {
            position: absolute;
            left: 1rem;
            font-size: 1rem;
            color: #c17b4c;
        }

        .form-control {
            width: 100%;
            padding: 0.85rem 1rem 0.85rem 2.8rem;
            border: 1.5px solid #f0e0d0;
            border-radius: 60px;
            font-size: 0.95rem;
            transition: all 0.25s;
            background: #fefcf9;
            font-family: inherit;
        }

        .form-control:focus {
            outline: none;
            border-color: #c17b4c;
            box-shadow: 0 0 0 3px rgba(193, 123, 76, 0.15);
            background: white;
        }

        /* Bouton submit */
        .btn-submit {
            background: #c17b4c;
            color: white;
            border: none;
            width: 100%;
            padding: 0.9rem;
            border-radius: 60px;
            font-weight: 700;
            font-size: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.6rem;
            cursor: pointer;
            transition: all 0.25s;
            box-shadow: 0 4px 10px rgba(193, 123, 76, 0.25);
            font-family: inherit;
            margin-top: 0.5rem;
        }

        .btn-submit:hover {
            background: #a86434;
            transform: translateY(-2px);
            box-shadow: 0 8px 18px rgba(168, 100, 52, 0.25);
        }

        /* Messages d'erreur */
        .input-error {
            color: #e0774b;
            font-size: 0.7rem;
            margin-top: 0.3rem;
            margin-left: 0.8rem;
        }

        /* Footer */
        .footer {
            text-align: center;
            padding: 1.5rem;
            font-size: 0.75rem;
            color: #b3967a;
            border-top: 1px solid #f0e0d0;
            margin-top: 2rem;
        }

        /* Alertes */
        .alert-success {
            background: #eef5ea;
            border: 1px solid #7caf5a;
            color: #5e8a42;
            padding: 0.8rem 1rem;
            border-radius: 60px;
            margin-bottom: 1rem;
            text-align: center;
            font-size: 0.85rem;
        }

        .alert-error {
            background: #fee2e2;
            border: 1px solid #e0774b;
            color: #e0774b;
            padding: 0.8rem 1rem;
            border-radius: 60px;
            margin-bottom: 1rem;
            text-align: center;
            font-size: 0.85rem;
        }

        /* Responsive */
        @media (max-width: 560px) {
            .form-card {
                padding: 1.5rem;
            }
            .nav-container {
                flex-direction: column;
                text-align: center;
            }
            .form-header h2 {
                font-size: 1.5rem;
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
            <a href="{{ route('admin.vets') }}">🏥 Vétérinaires</a>
            <a href="{{ route('admin.vets') }}" class="back-link">← Retour à la liste</a>
            <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                @csrf
                <button type="submit" class="logout-btn">🚪 Déconnexion</button>
            </form>
        </div>
    </div>
</nav>

<main class="main-container">
    <div class="form-card">
        <div class="form-header">
            <div class="icon">🏥➕</div>
            <h2>Ajouter un vétérinaire</h2>
            <p>Ajoutez un nouveau cabinet vétérinaire partenaire</p>
        </div>

        <!-- Messages de session -->
        @if(session('success'))
        <div class="alert-success">
            ✅ {{ session('success') }}
        </div>
        @endif

        @if(session('error'))
        <div class="alert-error">
            ❌ {{ session('error') }}
        </div>
        @endif

        <form method="POST" action="{{ route('admin.vets.store') }}">
            @csrf

            <!-- Nom -->
            <div class="form-group">
                <div class="input-wrapper">
                    <span class="input-icon">🏥</span>
                    <input type="text" 
                           name="nom" 
                           class="form-control" 
                           placeholder="Nom du cabinet / vétérinaire"
                           value="{{ old('nom') }}"
                           required>
                </div>
                @error('nom')
                    <div class="input-error">{{ $message }}</div>
                @enderror
            </div>

            <!-- Email -->
            <div class="form-group">
                <div class="input-wrapper">
                    <span class="input-icon">📧</span>
                    <input type="email" 
                           name="email" 
                           class="form-control" 
                           placeholder="Adresse email"
                           value="{{ old('email') }}"
                           required>
                </div>
                @error('email')
                    <div class="input-error">{{ $message }}</div>
                @enderror
            </div>

            <!-- Téléphone -->
            <div class="form-group">
                <div class="input-wrapper">
                    <span class="input-icon">📞</span>
                    <input type="text" 
                           name="telephone" 
                           class="form-control" 
                           placeholder="Numéro de téléphone"
                           value="{{ old('telephone') }}"
                           required>
                </div>
                @error('telephone')
                    <div class="input-error">{{ $message }}</div>
                @enderror
            </div>

            <!-- Adresse -->
            <div class="form-group">
                <div class="input-wrapper">
                    <span class="input-icon">📍</span>
                    <input type="text" 
                           name="adresse" 
                           class="form-control" 
                           placeholder="Adresse complète"
                           value="{{ old('adresse') }}"
                           required>
                </div>
                @error('adresse')
                    <div class="input-error">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn-submit">
                💾 Ajouter le vétérinaire
            </button>
        </form>
    </div>
</main>

<footer class="footer">
    <p>🐾 Patte Douce — Administration | Gestion des vétérinaires partenaires</p>
</footer>

</body>
</html>