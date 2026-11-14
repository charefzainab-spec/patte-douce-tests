<section class="delete-account-section">
    <style>
        /* ========== STYLES DELETE ACCOUNT ========== */
        .delete-account-section {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            border-radius: 1.5rem;
            padding: 1.8rem;
            border: 1px solid #ffefdf;
            box-shadow: 0 6px 14px rgba(0, 0, 0, 0.03);
        }

        .delete-account-section:hover {
            box-shadow: 0 20px 28px -12px rgba(153, 94, 49, 0.08);
        }

        /* En-tête */
        .delete-header {
            margin-bottom: 1.5rem;
            text-align: center;
        }

        .delete-header h2 {
            font-size: 1.5rem;
            font-weight: 700;
            color: #e0774b;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 0.5rem;
        }

        .delete-header p {
            color: #9b7c64;
            font-size: 0.85rem;
            margin-top: 0.3rem;
            line-height: 1.5;
        }

        /* Bouton danger */
        .btn-danger-main {
            background: transparent;
            border: 1.5px solid #e0774b;
            color: #e0774b;
            padding: 0.8rem 1.5rem;
            border-radius: 60px;
            font-weight: 600;
            font-size: 0.9rem;
            cursor: pointer;
            transition: all 0.25s;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            font-family: inherit;
            width: 100%;
            justify-content: center;
        }

        .btn-danger-main:hover {
            background: #e0774b;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 6px 14px rgba(224, 119, 75, 0.25);
        }

        /* ========== MODAL STYLES ========== */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(4px);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1000;
            visibility: hidden;
            opacity: 0;
            transition: all 0.3s;
        }

        .modal-overlay.active {
            visibility: visible;
            opacity: 1;
        }

        .modal-container {
            background: white;
            border-radius: 1.5rem;
            max-width: 500px;
            width: 90%;
            border: 1px solid #ffefdf;
            box-shadow: 0 20px 35px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .modal-header {
            padding: 1.2rem 1.5rem;
            background: linear-gradient(135deg, #fffaf5, #fef5e8);
            border-bottom: 1px solid #f0e0d0;
        }

        .modal-header h2 {
            font-size: 1.3rem;
            font-weight: 700;
            color: #e0774b;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .modal-body {
            padding: 1.5rem;
        }

        .modal-body p {
            color: #5a4a3a;
            font-size: 0.9rem;
            line-height: 1.5;
            margin-bottom: 1.2rem;
        }

        .warning-text {
            background: #fee2e2;
            padding: 0.8rem;
            border-radius: 0.8rem;
            color: #e0774b;
            font-size: 0.85rem;
            margin-bottom: 1.2rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        /* Champ mot de passe dans modal */
        .modal-body label {
            display: block;
            font-weight: 600;
            color: #5a4a3a;
            margin-bottom: 0.5rem;
            font-size: 0.85rem;
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
            color: #e0774b;
        }

        .modal-input {
            width: 100%;
            padding: 0.85rem 1rem 0.85rem 2.8rem;
            border: 1.5px solid #f0e0d0;
            border-radius: 60px;
            font-size: 0.95rem;
            transition: all 0.25s;
            background: #fefcf9;
            font-family: inherit;
        }

        .modal-input:focus {
            outline: none;
            border-color: #e0774b;
            box-shadow: 0 0 0 3px rgba(224, 119, 75, 0.15);
            background: white;
        }

        .input-error {
            color: #e0774b;
            font-size: 0.7rem;
            margin-top: 0.3rem;
            margin-left: 0.8rem;
        }

        /* Modal footer */
        .modal-footer {
            padding: 1rem 1.5rem 1.5rem;
            display: flex;
            gap: 1rem;
            justify-content: flex-end;
            flex-wrap: wrap;
            border-top: 1px solid #f0e0d0;
            background: #fefcf9;
        }

        .btn-cancel {
            background: #fef2e6;
            color: #c17b4c;
            border: none;
            padding: 0.7rem 1.5rem;
            border-radius: 60px;
            font-weight: 600;
            font-size: 0.85rem;
            cursor: pointer;
            transition: all 0.2s;
            font-family: inherit;
        }

        .btn-cancel:hover {
            background: #f7e5cf;
            transform: translateY(-2px);
        }

        .btn-confirm-delete {
            background: transparent;
            border: 1.5px solid #e0774b;
            color: #e0774b;
            padding: 0.7rem 1.5rem;
            border-radius: 60px;
            font-weight: 600;
            font-size: 0.85rem;
            cursor: pointer;
            transition: all 0.2s;
            font-family: inherit;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-confirm-delete:hover {
            background: #e0774b;
            color: white;
            transform: translateY(-2px);
        }

        /* Responsive */
        @media (max-width: 640px) {
            .delete-account-section {
                padding: 1.2rem;
                margin: 0 1rem;
            }
            .modal-footer {
                flex-direction: column;
            }
            .btn-cancel, .btn-confirm-delete {
                width: 100%;
                justify-content: center;
            }
        }
    </style>

    <div class="delete-header">
        <h2>
            <span>⚠️</span> Supprimer le compte
        </h2>
        <p>
            Une fois votre compte supprimé, toutes ses données seront définitivement perdues. 
            Avant de supprimer votre compte, veuillez télécharger toutes les informations que vous souhaitez conserver.
        </p>
    </div>

    <button type="button" class="btn-danger-main" onclick="openDeleteModal()">
        🗑️ Supprimer mon compte
    </button>

    <!-- Modal de confirmation -->
    <div id="deleteModal" class="modal-overlay">
        <div class="modal-container">
            <div class="modal-header">
                <h2>
                    <span>⚠️</span> Confirmer la suppression
                </h2>
            </div>
            <div class="modal-body">
                <p>Êtes-vous sûr de vouloir supprimer votre compte ?</p>
                <div class="warning-text">
                    ⚠️ Cette action est irréversible. Toutes vos données seront définitivement supprimées.
                </div>
                <p>Veuillez saisir votre mot de passe pour confirmer la suppression définitive de votre compte.</p>

                <form method="post" action="{{ route('profile.destroy') }}" id="deleteAccountForm">
                    @csrf
                    @method('delete')

                    <label for="delete_password">🔐 Mot de passe</label>
                    <div class="input-wrapper">
                        <span class="input-icon">🔒</span>
                        <input id="delete_password" 
                               name="password" 
                               type="password" 
                               class="modal-input" 
                               placeholder="Entrez votre mot de passe"
                               required>
                    </div>
                    @error('password', 'userDeletion')
                        <div class="input-error">{{ $message }}</div>
                    @enderror
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-cancel" onclick="closeDeleteModal()">
                    Annuler
                </button>
                <button type="submit" form="deleteAccountForm" class="btn-confirm-delete">
                    🗑️ Supprimer définitivement
                </button>
            </div>
        </div>
    </div>

    <script>
        function openDeleteModal() {
            document.getElementById('deleteModal').classList.add('active');
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.remove('active');
        }

        // Fermer la modal en cliquant à l'extérieur
        document.getElementById('deleteModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeDeleteModal();
            }
        });

        // Afficher la modal si des erreurs sont présentes
        @if($errors->userDeletion->isNotEmpty())
            document.addEventListener('DOMContentLoaded', function() {
                openDeleteModal();
            });
        @endif
    </script>
</section>