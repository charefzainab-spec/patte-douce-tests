<section class="update-password-section">
    <style>
        /* ========== STYLES UPDATE PASSWORD ========== */
        .update-password-section {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            border-radius: 1.5rem;
            padding: 1.8rem;
            border: 1px solid #ffefdf;
            box-shadow: 0 6px 14px rgba(0, 0, 0, 0.03);
        }

        .update-password-section:hover {
            box-shadow: 0 20px 28px -12px rgba(153, 94, 49, 0.08);
        }

        /* En-tête */
        .section-header {
            margin-bottom: 1.5rem;
            text-align: center;
        }

        .section-header h2 {
            font-size: 1.5rem;
            font-weight: 700;
            background: linear-gradient(135deg, #c17b4c, #e7a16a);
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 0.5rem;
        }

        .section-header p {
            color: #9b7c64;
            font-size: 0.85rem;
            margin-top: 0.3rem;
        }

        /* Champs du formulaire */
        .form-group {
            margin-bottom: 1.2rem;
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

        /* Indicateur force mot de passe */
        .password-strength {
            margin-top: 0.5rem;
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
            font-size: 0.7rem;
            color: #9b7c64;
        }

        /* Messages d'erreur */
        .input-error {
            color: #e0774b;
            font-size: 0.7rem;
            margin-top: 0.3rem;
            margin-left: 0.8rem;
        }

        /* Boutons d'action */
        .form-actions {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-top: 1.5rem;
            flex-wrap: wrap;
        }

        .btn-save {
            background: #c17b4c;
            color: white;
            border: none;
            padding: 0.8rem 1.8rem;
            border-radius: 60px;
            font-weight: 600;
            font-size: 0.9rem;
            cursor: pointer;
            transition: all 0.25s;
            box-shadow: 0 4px 10px rgba(193, 123, 76, 0.25);
            font-family: inherit;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-save:hover {
            background: #a86434;
            transform: translateY(-2px);
            box-shadow: 0 8px 18px rgba(168, 100, 52, 0.25);
        }

        /* Message de succès */
        .success-message {
            background: #eef5ea;
            border: 1px solid #7caf5a;
            color: #5e8a42;
            padding: 0.5rem 1rem;
            border-radius: 60px;
            font-size: 0.85rem;
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            animation: fadeOut 3s ease-in-out forwards;
        }

        @keyframes fadeOut {
            0% { opacity: 1; }
            70% { opacity: 1; }
            100% { opacity: 0; display: none; }
        }

        /* Icones toggle password (optionnel) */
        .toggle-password {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            font-size: 1rem;
            color: #9b7c64;
            background: none;
            border: none;
            z-index: 2;
        }

        .toggle-password:hover {
            color: #c17b4c;
        }

        /* Responsive */
        @media (max-width: 640px) {
            .update-password-section {
                padding: 1.2rem;
                margin: 0 1rem;
            }
            .form-actions {
                flex-direction: column;
                align-items: stretch;
            }
            .btn-save {
                justify-content: center;
                width: 100%;
            }
            .success-message {
                text-align: center;
                justify-content: center;
            }
        }
    </style>

    <div class="section-header">
        <h2>
            <span>🔒</span> Modifier le mot de passe
        </h2>
        <p>Utilisez un mot de passe long et sécurisé pour protéger votre compte</p>
    </div>

    <form method="post" action="{{ route('password.update') }}">
        @csrf
        @method('put')

        <!-- Mot de passe actuel -->
        <div class="form-group">
            <label for="update_password_current_password">🔐 Mot de passe actuel</label>
            <div class="input-wrapper">
                <span class="input-icon">🔒</span>
                <input id="update_password_current_password" 
                       name="current_password" 
                       type="password" 
                       class="form-control" 
                       placeholder="Entrez votre mot de passe actuel"
                       autocomplete="current-password">
                <button type="button" class="toggle-password" onclick="togglePassword('update_password_current_password')">
                    👁️
                </button>
            </div>
            @error('current_password', 'updatePassword')
                <div class="input-error">{{ $message }}</div>
            @enderror
        </div>

        <!-- Nouveau mot de passe -->
        <div class="form-group">
            <label for="update_password_password">✨ Nouveau mot de passe</label>
            <div class="input-wrapper">
                <span class="input-icon">🔑</span>
                <input id="update_password_password" 
                       name="password" 
                       type="password" 
                       class="form-control" 
                       placeholder="Nouveau mot de passe"
                       autocomplete="new-password">
                <button type="button" class="toggle-password" onclick="togglePassword('update_password_password')">
                    👁️
                </button>
            </div>
            <div class="password-strength" id="passwordStrength">
                <div class="strength-bar">
                    <div class="strength-fill" id="strengthFill"></div>
                </div>
                <span class="strength-text" id="strengthText">Minimum 8 caractères</span>
            </div>
            @error('password', 'updatePassword')
                <div class="input-error">{{ $message }}</div>
            @enderror
        </div>

        <!-- Confirmation mot de passe -->
        <div class="form-group">
            <label for="update_password_password_confirmation">✓ Confirmer le mot de passe</label>
            <div class="input-wrapper">
                <span class="input-icon">✅</span>
                <input id="update_password_password_confirmation" 
                       name="password_confirmation" 
                       type="password" 
                       class="form-control" 
                       placeholder="Confirmez votre nouveau mot de passe"
                       autocomplete="new-password">
                <button type="button" class="toggle-password" onclick="togglePassword('update_password_password_confirmation')">
                    👁️
                </button>
            </div>
            @error('password_confirmation', 'updatePassword')
                <div class="input-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-save">
                💾 Enregistrer
            </button>

            @if (session('status') === 'password-updated')
                <div class="success-message">
                    ✅ Mot de passe mis à jour !
                </div>
            @endif
        </div>
    </form>
</section>

<script>
    // Toggle password visibility
    function togglePassword(fieldId) {
        const field = document.getElementById(fieldId);
        const type = field.getAttribute('type') === 'password' ? 'text' : 'password';
        field.setAttribute('type', type);
    }

    // Password strength indicator (pour le nouveau mot de passe)
    const passwordInput = document.getElementById('update_password_password');
    if (passwordInput) {
        passwordInput.addEventListener('input', function(e) {
            const password = e.target.value;
            const strengthFill = document.getElementById('strengthFill');
            const strengthText = document.getElementById('strengthText');
            
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
                strengthText.textContent = 'Ajoutez chiffres, majuscules ou symboles';
            } else if (password.length >= 8 && strength >= 4) {
                strengthText.textContent = 'Très bon mot de passe !';
            }
        });
    }
</script>
</section>