<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>Ajouter un animal · Patte Douce</title>
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
            width: 550px;
            max-width: 100%;
            padding: 2rem;
            border: 1px solid #ffefdf;
            transition: transform 0.2s;
        }

        .form-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 25px 40px -12px rgba(193, 123, 76, 0.15);
        }

        /* Titre */
        .form-title {
            text-align: center;
            margin-bottom: 1.8rem;
            font-size: 1.8rem;
            font-weight: 700;
            background: linear-gradient(135deg, #c17b4c, #e7a16a);
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        /* Formulaire groupes */
        .mb-3 {
            margin-bottom: 1.3rem;
        }

        .mb-3 label {
            display: block;
            font-weight: 600;
            color: #5a4a3a;
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
        }

        .form-control {
            width: 100%;
            padding: 0.85rem 1rem;
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

        textarea.form-control {
            border-radius: 1.2rem;
            resize: vertical;
            min-height: 100px;
        }

        input[type="file"].form-control {
            padding: 0.7rem 1rem;
            cursor: pointer;
        }

        input[type="file"].form-control::-webkit-file-upload-button {
            background: #fef2e6;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 40px;
            color: #c17b4c;
            font-weight: 600;
            cursor: pointer;
            margin-right: 1rem;
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
            padding: 1.8rem;
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
            .form-title {
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
            <span style="color:#b45f2e;">Patte Douce</span>
        </a>
        <div class="nav-links">
            <a href="{{ route('user.dashboard') }}">👤 Mon espace</a>
            <a href="{{ route('animals.index') }}">🐕 Nos animaux</a>
        </div>
    </div>
</nav>

<div class="main-container">
    <div class="form-card">
        <h3 class="form-title">🐾 Ajouter un Animal</h3>

        <form method="POST" action="{{ route('animals.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label>🐶 Titre</label>
                <input type="text" name="titre" class="form-control" placeholder="Nom de l'animal" value="{{ old('titre') }}">
                @error('titre')
                    <div class="input-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label>🐕 Race</label>
                <input type="text" name="race" class="form-control" placeholder="Race" value="{{ old('race') }}">
                @error('race')
                    <div class="input-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label>🎂 Âge</label>
                <input type="number" name="age" class="form-control" placeholder="Age" value="{{ old('age') }}">
                @error('age')
                    <div class="input-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label>📝 Description</label>
                <textarea name="description" class="form-control" rows="3" placeholder="Description de l'animal">{{ old('description') }}</textarea>
                @error('description')
                    <div class="input-error">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label>📞 Téléphone</label>
                <input type="text" name="telephone" class="form-control" placeholder="Numéro de téléphone" value="{{ old('tel') }}">
                @error('telephone')
                    <div class="input-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label>📷 Photo</label>
                <input type="file" name="photo" class="form-control">
                @error('photo')
                    <div class="input-error">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn-submit">
                ➕ Ajouter Animal
            </button>

        </form>
    </div>
</div>

<footer class="footer">
    <p>🐾 Patte Douce — Adopter, c'est offrir une famille pour la vie</p>
    <p style="margin-top: 6px;">📍 Refuge partenaire | 📞 01 23 45 67 89 | ✉️ adoption@pattedouce.fr</p>
</footer>

</body>
</html>