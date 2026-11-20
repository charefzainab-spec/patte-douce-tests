<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>Modifier un animal · Patte Douce</title>
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
            margin-bottom: 1.5rem;
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

        .form-header h3 {
            font-size: 1.6rem;
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
            padding: 0.85rem 1rem 0.85rem 2.6rem;
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

        textarea.form-control {
            border-radius: 1.2rem;
            resize: vertical;
            min-height: 100px;
            padding: 0.85rem 1rem 0.85rem 2.6rem;
        }

        /* Image actuelle */
        .current-image {
            text-align: center;
            margin-bottom: 1.2rem;
            padding: 0.8rem;
            background: #fefcf9;
            border-radius: 1rem;
            border: 1px solid #f0e0d0;
        }

        .current-image p {
            font-size: 0.8rem;
            color: #9b7c64;
            margin-bottom: 0.5rem;
        }

        .current-image img {
            border-radius: 12px;
            border: 2px solid #f0e0d0;
            transition: transform 0.2s;
        }

        .current-image img:hover {
            transform: scale(1.02);
        }

        /* File input stylisé */
        .file-input-wrapper {
            position: relative;
            width: 100%;
        }

        .file-input-wrapper input[type="file"] {
            position: absolute;
            opacity: 0;
            width: 100%;
            height: 100%;
            cursor: pointer;
        }

        .file-input-label {
            display: flex;
            align-items: center;
            gap: 0.8rem;
            padding: 0.85rem 1rem;
            border: 1.5px dashed #f0e0d0;
            border-radius: 60px;
            background: #fefcf9;
            cursor: pointer;
            transition: all 0.2s;
            color: #9b7c64;
        }

        .file-input-label:hover {
            border-color: #c17b4c;
            background: #fffaf5;
        }

        .file-input-label span:first-child {
            font-size: 1.2rem;
        }

        .file-name {
            font-size: 0.75rem;
            color: #c17b4c;
            margin-top: 0.3rem;
            margin-left: 1rem;
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

        /* Responsive */
        @media (max-width: 560px) {
            .form-card {
                padding: 1.5rem;
            }
            .nav-container {
                flex-direction: column;
                text-align: center;
            }
            .form-header h3 {
                font-size: 1.4rem;
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
            <a href="{{ route('animals.index') }}" class="back-link">← Retour à la liste</a>
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
            <div class="icon">✏️🐾</div>
            <h3>Modifier l'animal</h3>
            <p>Modifiez les informations de {{ $animal->titre }}</p>
        </div>

        <form method="POST"
              action="{{ route('animals.update', $animal->id) }}"
              enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <!-- Titre -->
            <div class="form-group">
                <div class="input-wrapper">
                    <span class="input-icon">🏷️</span>
                    <input type="text"
                           name="titre"
                           class="form-control"
                           value="{{ old('titre', $animal->titre) }}"
                           placeholder="Titre / Nom de l'animal">
                </div>
                @error('titre')
                    <div class="input-error">{{ $message }}</div>
                @enderror
            </div>

            <!-- Race -->
            <div class="form-group">
                <div class="input-wrapper">
                    <span class="input-icon">🐕</span>
                    <input type="text"
                           name="race"
                           class="form-control"
                           value="{{ old('race', $animal->race) }}"
                           placeholder="Race">
                </div>
                @error('race')
                    <div class="input-error">{{ $message }}</div>
                @enderror
            </div>

            <!-- Age -->
            <div class="form-group">
                <div class="input-wrapper">
                    <span class="input-icon">🎂</span>
                    <input type="number"
                           name="age"
                           class="form-control"
                           value="{{ old('age', $animal->age) }}"
                           placeholder="Âge (en années)"
                           step="0.5">
                </div>
                @error('age')
                    <div class="input-error">{{ $message }}</div>
                @enderror
            </div>

            <!-- Téléphone -->
            <div class="form-group">
                <div class="input-wrapper">
                    <span class="input-icon">📞</span>
                    <input type="text"
                           name="tel"
                           class="form-control"
                           value="{{ old('tel', $animal->tel) }}"
                           placeholder="Téléphone de contact">
                </div>
                @error('tel')
                    <div class="input-error">{{ $message }}</div>
                @enderror
            </div>

            <!-- Description -->
            <div class="form-group">
                <div class="input-wrapper">
                    <span class="input-icon" style="top: 18px;">📝</span>
                    <textarea name="description"
                              class="form-control"
                              rows="3"
                              placeholder="Description de l'animal (caractère, besoins, histoire...)">{{ old('description', $animal->description) }}</textarea>
                </div>
                @error('description')
                    <div class="input-error">{{ $message }}</div>
                @enderror
            </div>

            <!-- Image actuelle -->
            <div class="current-image">
                <p>📸 Image actuelle</p>
                <img src="{{ asset('uploads/'.$animal->photo) }}"
                     width="100"
                     style="border-radius: 10px;">
            </div>

            <!-- Nouvelle photo -->
            <div class="form-group">
                <div class="file-input-wrapper">
                    <div class="file-input-label">
                        <span>🖼️</span>
                        <span id="fileLabelText">Changer la photo</span>
                    </div>
                    <input type="file" name="photo" id="photoInput" accept="image/*" aria-label="Photo de l'animal">
                </div>
                <div id="fileName" class="file-name"></div>
                @error('photo')
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
    <p>🐾 Patte Douce — Administration | Modification d'un animal</p>
</footer>

<!-- Script pour afficher le nom du fichier sélectionné -->
<script>
    const photoInput = document.getElementById('photoInput');
    const fileNameSpan = document.getElementById('fileName');
    const fileLabelText = document.getElementById('fileLabelText');

    if (photoInput) {
        photoInput.addEventListener('change', function(e) {
            if (this.files && this.files[0]) {
                const fileName = this.files[0].name;
                fileNameSpan.textContent = `📸 Nouvelle photo : ${fileName}`;
                fileLabelText.textContent = 'Photo sélectionnée';
            } else {
                fileNameSpan.textContent = '';
                fileLabelText.textContent = 'Changer la photo';
            }
        });
    }
</script>

</body>
</html>