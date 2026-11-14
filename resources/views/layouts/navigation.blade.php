<nav x-data="{ open: false }" class="navbar">
    <style>
        /* ========== STYLES NAVIGATION ========== */
        .navbar {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(8px);
            border-bottom: 1px solid #f0e0d0;
            position: sticky;
            top: 0;
            z-index: 50;
        }

        .nav-container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0.75rem 1.5rem;
        }

        .nav-inner {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        /* Logo */
        .logo-link {
            display: flex;
            align-items: center;
            gap: 0.6rem;
            text-decoration: none;
            font-size: 1.3rem;
            font-weight: 700;
            color: #c17b4c;
        }

        .logo-icon {
            background: #f7e5cf;
            padding: 0.3rem 0.8rem;
            border-radius: 40px;
            font-size: 1.2rem;
        }

        .logo-text {
            color: #b45f2e;
        }

        /* Desktop nav */
        .desktop-nav {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        .nav-link {
            text-decoration: none;
            color: #9b7c64;
            font-weight: 500;
            padding: 0.5rem 0.25rem;
            transition: all 0.2s;
            position: relative;
        }

        .nav-link:hover {
            color: #c17b4c;
        }

        .nav-link.active {
            color: #c17b4c;
            font-weight: 600;
        }

        .nav-link.active::after {
            content: '';
            position: absolute;
            bottom: -0.5rem;
            left: 0;
            right: 0;
            height: 2px;
            background: #c17b4c;
            border-radius: 2px;
        }

        /* User dropdown */
        .desktop-user {
            position: relative;
        }

        .dropdown-trigger {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            background: #fef2e6;
            border: 1px solid #f0e0d0;
            padding: 0.5rem 1rem;
            border-radius: 60px;
            font-size: 0.85rem;
            font-weight: 500;
            color: #5a4a3a;
            cursor: pointer;
            transition: all 0.2s;
        }

        .dropdown-trigger:hover {
            background: #f7e5cf;
            border-color: #c17b4c;
            color: #c17b4c;
        }

        .dropdown-menu {
            position: absolute;
            right: 0;
            margin-top: 0.5rem;
            min-width: 12rem;
            background: white;
            border-radius: 1rem;
            border: 1px solid #f0e0d0;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            z-index: 50;
            overflow: hidden;
        }

        .dropdown-item {
            display: block;
            padding: 0.7rem 1rem;
            color: #5a4a3a;
            text-decoration: none;
            transition: all 0.2s;
            font-size: 0.85rem;
            width: 100%;
            text-align: left;
            background: transparent;
            border: none;
            cursor: pointer;
        }

        .dropdown-item:hover {
            background: #fef2e6;
            color: #c17b4c;
        }

        .dropdown-divider {
            height: 1px;
            background: #f0e0d0;
            margin: 0.25rem 0;
        }

        /* Mobile */
        .hamburger {
            background: transparent;
            border: 1.5px solid #f0e0d0;
            border-radius: 40px;
            padding: 0.5rem 0.8rem;
            cursor: pointer;
            font-size: 1.2rem;
            transition: all 0.2s;
        }

        .hamburger:hover {
            background: #fef2e6;
            border-color: #c17b4c;
            color: #c17b4c;
        }

        .mobile-menu {
            margin-top: 1rem;
            padding-top: 1rem;
            border-top: 1px solid #f0e0d0;
        }

        .mobile-nav-link {
            display: block;
            padding: 0.7rem 0;
            text-decoration: none;
            color: #9b7c64;
            transition: color 0.2s;
            font-size: 0.9rem;
        }

        .mobile-nav-link:hover {
            color: #c17b4c;
        }

        .mobile-nav-link.active {
            color: #c17b4c;
            font-weight: 600;
        }

        .mobile-user-info {
            margin-top: 1rem;
            padding-top: 0.8rem;
            border-top: 1px solid #f0e0d0;
        }

        .mobile-user-name {
            font-weight: 600;
            color: #2d3e2b;
            font-size: 0.9rem;
        }

        .mobile-user-email {
            font-size: 0.75rem;
            color: #9b7c64;
            margin-top: 0.2rem;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .nav-container {
                padding: 0.75rem 1rem;
            }
            .desktop-nav, .desktop-user {
                display: none;
            }
        }

        @media (min-width: 769px) {
            .mobile-only {
                display: none !important;
            }
        }

        /* Animation Alpine.js */
        [x-cloak] {
            display: none !important;
        }
    </style>

    <div class="nav-container">
        <div class="nav-inner">
            <!-- Logo et navigation desktop -->
            <div class="logo-section">
                <a href="{{ route('dashboard') }}" class="logo-link">
                    <span class="logo-icon">🐾</span>
                    <span class="logo-text">Patte Douce</span>
                </a>
                <div class="desktop-nav">
                    <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        🏠 Tableau de bord
                    </a>
                    <a href="{{ route('animals.index') }}" class="nav-link {{ request()->routeIs('animals.index') ? 'active' : '' }}">
                        🐕 Nos animaux
                    </a>
                    <a href="{{ route('lost-found.index') }}" class="nav-link {{ request()->routeIs('lost-found.index') ? 'active' : '' }}">
                        🔎 Lost & Found
                    </a>
                    <a href="{{ route('veterinaires.index') }}" class="nav-link {{ request()->routeIs('veterinaires.index') ? 'active' : '' }}">
                        🏥 Vétérinaires
                    </a>
                    @auth
                        @if(auth()->user()->role == 'admin')
                            <a href="{{ route('admin.dashboard') }}" class="nav-link">
                                🛡️ Admin Panel
                            </a>
                        @endif
                    @endauth
                </div>
            </div>

            <!-- User dropdown desktop -->
            <div class="desktop-user" x-data="{ open: false }">
                <button @click="open = !open" class="dropdown-trigger">
                    <span>👤</span>
                    <span>{{ Auth::user()->name }}</span>
                    <span x-show="!open">▼</span>
                    <span x-show="open" style="display: none;">▲</span>
                </button>
                <div x-show="open" x-cloak @click.away="open = false" class="dropdown-menu">
                    <a href="{{ route('profile.edit') }}" class="dropdown-item">
                        ✏️ Mon profil
                    </a>
                    <div class="dropdown-divider"></div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item">
                            🚪 Se déconnecter
                        </button>
                    </form>
                </div>
            </div>

            <!-- Hamburger button mobile -->
            <button @click="open = !open" class="hamburger mobile-only">
                <span x-show="!open">☰</span>
                <span x-show="open" style="display: none;">✕</span>
            </button>
        </div>

        <!-- Mobile menu -->
        <div x-show="open" x-cloak class="mobile-menu">
            <a href="{{ route('dashboard') }}" class="mobile-nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                🏠 Tableau de bord
            </a>
            <a href="{{ route('animals.index') }}" class="mobile-nav-link {{ request()->routeIs('animals.index') ? 'active' : '' }}">
                🐕 Nos animaux
            </a>
            <a href="{{ route('lost-found.index') }}" class="mobile-nav-link {{ request()->routeIs('lost-found.index') ? 'active' : '' }}">
                🔎 Lost & Found
            </a>
            <a href="{{ route('veterinaires.index') }}" class="mobile-nav-link {{ request()->routeIs('veterinaires.index') ? 'active' : '' }}">
                🏥 Vétérinaires
            </a>
            @auth
                @if(auth()->user()->role == 'admin')
                    <a href="{{ route('admin.dashboard') }}" class="mobile-nav-link">
                        🛡️ Admin Panel
                    </a>
                @endif
            @endauth
            
            <div class="mobile-user-info">
                <div class="mobile-user-name">
                    👤 {{ Auth::user()->name }}
                </div>
                <div class="mobile-user-email">
                    📧 {{ Auth::user()->email }}
                </div>
                <form method="POST" action="{{ route('logout') }}" class="mt-3">
                    @csrf
                    <button type="submit" class="mobile-nav-link w-full text-left" style="color: #e0774b;">
                        🚪 Se déconnecter
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>

<script>
    // Fermer le menu mobile lors du clic sur un lien
    document.querySelectorAll('.mobile-nav-link').forEach(link => {
        link.addEventListener('click', () => {
            if (window.Alpine) {
                // Si Alpine est disponible, fermer le menu
                const navbar = document.querySelector('.navbar');
                if (navbar && navbar.__x) {
                    navbar.__x.$data.open = false;
                }
            }
        });
    });
</script>