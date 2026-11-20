# Registre des anomalies – Patte Douce (semaines 5 à 10)

Sévérité = gravité technique. Priorité = urgence de correction.

| ID | Description | Source | Sévérité | Priorité | Preuve avant | Preuve après | Statut |
|---|---|---|---|---|---|---|---|
| ANO-01 | Pas de champ de statut pour les annonces Lost & Found | S5, code | Mineure | Basse | Migration sans colonne statut | – | Hors exigence |
| ANO-02 | Modification et suppression d'une annonce Lost & Found par un autre utilisateur | S5, test S10 | Critique | Haute | 2 tests en échec (annonce modifiée, puis supprimée) | LostFoundSecurityTest 6/6 | Corrigée et retestée |
| ANO-03 | Aucune validation des données Lost & Found | S5, test S10 | Majeure | Haute | 1 test en échec | LostFoundSecurityTest 6/6 | Corrigée et retestée |
| ANO-04 | Champ photo sans label (axe : critical) | S9 | Majeure | Haute | Rapport axe | – | Ouverte |
| ANO-05 | Contraste insuffisant, accueil (11 éléments) | S9 | Mineure (axe : serious) | Moyenne | Rapport axe | – | Ouverte |
| ANO-06 | Contraste insuffisant, login (4 éléments) | S9 | Mineure (axe : serious) | Moyenne | Rapport axe | – | Ouverte |
| ANO-07 | Contraste insuffisant, /animals (44 éléments) | S9 | Mineure (axe : serious) | Moyenne | Rapport axe | – | Ouverte |
| ANO-08 | Contraste insuffisant, formulaire (1 élément) | S9 | Mineure (axe : serious) | Basse | Rapport axe | – | Ouverte |
| ANO-09 | Upload Lost & Found sans contrôle de type ni de taille | S10, code | Critique (potentielle) | Haute | Extension prise chez le client, aucune validation | `.php` et 3 000 Ko refusés, LostFoundUploadTest 3/3 | Corrigée et retestée |
| ANO-10 | Recherche combinée au filtre de type | S10, code | À confirmer | Moyenne | – | – | Non testée |
| ANO-11 | `POST /api/animals` sans authentification (EX-19) | S10, test + route:list | Critique | Haute | 201 reçu au lieu de 401 ; route sans `auth:sanctum` | 401 ; AnimalApiSecurityTest 4/4 | Corrigée et retestée |
| ANO-12 | `user_id` pris du corps de la requête (usurpation) | S10, test | Majeure | Haute | Annonce enregistrée pour l'utilisateur 2 avec le jeton de l'utilisateur 1 | `user_id` = utilisateur du jeton | Corrigée et retestée |
| ANO-13 | Pas de `max:255` sur titre et race de l'API (EX-06) | S10, code | Mineure | Moyenne | Le premier test passait à tort (le 422 venait d'un autre champ) | 256 caractères → 422 sur `titre` ; 255 → 201 | Corrigée et retestée |
| ANO-14 | Un utilisateur simple peut créer, modifier et supprimer un vétérinaire via `/vet` (EX-15) | S10, test | Critique | Haute | 3 tests en échec (ligne créée, modifiée, supprimée) | Routes `/vet` limitées à index et show ; 3 tests verts | Corrigée et retestée |
| ANO-15 | Email d'un vétérinaire non validé au format (EX-16) | S10, test | Mineure | Moyenne | `abc` accepté | Refusé, erreur sur `email` | Corrigée et retestée |
| ANO-16 | `update()` d'un vétérinaire sans validation (EX-16) | S10, test | Majeure | Moyenne | Nom vide accepté | Refusé, erreur sur `nom` | Corrigée et retestée |
| ANO-17 | Rôle d'un utilisateur non validé (« superadmin » possible) (EX-18) | S10, code + test | Majeure | Haute | AdminUserSecurityTest : 5 tests en échec sur 10 (avec les ANO-18 et ANO-19) | Rôle limité à `user` et `admin` ; 10/10 | Corrigée et retestée |
| ANO-18 | Création d'utilisateur sans validation ; toute erreur affichée « Email déjà utilisé » (EX-18) | S10, code + test | Majeure | Moyenne | Voir ANO-17 | Validation de nom, email, mot de passe ; 10/10 | Corrigée et retestée |
| ANO-19 | Modification d'utilisateur sans validation, email déjà pris non refusé (EX-18) | S10, code + test | Majeure | Moyenne | Voir ANO-17 | Unicité de l'email ; 10/10 | Corrigée et retestée |

## Synthèse
- 19 anomalies : 12 corrigées et retestées (ANO-02, 03, 09, 11 à 19), 5 ouvertes (accessibilité, ANO-04 à 08), 1 à confirmer (ANO-10), 1 hors exigence (ANO-01).
- Critiques : 4 (ANO-02, 09, 11, 14), toutes corrigées.
- Semaines 6 et 8 : aucune anomalie enregistrée. En S8, le test « POST sans jeton » n'avait pas été exécuté : ANO-11 est apparue en S10.

## Remarques
- Les anomalies ANO-02, 03, 09, 13, 17 à 19 ont d'abord été repérées par lecture du code ; seuls les tests exécutés les ont confirmées.
- Pour ANO-17 à 19, la preuve « avant » est globale : 5 tests en échec sur 10 avec l'ancien contrôleur, sans attribution test par test.
- Les 3 tests d'`AnimalApiTest` devenus rouges après la correction (401 reçu) vérifiaient l'ancien comportement et ont été réécrits ; ce n'est pas une régression.
- Un utilisateur non administrateur sur une route d'administration est redirigé vers `/` (302), alors que les critères CA-15 et CA-17 attendaient un 403. L'accès est bien refusé ; seule la forme de la réponse diffère.