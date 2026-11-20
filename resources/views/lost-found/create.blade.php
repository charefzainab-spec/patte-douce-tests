<x-app-layout>
    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
        <title>Ajouter une annonce · Patte Douce</title>
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

            .nav-links .active {
                color: #c17b4c;
                font-weight: 600;
                background: #fef2e6;
            }

            /* ========== MAIN CONTAINER ========== */
            .main-container {
                max-width: 1280px;
                margin: 0 auto;
                padding: 2rem;
            }

            /* En-tête */
            .page-header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                flex-wrap: wrap;
                gap: 1rem;
                margin-bottom: 2rem;
            }

            .page-header h1 {
                font-size: 2rem;
                font-weight: 800;
                background: linear-gradient(135deg, #c17b4c, #e7a16a);
                background-clip: text;
                -webkit-background-clip: text;
                color: transparent;
                display: inline-flex;
                align-items: center;
                gap: 0.6rem;
            }

            .page-header p {
                color: #9b7c64;
                margin-top: 0.3rem;
                font-size: 0.9rem;
            }

            .btn-back {
                background: #9b7c64;
                color: white;
                text-decoration: none;
                padding: 0.8rem 1.5rem;
                border-radius: 60px;
                font-weight: 600;
                display: inline-flex;
                align-items: center;
                gap: 0.6rem;
                transition: all 0.25s;
                box-shadow: 0 4px 10px rgba(155, 124, 100, 0.25);
            }

            .btn-back:hover {
                background: #7d614b;
                transform: translateY(-2px);
                box-shadow: 0 8px 18px rgba(125, 97, 75, 0.25);
            }

            /* Formulaire */
            .form-container {
                background: white;
                border-radius: 1.5rem;
                padding: 2rem;
                border: 1px solid #ffefdf;
                box-shadow: 0 6px 14px rgba(0, 0, 0, 0.03);
            }

            .form-group {
                margin-bottom: 1.5rem;
            }

            .form-label {
                display: block;
                font-weight: 600;
                color: #5a4a3a;
                margin-bottom: 0.5rem;
                font-size: 0.9rem;
            }

            .form-label i {
                margin-right: 0.5rem;
                color: #c17b4c;
            }

            .form-control, .form-select {
                width: 100%;
                padding: 0.8rem 1rem;
                border: 1.5px solid #f0e0d0;
                border-radius: 1rem;
                font-family: inherit;
                color: #5a4a3a;
                transition: all 0.2s;
                background: #fefcf9;
                font-size: 0.95rem;
            }

            .form-control:focus, .form-select:focus {
                outline: none;
                border-color: #c17b4c;
                box-shadow: 0 0 0 3px rgba(193, 123, 76, 0.1);
            }

            textarea.form-control {
                resize: vertical;
                min-height: 120px;
            }

            /* Zone d'upload */
            .upload-area {
                border: 2px dashed #f0e0d0;
                border-radius: 1rem;
                padding: 2rem;
                text-align: center;
                background: #fefcf9;
                transition: all 0.2s;
                cursor: pointer;
            }

            .upload-area:hover {
                border-color: #c17b4c;
                background: #fffaf5;
            }

            .upload-area i {
                font-size: 3rem;
                color: #c17b4c;
                margin-bottom: 0.5rem;
            }

            .upload-text {
                color: #9b7c64;
                font-size: 0.9rem;
            }

            .upload-text strong {
                color: #c17b4c;
            }

            .image-preview {
                margin-top: 1rem;
                text-align: center;
            }

            .image-preview img {
                max-width: 200px;
                max-height: 200px;
                border-radius: 1rem;
                border: 2px solid #f0e0d0;
            }

            /* Alertes */
            .alert-info {
                background: #fef7f0;
                border-left: 4px solid #c17b4c;
                padding: 1rem;
                border-radius: 1rem;
                margin-bottom: 1.5rem;
            }

            .alert-info i {
                color: #c17b4c;
                margin-right: 0.5rem;
            }

            .alert-info strong {
                color: #c17b4c;
                display: block;
                margin-bottom: 0.3rem;
            }

            .alert-info ul {
                margin-left: 1rem;
                color: #9b7c64;
                font-size: 0.85rem;
            }

            /* Boutons */
            .form-actions {
                display: flex;
                gap: 1rem;
                justify-content: flex-end;
                margin-top: 2rem;
            }

            .btn-submit {
                background: #c17b4c;
                color: white;
                border: none;
                padding: 0.8rem 1.8rem;
                border-radius: 60px;
                font-weight: 600;
                cursor: pointer;
                transition: all 0.25s;
                display: inline-flex;
                align-items: center;
                gap: 0.6rem;
                font-size: 0.95rem;
            }

            .btn-submit:hover {
                background: #a86434;
                transform: translateY(-2px);
                box-shadow: 0 8px 18px rgba(168, 100, 52, 0.25);
            }

            .btn-reset {
                background: #fef2e6;
                color: #c17b4c;
                border: none;
                padding: 0.8rem 1.8rem;
                border-radius: 60px;
                font-weight: 600;
                cursor: pointer;
                transition: all 0.2s;
                display: inline-flex;
                align-items: center;
                gap: 0.6rem;
                font-size: 0.95rem;
            }

            .btn-reset:hover {
                background: #f7e5cf;
                transform: translateY(-2px);
            }

            /* Message d'erreur */
            .error-message {
                color: #e0774b;
                font-size: 0.8rem;
                margin-top: 0.3rem;
                display: flex;
                align-items: center;
                gap: 0.3rem;
            }

            /* Footer */
            .footer {
                text-align: center;
                padding: 1.8rem;
                font-size: 0.75rem;
                color: #b3967a;
                border-top: 1px solid #f0e0d0;
                margin-top: 2rem;
            }

            /* Responsive */
            @media (max-width: 768px) {
                .nav-container {
                    flex-direction: column;
                    text-align: center;
                }
                .main-container {
                    padding: 1.5rem;
                }
                .page-header {
                    flex-direction: column;
                    text-align: center;
                }
                .form-container {
                    padding: 1.5rem;
                }
                .form-actions {
                    flex-direction: column;
                }
                .btn-submit, .btn-reset {
                    justify-content: center;
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
            <div class="nav-links">
                <a href="{{ route('user.dashboard') }}">👤 Mon espace</a>
                <a href="{{ route('animals.index') }}">🐕 Nos animaux</a>
                <a href="{{ route('lost-found.index') }}" class="active">🔎 Lost & Found</a>
            </div>
        </div>
    </nav>

    <main class="main-container">
        <!-- En-tête -->
        <div class="page-header">
            <div>
                <h1>
                    <span>➕</span> Ajouter une annonce
                </h1>
                <p>Signalez un animal perdu ou trouvé près de chez vous</p>
            </div>
            <a href="{{ route('lost-found.index') }}" class="btn-back">
                ← Retour aux annonces
            </a>
        </div>

        <!-- Formulaire -->
        <div class="form-container">
            <form method="POST" action="{{ route('lost-found.store') }}" enctype="multipart/form-data">
                @csrf

                <!-- Type -->
                <div class="form-group">
                    <label class="form-label">
                        <i>🏷️</i> Type d'annonce *
                    </label>
                    <select name="type" class="form-select" required>
                        <option value="">Choisir le type</option>
                        <option value="perdu" {{ old('type') == 'perdu' ? 'selected' : '' }}>🐾 Animal perdu</option>
                        <option value="trouvé" {{ old('type') == 'trouvé' ? 'selected' : '' }}>🐕 Animal trouvé</option>
                    </select>
                    @error('type')
                        <div class="error-message">⚠️ {{ $message }}</div>
                    @enderror
                </div>

                <!-- Description -->
                <div class="form-group">
                    <label class="form-label">
                        <i>📝</i> Description *
                    </label>
                    <textarea name="description" 
                              class="form-control" 
                              placeholder="Décrivez l'animal (couleur, taille, signes particuliers, comportement...)"
                              required>{{ old('description') }}</textarea>
                    @error('description')
                        <div class="error-message">⚠️ {{ $message }}</div>
                    @enderror
                </div>

                <!-- Localisation -->
                <div class="form-group">
                    <label class="form-label">
                        <i>📍</i> Localisation *
                    </label>
                    <input type="text" 
                           name="localisation" 
                           class="form-control" 
                           placeholder="Ex: Paris 11ème, Rue de la République"
                           value="{{ old('localisation') }}"
                           required>
                    @error('localisation')
                        <div class="error-message">⚠️ {{ $message }}</div>
                    @enderror
                </div>

                <!-- Contact -->
                <div class="form-group">
                    <label class="form-label">
                        <i>📞</i> Contact *
                    </label>
                    <input type="text" 
                           name="contact" 
                           class="form-control" 
                           placeholder="Email, téléphone ou réseaux sociaux"
                           value="{{ old('contact') }}"
                           required>
                    <small style="color:#b3967a; font-size:0.75rem; margin-top:0.3rem; display:block;">
                        🔒 Visible uniquement par les personnes connectées
                    </small>
                    @error('contact')
                        <div class="error-message">⚠️ {{ $message }}</div>
                    @enderror
                </div>

                <!-- Photo -->
                <div class="form-group">
                    <label class="form-label">
                        <i>📸</i> Photo de l'animal
                    </label>
                    <div class="upload-area" onclick="document.getElementById('photo').click()">
                        <i>☁️</i>
                        <div class="upload-text">
                            <strong>Cliquez ou glissez une photo</strong><br>
                            PNG, JPG, GIF jusqu'à 2MB
                        </div>
                    </div>
                    <input type="file" 
                           name="photo" 
                           id="photo" aria-label="Photo de l'annonce" 
                           class="form-control" 
                           accept="image/*"
                           style="display: none;"
                           onchange="previewImage(event)">
                    <div class="image-preview" id="imagePreview" style="display: none;">
                        <img id="preview" src="#" alt="Aperçu">
                    </div>
                    @error('photo')
                        <div class="error-message">⚠️ {{ $message }}</div>
                    @enderror
                </div>

                <!-- Conseils -->
                <div class="alert-info">
                    <i>💡</i>
                    <strong>Conseils pour une annonce efficace :</strong>
                    <ul>
                        <li>Soyez précis dans la description pour faciliter l'identification</li>
                        <li>Ajoutez une photo claire de l'animal</li>
                        <li>Vérifiez que vos coordonnées sont correctes</li>
                    </ul>
                </div>

                <!-- Boutons -->
                <div class="form-actions">
                    <button type="reset" class="btn-reset">
                        🗑️ Effacer
                    </button>
                    <button type="submit" class="btn-submit">
                        📢 Publier l'annonce
                    </button>
                </div>

            </form>
        </div>
    </main>

    <footer class="footer">
        <p>🐾 Patte Douce — Adopter, c'est offrir une famille pour la vie</p>
        <p style="margin-top: 6px;">📍 Ensemble, aidons les animaux perdus à retrouver leur famille</p>
    </footer>

    <script>
        function previewImage(event) {
            const input = event.target;
            const preview = document.getElementById('imagePreview');
            const previewImg = document.getElementById('preview');
            
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    previewImg.src = e.target.result;
                    preview.style.display = 'block';
                }
                
                reader.readAsDataURL(input.files[0]);
            }
        }

        // Drag & drop
        const uploadArea = document.querySelector('.upload-area');
        const photoInput = document.getElementById('photo');
        
        uploadArea.addEventListener('dragover', (e) => {
            e.preventDefault();
            uploadArea.style.borderColor = '#c17b4c';
            uploadArea.style.background = '#fffaf5';
        });
        
        uploadArea.addEventListener('dragleave', (e) => {
            uploadArea.style.borderColor = '#f0e0d0';
            uploadArea.style.background = '#fefcf9';
        });
        
        uploadArea.addEventListener('drop', (e) => {
            e.preventDefault();
            const file = e.dataTransfer.files[0];
            if (file && file.type.startsWith('image/')) {
                photoInput.files = e.dataTransfer.files;
                const event = new Event('change');
                photoInput.dispatchEvent(event);
            }
            uploadArea.style.borderColor = '#f0e0d0';
            uploadArea.style.background = '#fefcf9';
        });
    </script>

    </body>
    </html>
</x-app-layout>