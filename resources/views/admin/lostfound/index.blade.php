<x-app-layout>
<style>
    /* ========== STYLES ADMIN LOST & FOUND ========== */
    .container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 2rem;
    }

    /* Titre principal */
    .container > h2 {
        font-size: 1.8rem;
        font-weight: 800;
        background: linear-gradient(135deg, #c17b4c, #e7a16a);
        background-clip: text;
        -webkit-background-clip: text;
        color: transparent;
        display: inline-flex;
        align-items: center;
        gap: 0.6rem;
        margin-bottom: 0.5rem;
    }

    /* Sous-titre */
    .subtitle {
        color: #9b7c64;
        margin-bottom: 1.5rem;
        font-size: 0.9rem;
        border-left: 3px solid #c17b4c;
        padding-left: 1rem;
    }

    /* Barre de recherche */
    .search-container {
        margin-bottom: 2rem;
        background: white;
        padding: 1rem 1.2rem;
        border-radius: 1.2rem;
        border: 1px solid #ffefdf;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.03);
    }

    .d-flex.gap-2 {
        display: flex;
        gap: 0.8rem;
        flex-wrap: wrap;
        align-items: center;
    }

    .search-wrapper {
        flex: 1;
        min-width: 250px;
        position: relative;
    }

    .search-wrapper .form-control {
        width: 100%;
        padding: 0.85rem 1rem 0.85rem 3rem;
        border: 1.5px solid #f0e0d0;
        border-radius: 60px;
        font-size: 1rem;
        transition: all 0.25s;
        background: #fefcf9;
        font-family: inherit;
    }

    .search-wrapper .form-control:focus {
        outline: none;
        border-color: #c17b4c;
        box-shadow: 0 0 0 3px rgba(193, 123, 76, 0.15);
        background: white;
    }

    .search-wrapper::before {
        content: "🔍";
        position: absolute;
        left: 1rem;
        top: 50%;
        transform: translateY(-50%);
        font-size: 1.1rem;
        pointer-events: none;
        z-index: 1;
    }

    .btn-primary {
        background: #c17b4c;
        color: white;
        border: none;
        padding: 0.85rem 1.8rem;
        border-radius: 60px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.2s;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        font-family: inherit;
        font-size: 0.9rem;
        text-decoration: none;
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
        border: 1.5px solid #f0e0d0;
        padding: 0.85rem 1.8rem;
        border-radius: 60px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.2s;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        font-family: inherit;
        font-size: 0.9rem;
        text-decoration: none;
    }

    .btn-secondary:hover {
        background: #f7e5cf;
        transform: translateY(-2px);
        border-color: #c17b4c;
    }

    /* Résultats info */
    .results-info {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1.5rem;
        flex-wrap: wrap;
        gap: 0.5rem;
    }

    .results-count {
        background: #fef2e6;
        padding: 0.4rem 1rem;
        border-radius: 60px;
        font-size: 0.8rem;
        color: #a56839;
    }

    /* Grille */
    .row {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
        gap: 1.8rem;
        margin: 0;
    }

    .col-md-4 {
        width: 100%;
        padding: 0;
        margin: 0;
    }

    /* Cartes */
    .card {
        background: white;
        border-radius: 1.2rem;
        overflow: hidden;
        transition: all 0.3s ease;
        border: 1px solid #ffefdf;
        box-shadow: 0 6px 14px rgba(0, 0, 0, 0.03);
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .card:hover {
        transform: translateY(-6px);
        border-color: #e6cdb3;
        box-shadow: 0 20px 28px -12px rgba(153, 94, 49, 0.15);
    }

    /* Image */
    .card-img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        background: #fef5e8;
    }

    .card-content {
        padding: 1.2rem;
        flex: 1;
    }

    .card h5 {
        font-size: 0.9rem;
        font-weight: 700;
        margin-bottom: 1rem;
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        padding: 0.4rem 1rem;
        border-radius: 40px;
        color: white;
    }

    .card h5.perdu {
        background: #e0774b;
    }

    .card h5.trouve {
        background: #7caf5a;
    }

    .card p {
        color: #5a4a3a;
        font-size: 0.85rem;
        margin-bottom: 0.75rem;
        line-height: 1.5;
        display: flex;
        align-items: flex-start;
        gap: 0.5rem;
    }

    .card p strong {
        color: #9b7c64;
        font-weight: 600;
        min-width: 85px;
    }

    /* Bouton delete */
    .btn-danger {
        background: transparent;
        border: 1px solid #e0774b;
        color: #e0774b;
        padding: 0.6rem 1rem;
        border-radius: 40px;
        font-size: 0.8rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.2s;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.4rem;
        font-family: inherit;
        width: 100%;
        margin-top: 0.8rem;
    }

    .btn-danger:hover {
        background: #e0774b;
        color: white;
        transform: translateY(-2px);
    }

    /* Message vide */
    .empty-state {
        text-align: center;
        padding: 3rem;
        background: white;
        border-radius: 1.5rem;
        border: 1px solid #ffefdf;
    }

    .empty-state .emoji {
        font-size: 3rem;
        margin-bottom: 1rem;
    }

    .empty-state p {
        color: #9b7c64;
        font-size: 1rem;
        margin: 0;
    }

    .empty-state .btn-secondary {
        display: inline-flex;
        margin-top: 1rem;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .container {
            padding: 1rem;
        }
        .row {
            gap: 1rem;
        }
        .d-flex.gap-2 {
            flex-direction: column;
        }
        .search-wrapper {
            width: 100%;
        }
        .btn-primary, .btn-secondary {
            width: 100%;
            justify-content: center;
        }
        .results-info {
            flex-direction: column;
            text-align: center;
        }
        .card p {
            flex-direction: column;
            gap: 0.2rem;
        }
        .card p strong {
            min-width: auto;
        }
    }
</style>

<div class="container mt-4">

    <h2>🔎 Gestion Lost & Found</h2>
    <div class="subtitle">
        Gérez les annonces d'animaux perdus et trouvés
    </div>

    <!-- 🔎 SEARCH BAR -->
    <div class="search-container">
        <form method="GET" action="{{ route('admin.lostfound') }}">
            <div class="d-flex gap-2">
                <div class="search-wrapper">
                    <input type="text"
                           name="search"
                           class="form-control"
                           placeholder="Rechercher par description ou localisation..."
                           value="{{ request('search') }}">
                </div>
                <button type="submit" class="btn-primary">
                    🔍 Rechercher
                </button>
                @if(request('search'))
                <a href="{{ route('admin.lostfound') }}" class="btn-secondary">
                    ✖️ Effacer
                </a>
                @endif
            </div>
        </form>
    </div>

    <!-- Résultats info -->
    <div class="results-info">
        <div class="results-count">
            📊 {{ $losts->count() }} annonce(s) trouvée(s)
        </div>
        @if(request('search'))
        <div>
            <a href="{{ route('admin.lostfound') }}" style="background: #fef2e6; padding: 0.4rem 1rem; border-radius: 40px; text-decoration: none; color: #c17b4c; font-size: 0.8rem;">
                ✖️ Réinitialiser la recherche
            </a>
        </div>
        @endif
    </div>

    <!-- 🧾 LIST -->
    <div class="row">

        @forelse($losts as $lost)

        <div class="col-md-4 mb-3">

            <div class="card shadow">

                @if($lost->photo)
                <img src="{{ asset('uploads/'.$lost->photo) }}"
                     class="card-img"
                     alt="Photo annonce">
                @endif

                <div class="card-content">
                    <!-- TYPE avec badge -->
                    <h5 class="{{ $lost->type == 'perdu' ? 'perdu' : 'trouve' }}">
                        @if($lost->type == 'perdu')
                            🐾 Perdu
                        @else
                            🐕 Trouvé
                        @endif
                    </h5>

                    <!-- DESCRIPTION -->
                    <p>
                        <strong>📝 Description :</strong>
                        <span>{{ Str::limit($lost->description, 100) }}</span>
                    </p>

                    <!-- LOCALISATION -->
                    <p>
                        <strong>📍 Localisation :</strong>
                        <span>{{ $lost->localisation }}</span>
                    </p>

                    <!-- CONTACT -->
                    <p>
                        <strong>📞 Contact :</strong>
                        <span>{{ $lost->contact }}</span>
                    </p>

                    <!-- DATE -->
                    <p>
                        <strong>📅 Publié le :</strong>
                        <span>{{ $lost->created_at ? $lost->created_at->format('d/m/Y') : 'Récemment' }}</span>
                    </p>

                    <!-- DELETE -->
                    <form method="POST"
                          action="{{ route('lost-found.destroy', $lost->id) }}"
                          onsubmit="return confirm('Supprimer définitivement cette annonce ?')">

                        @csrf
                        @method('DELETE')

                        <button class="btn-danger">
                            🗑️ Supprimer l'annonce
                        </button>

                    </form>
                </div>

            </div>

        </div>

        @empty

        <!-- EMPTY STATE -->
        <div class="empty-state">
            <div class="emoji">🔎😢</div>
            <p>
                @if(request('search'))
                    Aucune annonce ne correspond à votre recherche.
                @else
                    Aucune annonce Lost & Found pour le moment.
                @endif
            </p>
            @if(request('search'))
            <a href="{{ route('admin.lostfound') }}" class="btn-secondary">
                ✖️ Effacer la recherche
            </a>
            @endif
        </div>

        @endforelse

    </div>

</div>

</x-app-layout>