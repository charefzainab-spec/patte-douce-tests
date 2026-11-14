<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>Gestion des utilisateurs · Patte Douce</title>
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
            margin-bottom: 1.5rem;
        }

        .page-header h2 {
            font-size: 1.8rem;
            font-weight: 800;
            background: linear-gradient(135deg, #c17b4c, #e7a16a);
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;
            display: inline-flex;
            align-items: center;
            gap: 0.6rem;
        }

        /* Bouton ajouter */
        .btn-add {
            background: #c17b4c;
            color: white;
            text-decoration: none;
            padding: 0.7rem 1.3rem;
            border-radius: 60px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.25s;
            box-shadow: 0 4px 10px rgba(193, 123, 76, 0.25);
        }

        .btn-add:hover {
            background: #a86434;
            transform: translateY(-2px);
            box-shadow: 0 8px 18px rgba(168, 100, 52, 0.25);
        }

        /* Tableau */
        .table-wrapper {
            background: white;
            border-radius: 1.5rem;
            border: 1px solid #ffefdf;
            overflow: hidden;
            box-shadow: 0 6px 14px rgba(0, 0, 0, 0.03);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            text-align: left;
            padding: 1rem 1.2rem;
            background: #fefcf9;
            color: #5a4a3a;
            font-weight: 600;
            font-size: 0.85rem;
            border-bottom: 1px solid #f0e0d0;
        }

        td {
            padding: 1rem 1.2rem;
            border-bottom: 1px solid #f0e0d0;
            color: #2d3e2b;
            font-size: 0.9rem;
        }

        tr:last-child td {
            border-bottom: none;
        }

        tr:hover {
            background: #fefcf9;
        }

        /* Badge rôle */
        .role-badge {
            display: inline-block;
            padding: 0.25rem 0.8rem;
            border-radius: 40px;
            font-size: 0.7rem;
            font-weight: 600;
        }

        .role-admin {
            background: #fef2e6;
            color: #c17b4c;
        }

        .role-user {
            background: #eef5ea;
            color: #7caf5a;
        }

        /* Groupe d'actions */
        .actions-group {
            display: flex;
            gap: 0.5rem;
            align-items: center;
            flex-wrap: wrap;
        }

        .btn-edit {
            background: #fef2e6;
            color: #c17b4c;
            text-decoration: none;
            padding: 0.4rem 1rem;
            border-radius: 40px;
            font-size: 0.8rem;
            font-weight: 600;
            transition: all 0.2s;
            display: inline-flex;
            align-items: center;
            gap: 0.3rem;
            border: none;
            cursor: pointer;
        }

        .btn-edit:hover {
            background: #f7e5cf;
            transform: translateY(-2px);
        }

        .btn-delete {
            background: transparent;
            border: 1px solid #e0774b;
            color: #e0774b;
            padding: 0.4rem 1rem;
            border-radius: 40px;
            font-size: 0.8rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
            display: inline-flex;
            align-items: center;
            gap: 0.3rem;
        }

        .btn-delete:hover {
            background: #e0774b;
            color: white;
            transform: translateY(-2px);
        }

        /* Message vide */
        .empty-state {
            text-align: center;
            padding: 3rem;
            color: #9b7c64;
        }

        /* Footer */
        .footer {
            text-align: center;
            padding: 1.5rem;
            margin-top: 2rem;
            font-size: 0.75rem;
            color: #b3967a;
            border-top: 1px solid #f0e0d0;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .nav-container {
                flex-direction: column;
                text-align: center;
            }
            .main-container {
                padding: 1rem;
            }
            .page-header {
                flex-direction: column;
                text-align: center;
            }
            th, td {
                padding: 0.75rem;
                font-size: 0.8rem;
            }
            .actions-group {
                flex-direction: column;
                align-items: flex-start;
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
            <a href="{{ route('dashboard') }}">👤 Vue utilisateur</a>
            <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                @csrf
                <button type="submit" class="logout-btn">🚪 Déconnexion</button>
            </form>
        </div>
    </div>
</nav>

<main class="main-container">
    <div class="page-header">
        <h2>👥 Liste des utilisateurs</h2>
        <a href="{{ route('users.create') }}" class="btn-add">
            ➕ Ajouter un utilisateur
        </a>
    </div>

    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Rôle</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                <tr>
                    <td>#{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <span class="role-badge {{ $user->role == 'admin' ? 'role-admin' : 'role-user' }}">
                            {{ $user->role == 'admin' ? '👑 Administrateur' : '👤 Utilisateur' }}
                        </span>
                    </td>
                    <td>
                        <div class="actions-group">
                            <a href="{{ route('users.edit', $user->id) }}" class="btn-edit">
                                ✏️ Modifier
                            </a>
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete" onclick="return confirm('Supprimer cet utilisateur ?')">
                                    🗑️ Supprimer
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="empty-state">
                        <span>📭 Aucun utilisateur enregistré</span>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</main>

<footer class="footer">
    <p>🐾 Patte Douce — Administration | Gestion des utilisateurs</p>
</footer>

</body>
</html>