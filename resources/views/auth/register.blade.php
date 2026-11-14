<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>Inscription · Patte Douce</title>
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
        .register-container {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 1.5rem;
        }

        .register-card {
            background: white;
            border-radius: 2rem;
            box-shadow: 0 20px 35px -12px rgba(0, 0, 0, 0.08), 0 1px 3px rgba(0, 0, 0, 0.02);
            max-width: 550px;
            width: 100%;
            padding: 2.2rem 2rem 2.5rem;
            border: 1px solid #ffefdf;
            transition: transform 0.2s;
        }

        .register-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .register-header .avatar-icon {
            background: #fef2e6;
            width: 75px;
            height: 75px;
            border-radius: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            font-size: 3rem;
        }

        .register-header h2 {
            font-size: 1.8rem;
            font-weight: 700;
            background: linear-gradient(135deg, #c17b4c, #e7a16a);
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;
            margin-bottom: 0.4rem;
        }

        .register-header p {
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

        /* Indicateur de force du mot de passe (simple) */
        .password-strength {
            margin-top: 0.5rem;
            font-size: 0.7rem;
            display: flex;
            gap: 0.5rem;
            align-items: center;
            flex-wrap: wrap;
        }

        .strength-bar {
            height: 4px;
            flex: 1;
            background: #f0e0d0;
            border-radius: 4px;
            overflow: hidden;
        }

        .strength-fill {
            height: 100%;
            width: 0%;
            background: #c17b4c;
            border-radius: 4px;
            transition: width 0.2s;
        }

        .strength-text {
            color: #9b7c64;
            font-size: 0.7rem;
        }

        /* Messages d'erreur */
        .input-error {
            color: #e0774b;
            font-size: 0.75rem;
            margin-top: 0.4rem;
            margin-left: 0.8rem;
        }

        /* Bouton */
        .btn-register {
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

        .btn-register:hover {
            background: #a86434;
            transform: translateY(-2px);
            box-shadow: 0 8px 18px rgba(168, 100, 52, 0.25);
        }

        hr {
            margin: 1.8rem 0 1.2rem;
            border: none;
            border-top: 1px solid #f0e0d0;
        }

        .login-prompt {
            text-align: center;
            color: #7a6854;
            font-size: 0.9rem;
        }

        .login-prompt a {
            color: #c17b4c;
            font-weight: 600;
            text-decoration: none;
        }

        .login-prompt a:hover {
            text-decoration: underline;
        }

        /* Terms checkbox */
        .terms-wrapper {
            display: flex;
            align-items: flex-start;
            gap: 0.6rem;
            margin: 1.2rem 0 1rem;
        }

        .terms-wrapper input {
            width: 1.1rem;
            height: 1.1rem;
            accent-color: #c17b4c;
            margin-top: 0.15rem;
            cursor: pointer;
        }

        .terms-wrapper label {
            font-size: 0.8rem;
            color: #6b5a48;
            cursor: pointer;
            line-height: 1.4;
        }

        .terms-wrapper a {
            color: #c17b4c;
            text-decoration: none;
        }

        .terms-wrapper a:hover {
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
            .register-card {
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

<div class="register-container">
    <div class="register-card">
        <div class="register-header">
            <div class="avatar-icon">🐾✨</div>
            <h2>Rejoignez l'aventure</h2>
            <p>Créez votre compte et donnez une famille à un compagnon</p>
        </div>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name (Nom complet) -->
            <div class="form-group">
                <label for="name">👤 Nom complet</label>
                <div class="input-wrapper">
                    <span class="input-icon">🐕</span>
                    <input id="name" 
                           type="text" 
                           name="name" 
                           class="form-control" 
                           value="{{ old('name') }}" 
                           required 
                           autofocus 
                           autocomplete="name"
                           placeholder="Sophie Martin">
                </div>
                @error('name')
                    <div class="input-error">{{ $message }}</div>
                @enderror
            </div>

            <!-- Email Address -->
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
                           autocomplete="username"
                           placeholder="sophie@exemple.com">
                </div>
                @error('email')
                    <div class="input-error">{{ $message }}</div>
                @enderror
            </div>

            <!-- Password -->
            <div class="form-group">
                <label for="password">🔒 Mot de passe</label>
                <div class="input-wrapper">
                    <span class="input-icon">🔐</span>
                    <input id="password" 
                           type="password" 
                           name="password" 
                           class="form-control" 
                           required 
                           autocomplete="new-password"
                           placeholder="••••••••">
                </div>
                <div class="password-strength" id="passwordStrength">
                    <div class="strength-bar">
                        <div class="strength-fill" id="strengthFill"></div>
                    </div>
                    <span class="strength-text" id="strengthText">Minimum 8 caractères</span>
                </div>
                @error('password')
                    <div class="input-error">{{ $message }}</div>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div class="form-group">
                <label for="password_confirmation">✓ Confirmer le mot de passe</label>
                <div class="input-wrapper">
                    <span class="input-icon">✅</span>
                    <input id="password_confirmation" 
                           type="password" 
                           name="password_confirmation" 
                           class="form-control" 
                           required 
                           autocomplete="new-password"
                           placeholder="Confirmez votre mot de passe">
                </div>
                @error('password_confirmation')
                    <div class="input-error">{{ $message }}</div>
                @enderror
            </div>

            <!-- Terms & Conditions -->
            <div class="terms-wrapper">
                <input type="checkbox" id="terms" name="terms" required>
                <label for="terms">
                    J'accepte les <a href="/conditions" target="_blank">conditions générales d'utilisation</a> 
                    et la politique de confidentialité de Patte Douce.
                </label>
            </div>

            <!-- Register Button -->
            <button type="submit" class="btn-register">
                <span>🐾</span> Créer mon compte
            </button>

            <hr>

            <div class="login-prompt">
                Déjà un compte ? 
                <a href="{{ route('login') }}">Se connecter</a>
            </div>
        </form>
    </div>
</div>

<footer class="footer">
    <p>🐾 Patte Douce — Ensemble, donnons une seconde chance aux animaux</p>
    <p style="margin-top: 6px; font-size: 0.7rem;">En créant un compte, vous pourrez sauvegarder vos favoris et suivre vos adoptions.</p>
</footer>

<!-- Petit script pour l'indicateur de force du mot de passe (optionnel mais sympa) -->
<script>
    const passwordInput = document.getElementById('password');
    const strengthFill = document.getElementById('strengthFill');
    const strengthText = document.getElementById('strengthText');

    function checkPasswordStrength(password) {
        let strength = 0;
        if (password.length >= 8) strength++;
        if (password.match(/[a-z]+/)) strength++;
        if (password.match(/[A-Z]+/)) strength++;
        if (password.match(/[0-9]+/)) strength++;
        if (password.match(/[$@#&!]+/)) strength++;
        
        let percentage = (strength / 5) * 100;
        let message = '';
        let color = '#f0e0d0';
        
        if (password.length === 0) {
            percentage = 0;
            message = 'Minimum 8 caractères';
            color = '#f0e0d0';
        } else if (strength <= 2) {
            message = 'Faible';
            color = '#e0774b';
        } else if (strength <= 3) {
            message = 'Moyen';
            color = '#e7a16a';
        } else {
            message = 'Fort';
            color = '#7caf5a';
        }
        
        strengthFill.style.width = percentage + '%';
        strengthFill.style.backgroundColor = color;
        strengthText.textContent = message;
        
        if (password.length >= 8 && strength <= 2) {
            strengthText.textContent = 'Faible - ajoutez chiffres, majuscules ou symboles';
        } else if (password.length >= 8 && strength >= 4) {
            strengthText.textContent = 'Très bon !';
        }
    }

    if (passwordInput) {
        passwordInput.addEventListener('input', function(e) {
            checkPasswordStrength(e.target.value);
        });
    }
</script>

</body>
</html>