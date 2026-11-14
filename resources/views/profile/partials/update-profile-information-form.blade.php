<section class="profile-info-section">
    <style>
        /* ========== STYLES PROFILE INFORMATION ========== */
        .profile-info-section {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            border-radius: 1.5rem;
            padding: 1.8rem;
            border: 1px solid #ffefdf;
            box-shadow: 0 6px 14px rgba(0, 0, 0, 0.03);
        }

        .profile-info-section:hover {
            box-shadow: 0 20px 28px -12px rgba(153, 94, 49, 0.08);
        }

        /* En-tête */
        .profile-header {
            margin-bottom: 1.8rem;
            text-align: center;
        }

        .profile-header h2 {
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

        .profile-header p {
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

        /* Messages d'erreur */
        .input-error {
            color: #e0774b;
            font-size: 0.7rem;
            margin-top: 0.3rem;
            margin-left: 0.8rem;
        }

        /* Message email non vérifié */
        .unverified-box {
            margin-top: 0.8rem;
            padding: 0.8rem 1rem;
            background: #fef2e6;
            border-radius: 1rem;
            border-left: 3px solid #e7a16a;
        }

        .unverified-text {
            color: #a56839;
            font-size: 0.8rem;
            margin: 0;
        }

        .resend-link {
            background: none;
            border: none;
            color: #c17b4c;
            font-weight: 600;
            cursor: pointer;
            text-decoration: underline;
            font-family: inherit;
            font-size: 0.8rem;
            padding: 0;
            margin-top: 0.3rem;
        }

        .resend-link:hover {
            color: #a86434;
        }

        .success-message {
            margin-top: 0.5rem;
            background: #eef5ea;
            border: 1px solid #7caf5a;
            color: #5e8a42;
            padding: 0.5rem 1rem;
            border-radius: 60px;
            font-size: 0.75rem;
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
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
        .saved-message {
            background: #eef5ea;
            border: 1px solid #7caf5a;
            color: #5e8a42;
            padding: 0.5rem 1rem;
            border-radius: 60px;
            font-size: 0.85rem;
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            animation: fadeOut 2s ease-in-out forwards;
        }

        @keyframes fadeOut {
            0% { opacity: 1; }
            70% { opacity: 1; }
            100% { opacity: 0; display: none; }
        }

        /* Responsive */
        @media (max-width: 640px) {
            .profile-info-section {
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
            .saved-message {
                text-align: center;
                justify-content: center;
            }
        }
    </style>

    <div class="profile-header">
        <h2>
            <span>👤</span> Informations du profil
        </h2>
        <p>Mettez à jour les informations de votre compte et votre adresse email</p>
    </div>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}">
        @csrf
        @method('patch')

        <!-- Nom -->
        <div class="form-group">
            <label for="name">👤 Nom complet</label>
            <div class="input-wrapper">
                <span class="input-icon">👤</span>
                <input id="name" 
                       name="name" 
                       type="text" 
                       class="form-control" 
                       value="{{ old('name', $user->name) }}" 
                       placeholder="Votre nom complet"
                       required autofocus autocomplete="name">
            </div>
            @error('name')
                <div class="input-error">{{ $message }}</div>
            @enderror
        </div>

        <!-- Email -->
        <div class="form-group">
            <label for="email">📧 Adresse email</label>
            <div class="input-wrapper">
                <span class="input-icon">📧</span>
                <input id="email" 
                       name="email" 
                       type="email" 
                       class="form-control" 
                       value="{{ old('email', $user->email) }}" 
                       placeholder="votre@email.com"
                       required autocomplete="username">
            </div>
            @error('email')
                <div class="input-error">{{ $message }}</div>
            @enderror

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="unverified-box">
                    <p class="unverified-text">
                        ⚠️ Votre adresse email n'est pas vérifiée.
                    </p>
                    <button form="send-verification" class="resend-link">
                        📧 Renvoyer le lien de vérification
                    </button>

                    @if (session('status') === 'verification-link-sent')
                        <div class="success-message" style="margin-top: 0.5rem;">
                            ✅ Un nouveau lien de vérification a été envoyé à votre adresse email.
                        </div>
                    @endif
                </div>
            @endif
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-save">
                💾 Enregistrer
            </button>

            @if (session('status') === 'profile-updated')
                <div class="saved-message">
                    ✅ Profil mis à jour !
                </div>
            @endif
        </div>
    </form>
</section>