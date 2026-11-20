# Registre des anomalies – Patte Douce (semaines 5 à 10)

Sévérité = gravité technique. Priorité = urgence de correction.

| ID | Description | Source | Sévérité | Priorité | Preuve avant | Preuve après | Statut |
|---|---|---|---|---|---|---|---|
| ANO-01 | Pas de champ de statut pour les annonces Lost & Found | S5, code | Mineure | Basse | Migration sans colonne statut | – | Hors exigence |
| ANO-02 | Modification et suppression d'une annonce Lost & Found par un autre utilisateur | S5, test S10 | Critique | Haute | 2 tests en échec | LostFoundSecurityTest 6/6 | Corrigée et retestée |
| ANO-03 | Aucune validation des données Lost & Found | S5, test S10 | Majeure | Haute | 1 test en échec | LostFoundSecurityTest 6/6 | Corrigée et retestée |
| ANO-04 | Champ photo sans label (axe : critical) | S9 | Majeure | Haute | Axe : 1 élément sur `/animals/create` | `aria-label` ajouté ; axe ne le signale plus | Corrigée et retestée |
| ANO-05 | Contraste insuffisant, accueil | S9 | Mineure (axe : serious) | Moyenne | 11 éléments | 11 éléments | Ouverte |
| ANO-06 | Contraste insuffisant, connexion | S9 | Mineure (axe : serious) | Moyenne | 4 éléments | 4 éléments | Ouverte |
| ANO-07 | Contraste insuffisant, `/animals` | S9 | Mineure (axe : serious) | Moyenne | 44 éléments | 48 éléments (plus d'annonces affichées) | Ouverte |
| ANO-08 | Contraste insuffisant, formulaire | S9 | Mineure (axe : serious) | Basse | 1 élément | 1 élément | Ouverte |
| ANO-09 | Upload Lost & Found sans contrôle de type ni de taille | S10, code | Critique (potentielle) | Haute | Extension prise chez le client | `.php` et 3 000 Ko refusés, LostFoundUploadTest 3/3 | Corrigée et retestée |
| ANO-10 | Recherche combinée au filtre de type | S10, code | À confirmer | Moyenne | – | – | Non testée |
| ANO-11 | `POST /api/animals` sans authentification | S10, test | Critique | Haute | 201 au lieu de 401 | 401 ; AnimalApiSecurityTest 4/4 | Corrigée et retestée |
| ANO-12 | `user_id` pris du corps de la requête (API) | S10, test | Majeure | Haute | Annonce créée pour l'utilisateur 2 avec le jeton de l'utilisateur 1 | `user_id` = utilisateur du jeton | Corrigée et retestée |
| ANO-13 | Pas de `max:255` sur titre et race de l'API | S10, code | Mineure | Moyenne | Le premier test passait à tort | 256 → 422 ; 255 → 201 | Corrigée et retestée |
| ANO-14 | Un utilisateur simple gère les vétérinaires via `/vet` | S10, test | Critique | Haute | 3 tests en échec | Routes `/vet` limitées à index et show | Corrigée et retestée |
| ANO-15 | Email de vétérinaire non validé au format | S10, test | Mineure | Moyenne | `abc` accepté | Refusé | Corrigée et retestée |
| ANO-16 | `update()` d'un vétérinaire sans validation | S10, test | Majeure | Moyenne | Nom vide accepté | Refusé | Corrigée et retestée |
| ANO-17 | Rôle d'un utilisateur non validé | S10, code + test | Majeure | Haute | 5 tests en échec sur 10 (avec ANO-18 et 19) | Rôle limité à `user` et `admin` ; 10/10 | Corrigée et retestée |
| ANO-18 | Création d'utilisateur sans validation | S10, code + test | Majeure | Moyenne | Voir ANO-17 | Validation complète ; 10/10 | Corrigée et retestée |
| ANO-19 | Modification d'utilisateur sans validation | S10, code + test | Majeure | Moyenne | Voir ANO-17 | Unicité de l'email ; 10/10 | Corrigée et retestée |
| ANO-20 | Modification et suppression d'une annonce animal par un autre utilisateur | S10, code + test | Critique | Haute | [à compléter : tests en échec, 7 attendus] | AnimalOwnershipTest 11/11 | Corrigée et retestée |
| ANO-21 | `update()` d'une annonce animal sans validation | S10, code + test | Majeure | Moyenne | [à compléter] | Titre vide, âge négatif et 256 caractères refusés | Corrigée et retestée |
| ANO-22 | Upload d'une annonce animal sans contrôle à la modification | S10, code + test | Critique (potentielle) | Haute | [à compléter] | Fichier `.php` refusé | Corrigée et retestée |
| ANO-23 | `aria-label` interdit sur la pagination de `/animals` (axe : serious) | S10, axe | Mineure | Basse | 1 élément | [à compléter après correction] | Ouverte |

## Synthèse
- 23 anomalies : 16 corrigées et retestées, 5 ouvertes (ANO-05 à 08 et ANO-23), 1 à confirmer (ANO-10), 1 hors exigence (ANO-01).
- Critiques : 6 (ANO-02, 09, 11, 14, 20, 22), toutes corrigées.
- Accessibilité : 5 anomalies et 61 éléments en S9 ; 5 anomalies et 65 éléments en S10. ANO-04 est corrigée, mais ANO-23 est apparue et le nombre d'éléments à faible contraste dépend du nombre d'annonces affichées.
- Semaines 6 et 8 : aucune anomalie enregistrée. En S8, le test « POST sans jeton » n'avait pas été exécuté : ANO-11 est apparue en S10.

## Remarques
- Plusieurs anomalies (ANO-02, 03, 09, 13, 17 à 22) ont d'abord été repérées par lecture du code ; les tests exécutés les ont confirmées.
- Pour ANO-17 à 19, la preuve « avant » est globale (5 tests en échec sur 10).
- Les 3 tests d'`AnimalApiTest` devenus rouges après la correction vérifiaient l'ancien comportement et ont été réécrits : ce n'est pas une régression.
- Un utilisateur non administrateur sur une route d'administration est redirigé vers `/` (302), alors que les critères attendaient un 403 : l'accès est bien refusé.
- Les tests e2e créent des annonces à chaque lancement, ce qui fait varier les mesures d'accessibilité.