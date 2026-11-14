<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>Modifier utilisateur · Patte Douce</title>
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
            max-width: 550px;
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
            font-size: 2.5rem;
        }

        .form-header h2 {
            font-size: 1.8rem;
            font-weight: 700;
            background: linear-gradient(135deg, #c17b4c, #e7a16a);
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;
            margin-bottom: 0.4rem;
        }

        .form-header p {
            color: #9b7c64;
            font-size: 0.9rem;
        }

        /* Champs du formulaire */
        .form-group {
            margin-bottom: 1.3rem;
        }

        .input-wrapper {
            position: relative;
            display: flex;
            align-items: center;
        }

        .input-icon {
            position: absolute;
            left: 1rem;
            font-size: 1.1rem;
            color: #c17b4c;
        }

        .form-control {
            width: 100%;
            padding: 0.85rem 1rem 0.85rem 2.8rem;
            border: 1.5px solid #f0e0d0;
            border-radius: 60px;
            font-size: 1rem;
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

        select.form-control {
            appearance: none;
            background-image: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%23c17b4c' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'><polyline points='6 9 12 15 18 9'></polyline></svg>");
            background-repeat: no-repeat;
            background-position: right 1rem center;
            cursor: pointer;
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
            font-size: 0.75rem;
            margin-top: 0.4rem;
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
            <a href="{{ route('users.index') }}" class="back-link">← Retour à la liste</a>
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
            <div class="icon">✏️👤</div>
            <h2>Modifier l'utilisateur</h2>
            <p>Modifiez les informations du compte utilisateur</p>
        </div>

        <form method="POST" action="{{ route('users.update', $user->id) }}">
            @csrf
            @method('PUT')

            <!-- Nom -->
            <div class="form-group">
                <div class="input-wrapper">
                    <span class="input-icon">👤</span>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                </div>
                @error('name')
                    <div class="input-error">{{ $message }}</div>
                @enderror
            </div>

            <!-- Email -->
            <div class="form-group">
                <div class="input-wrapper">
                    <span class="input-icon">📧</span>
                    <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                </div>
                @error('email')
                    <div class="input-error">{{ $message }}</div>
                @enderror
            </div>

            <!-- Rôle -->
            <div class="form-group">
                <div class="input-wrapper">
                    <span class="input-icon">🎭</span>
                    <select name="role" class="form-control">
                        <option value="user" {{ old('role', $user->role) == 'user' ? 'selected' : '' }}>
                            👤 Utilisateur standard
                        </option>
                        <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>
                            👑 Administrateur
                        </option>
                        
                    </select>
                </div>
                @error('role')
                    <div class="input-error">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn-submit">
                💾 Enregistrer les modifications
            </button>
        </form>
    </div>
</main>

<footer class="footer">
    <p>🐾 Patte Douce — Administration | Gestion des utilisateurs</p>
</footer>

</body>
</html>