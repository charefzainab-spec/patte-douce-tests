<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Patte Douce') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            /* ========== GLOBAL STYLES ========== */
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            body {
                font-family: 'Inter', 'Poppins', 'Segoe UI', system-ui, -apple-system, sans-serif;
                background: linear-gradient(145deg, #fffaf5 0%, #fef5e8 100%);
                color: #2d3e2b;
                min-height: 100vh;
            }

            /* Main container */
            .min-h-screen {
                min-height: 100vh;
                display: flex;
                flex-direction: column;
            }

            /* Page Header */
            .page-header {
                background: white;
                border-bottom: 1px solid #f0e0d0;
                margin-bottom: 1.5rem;
                box-shadow: 0 2px 8px rgba(0, 0, 0, 0.02);
            }

            .page-header-container {
                max-width: 1280px;
                margin: 0 auto;
                padding: 1.5rem 2rem;
            }

            .page-header-container h1, 
            .page-header-container h2 {
                font-size: 1.5rem;
                font-weight: 700;
                background: linear-gradient(135deg, #c17b4c, #e7a16a);
                background-clip: text;
                -webkit-background-clip: text;
                color: transparent;
                display: inline-flex;
                align-items: center;
                gap: 0.5rem;
            }

            /* Main content */
            main {
                flex: 1;
                padding: 0 0 2rem;
            }

            /* Container utility */
            .container {
                max-width: 1280px;
                margin: 0 auto;
                padding: 0 1.5rem;
            }

            @media (max-width: 768px) {
                .container {
                    padding: 0 1rem;
                }
                .page-header-container {
                    padding: 1rem 1.5rem;
                }
            }

            /* Animation pour les messages flash */
            @keyframes slideIn {
                from {
                    transform: translateY(-100%);
                    opacity: 0;
                }
                to {
                    transform: translateY(0);
                    opacity: 1;
                }
            }

            @keyframes fadeOut {
                0% { opacity: 1; }
                70% { opacity: 1; }
                100% { opacity: 0; display: none; }
            }

            /* Scrollbar personnalisée */
            ::-webkit-scrollbar {
                width: 8px;
                height: 8px;
            }

            ::-webkit-scrollbar-track {
                background: #fef2e6;
                border-radius: 10px;
            }

            ::-webkit-scrollbar-thumb {
                background: #c17b4c;
                border-radius: 10px;
            }

            ::-webkit-scrollbar-thumb:hover {
                background: #a86434;
            }

            /* Selection couleur */
            ::selection {
                background: #c17b4c;
                color: white;
            }

            /* Alertes flash */
            .alert-success {
                background: #eef5ea;
                border: 1px solid #7caf5a;
                color: #5e8a42;
                padding: 0.75rem 1rem;
                border-radius: 60px;
                margin-bottom: 1rem;
                text-align: center;
                font-size: 0.85rem;
                animation: slideIn 0.3s ease;
            }

            .alert-error {
                background: #fee2e2;
                border: 1px solid #e0774b;
                color: #e0774b;
                padding: 0.75rem 1rem;
                border-radius: 60px;
                margin-bottom: 1rem;
                text-align: center;
                font-size: 0.85rem;
                animation: slideIn 0.3s ease;
            }

            .alert-warning {
                background: #fef2e6;
                border: 1px solid #e7a16a;
                color: #a56839;
                padding: 0.75rem 1rem;
                border-radius: 60px;
                margin-bottom: 1rem;
                text-align: center;
                font-size: 0.85rem;
                animation: slideIn 0.3s ease;
            }

            .alert-info {
                background: #e8f4f8;
                border: 1px solid #8fb4c7;
                color: #5a7a8a;
                padding: 0.75rem 1rem;
                border-radius: 60px;
                margin-bottom: 1rem;
                text-align: center;
                font-size: 0.85rem;
                animation: slideIn 0.3s ease;
            }

            /* Boutons génériques */
            .btn {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                gap: 0.5rem;
                padding: 0.6rem 1.2rem;
                border-radius: 60px;
                font-weight: 600;
                font-size: 0.85rem;
                transition: all 0.2s;
                cursor: pointer;
                border: none;
                font-family: inherit;
                text-decoration: none;
            }

            .btn-primary {
                background: #c17b4c;
                color: white;
                box-shadow: 0 2px 8px rgba(193, 123, 76, 0.2);
            }

            .btn-primary:hover {
                background: #a86434;
                transform: translateY(-2px);
                box-shadow: 0 6px 14px rgba(168, 100, 52, 0.25);
            }

            .btn-secondary {
                background: #fef2e6;
                color: #c17b4c;
                border: 1px solid #f0e0d0;
            }

            .btn-secondary:hover {
                background: #f7e5cf;
                transform: translateY(-2px);
                border-color: #c17b4c;
            }

            .btn-danger {
                background: transparent;
                border: 1px solid #e0774b;
                color: #e0774b;
            }

            .btn-danger:hover {
                background: #e0774b;
                color: white;
            }

            /* Cards génériques */
            .card {
                background: white;
                border-radius: 1.2rem;
                border: 1px solid #ffefdf;
                box-shadow: 0 6px 14px rgba(0, 0, 0, 0.03);
                transition: all 0.3s ease;
            }

            .card:hover {
                transform: translateY(-4px);
                box-shadow: 0 20px 28px -12px rgba(153, 94, 49, 0.15);
                border-color: #e6cdb3;
            }

            /* Formulaires */
            .form-group {
                margin-bottom: 1.2rem;
            }

            .form-label {
                display: block;
                font-weight: 600;
                color: #5a4a3a;
                margin-bottom: 0.5rem;
                font-size: 0.9rem;
            }

            .form-input {
                width: 100%;
                padding: 0.85rem 1rem;
                border: 1.5px solid #f0e0d0;
                border-radius: 60px;
                font-size: 0.95rem;
                transition: all 0.25s;
                background: #fefcf9;
                font-family: inherit;
            }

            .form-input:focus {
                outline: none;
                border-color: #c17b4c;
                box-shadow: 0 0 0 3px rgba(193, 123, 76, 0.15);
                background: white;
            }

            textarea.form-input {
                border-radius: 1.2rem;
                resize: vertical;
            }

            /* Grid utilities */
            .grid {
                display: grid;
                gap: 1.5rem;
            }

            .grid-cols-1 { grid-template-columns: repeat(1, 1fr); }
            .grid-cols-2 { grid-template-columns: repeat(2, 1fr); }
            .grid-cols-3 { grid-template-columns: repeat(3, 1fr); }
            .grid-cols-4 { grid-template-columns: repeat(4, 1fr); }

            @media (max-width: 1024px) {
                .grid-cols-4 { grid-template-columns: repeat(3, 1fr); }
                .grid-cols-3 { grid-template-columns: repeat(2, 1fr); }
            }

            @media (max-width: 768px) {
                .grid-cols-4, .grid-cols-3, .grid-cols-2 {
                    grid-template-columns: repeat(1, 1fr);
                }
            }

            /* Flex utilities */
            .flex { display: flex; }
            .flex-col { flex-direction: column; }
            .items-center { align-items: center; }
            .justify-between { justify-content: space-between; }
            .justify-center { justify-content: center; }
            .gap-1 { gap: 0.25rem; }
            .gap-2 { gap: 0.5rem; }
            .gap-3 { gap: 0.75rem; }
            .gap-4 { gap: 1rem; }

            /* Spacing */
            .mt-1 { margin-top: 0.25rem; }
            .mt-2 { margin-top: 0.5rem; }
            .mt-3 { margin-top: 0.75rem; }
            .mt-4 { margin-top: 1rem; }
            .mb-1 { margin-bottom: 0.25rem; }
            .mb-2 { margin-bottom: 0.5rem; }
            .mb-3 { margin-bottom: 0.75rem; }
            .mb-4 { margin-bottom: 1rem; }
            .p-1 { padding: 0.25rem; }
            .p-2 { padding: 0.5rem; }
            .p-3 { padding: 0.75rem; }
            .p-4 { padding: 1rem; }

            /* Text */
            .text-center { text-align: center; }
            .text-sm { font-size: 0.8rem; }
            .text-lg { font-size: 1.1rem; }
            .text-xl { font-size: 1.3rem; }
            .text-2xl { font-size: 1.5rem; }
            .font-bold { font-weight: 700; }
            .font-semibold { font-weight: 600; }
            .text-muted { color: #9b7c64; }
        </style>
    </head>
    <body>
        <div class="min-h-screen">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="page-header">
                    <div class="page-header-container">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Flash Messages -->
            @if(session('success'))
                <div class="container mt-3">
                    <div class="alert-success">
                        ✅ {{ session('success') }}
                    </div>
                </div>
            @endif

            @if(session('error'))
                <div class="container mt-3">
                    <div class="alert-error">
                        ❌ {{ session('error') }}
                    </div>
                </div>
            @endif

            @if(session('warning'))
                <div class="container mt-3">
                    <div class="alert-warning">
                        ⚠️ {{ session('warning') }}
                    </div>
                </div>
            @endif

            @if(session('info'))
                <div class="container mt-3">
                    <div class="alert-info">
                        ℹ️ {{ session('info') }}
                    </div>
                </div>
            @endif

            <!-- Page Content -->
            <main>
                <div class="container">
                    {{ $slot }}
                </div>
            </main>

            <!-- Footer -->
            <footer style="text-align: center; padding: 1.5rem; margin-top: 2rem; font-size: 0.75rem; color: #b3967a; border-top: 1px solid #f0e0d0;">
                <p>🐾 Patte Douce — Plateforme d'adoption responsable | ensemble pour leur bien-être</p>
                <p style="margin-top: 6px;">📧 contact@pattedouce.adoption | 📞 01 23 45 67 89</p>
            </footer>
        </div>
    </body>
</html>