<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>Connexion · Patte Douce</title>
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
            display: flex;
            flex-direction: column;
        }

        /* Navigation */
        .navbar {
            max-width: 1280px;
            margin: 0 auto;
            padding: 1.5rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
            width: 100%;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 0.6rem;
            font-size: 1.7rem;
            font-weight: 700;
            color: #c17b4c;
            letter-spacing: -0.3px;
            text-decoration: none;
        }

        .logo span {
            background: #f7e5cf;
            padding: 0.4rem 0.9rem;
            border-radius: 40px;
            font-size: 1.8rem;
        }

        .back-link {
            text-decoration: none;
            color: #9b7c64;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 0.4rem;
            transition: color 0.2s;
            background: rgba(255, 248, 240, 0.8);
            padding: 0.5rem 1.2rem;
            border-radius: 40px;
        }

        .back-link:hover {
            color: #c17b4c;
            background: #fff3e8;
        }

        /* Container principal */
        .login-container {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 1.5rem;
        }

        .login-card {
            background: white;
            border-radius: 2rem;
            box-shadow: 0 20px 35px -12px rgba(0, 0, 0, 0.08), 0 1px 3px rgba(0, 0, 0, 0.02);
            max-width: 500px;
            width: 100%;
            padding: 2.2rem 2rem 2.5rem;
            border: 1px solid #ffefdf;
            transition: transform 0.2s;
        }

        .login-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .login-header .avatar-icon {
            background: #fef2e6;
            width: 70px;
            height: 70px;
            border-radius: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            font-size: 2.8rem;
        }

        .login-header h2 {
            font-size: 1.8rem;
            font-weight: 700;
            background: linear-gradient(135deg, #c17b4c, #e7a16a);
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;
            margin-bottom: 0.4rem;
        }

        .login-header p {
            color: #9b7c64;
            font-size: 0.9rem;
        }

        /* Formulaire */
        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            font-weight: 600;
            color: #5a4a3a;
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
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

        /* Checkbox remember */
        .remember-wrapper {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 0.8rem;
            margin: 1.2rem 0 1.5rem;
        }

        .checkbox-label {
            display: flex;
            align-items: center;
            gap: 0.6rem;
            cursor: pointer;
            color: #6b5a48;
            font-size: 0.9rem;
        }

        .checkbox-label input {
            width: 1.1rem;
            height: 1.1rem;
            accent-color: #c17b4c;
            border-radius: 4px;
            cursor: pointer;
        }

        .forgot-link {
            color: #c17b4c;
            text-decoration: none;
            font-size: 0.85rem;
            font-weight: 500;
            transition: color 0.2s;
        }

        .forgot-link:hover {
            color: #a86434;
            text-decoration: underline;
        }

        /* Bouton */
        .btn-login {
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
        }

        .btn-login:hover {
            background: #a86434;
            transform: translateY(-2px);
            box-shadow: 0 8px 18px rgba(168, 100, 52, 0.25);
        }

        /* Messages d'erreur / session */
        .session-status {
            background: #eef5ea;
            color: #4a6b3c;
            padding: 0.8rem 1rem;
            border-radius: 60px;
            margin-bottom: 1.5rem;
            text-align: center;
            font-size: 0.85rem;
            border-left: 4px solid #7caf5a;
        }

        .input-error {
            color: #e0774b;
            font-size: 0.75rem;
            margin-top: 0.4rem;
            margin-left: 0.8rem;
        }

        hr {
            margin: 1.8rem 0 1.2rem;
            border: none;
            border-top: 1px solid #f0e0d0;
        }

        .register-prompt {
            text-align: center;
            color: #7a6854;
            font-size: 0.9rem;
        }

        .register-prompt a {
            color: #c17b4c;
            font-weight: 600;
            text-decoration: none;
        }

        .register-prompt a:hover {
            text-decoration: underline;
        }

        .footer {
            text-align: center;
            padding: 1.8rem;
            font-size: 0.75rem;
            color: #b3967a;
            border-top: 1px solid #f0e0d0;
            margin-top: 2rem;
        }

        @media (max-width: 560px) {
            .login-card {
                padding: 1.8rem;
            }
            .navbar {
                padding: 1rem 1.2rem;
            }
        }
    </style>
</head>
<body>

<nav class="navbar">
    <a href="/" class="logo" style="text-decoration: none;">
        <span>🐾</span> 
        <span style="color:#b45f2e;">Patte Douce</span>
    </a>
    <a href="/" class="back-link">← Retour à l'accueil</a>
</nav>

<div class="login-container">
    <div class="login-card">
        <!-- Session Status (équivalent de x-auth-session-status) -->
        @if(session('status'))
        <div class="session-status">
            {{ session('status') }}
        </div>
        @endif

        <div class="login-header">
            <div class="avatar-icon">🐕</div>
            <h2>Bon retour !</h2>
            <p>Connectez-vous pour retrouver vos favoris et suivre vos demandes d'adoption</p>
        </div>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email -->
            <div class="form-group">
                <label for="email">📧 Adresse email</label>
                <div class="input-wrapper">
                    <span class="input-icon">✉️</span>
                    <input id="email" 
                           type="email" 
                           name="email" 
                           class="form-control" 
                           value="{{ old('email') }}" 
                           required 
                           autofocus 
                           autocomplete="username"
                           placeholder="votre@email.com">
                </div>
                @error('email')
                    <div class="input-error">{{ $message }}</div>
                @enderror
            </div>

            <!-- Mot de passe -->
            <div class="form-group">
                <label for="password">🔒 Mot de passe</label>
                <div class="input-wrapper">
                    <span class="input-icon">🔐</span>
                    <input id="password" 
                           type="password" 
                           name="password" 
                           class="form-control" 
                           required 
                           autocomplete="current-password"
                           placeholder="••••••••">
                </div>
                @error('password')
                    <div class="input-error">{{ $message }}</div>
                @enderror
            </div>

            <!-- Remember Me & Forgot -->
            <div class="remember-wrapper">
                <label for="remember_me" class="checkbox-label">
                    <input id="remember_me" type="checkbox" name="remember">
                    <span>Se souvenir de moi</span>
                </label>

                @if (Route::has('password.request'))
                    <a class="forgot-link" href="{{ route('password.request') }}">
                        Mot de passe oublié ?
                    </a>
                @endif
            </div>

            <!-- Bouton connexion -->
            <button type="submit" class="btn-login">
                <span>🐾</span> Se connecter
            </button>

            <hr>

            <div class="register-prompt">
                Pas encore de compte ? 
                <a href="{{ route('register') }}">Créer un compte gratuitement</a>
            </div>
        </form>
    </div>
</div>

<footer class="footer">
    <p>🐾 Patte Douce — Adopter, c'est offrir une famille</p>
</footer>

</body>
</html>