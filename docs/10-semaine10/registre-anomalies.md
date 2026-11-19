# Registre des anomalies – Patte Douce (semaines 5 à 10)

Sévérité = gravité technique. Priorité = urgence de correction.

| ID | Description | Source | Sévérité | Priorité | Preuve avant | Preuve après | Statut |
|---|---|---|---|---|---|---|---|
| ANO-01 | Pas de champ de statut pour les annonces Lost & Found | S5, lecture de code | Mineure | Basse | Migration sans colonne statut | – | Hors exigence (amélioration) |
| ANO-02 | Modification et suppression d'une annonce Lost & Found par un autre utilisateur | S5, confirmée en S10 | Critique | Haute | 2 tests en échec (annonce modifiée puis supprimée) | LostFoundSecurityTest 6/6 | Corrigée et retestée |
| ANO-03 | Aucune validation des données Lost & Found | S5, confirmée en S10 | Majeure | Haute | 1 test en échec | LostFoundSecurityTest 6/6 | Corrigée et retestée |
| ANO-04 | Champ photo sans label (axe : critical) | S9 accessibilité | Majeure | Haute | Rapport axe | – | Ouverte |
| ANO-05 | Contraste insuffisant, accueil (11 éléments) | S9 accessibilité | Mineure (axe : serious) | Moyenne | Rapport axe | – | Ouverte |
| ANO-06 | Contraste insuffisant, login (4 éléments) | S9 accessibilité | Mineure (axe : serious) | Moyenne | Rapport axe | – | Ouverte |
| ANO-07 | Contraste insuffisant, /animals (44 éléments) | S9 accessibilité | Mineure (axe : serious) | Moyenne | Rapport axe | – | Ouverte |
| ANO-08 | Contraste insuffisant, formulaire (1 élément) | S9 accessibilité | Mineure (axe : serious) | Basse | Rapport axe | – | Ouverte |
| ANO-09 | Upload Lost & Found sans contrôle de type ni de taille | S10, lecture de code | Critique (potentielle) | Haute | Extension prise chez le client, aucune validation | `.php` et 3 000 Ko refusés, LostFoundUploadTest 3/3 | Corrigée et retestée |
| ANO-10 | Recherche combinée au filtre de type | S10, lecture de code | À confirmer | Moyenne | – | – | Non testée |
| ANO-11 | `POST /api/animals` accessible sans authentification (EX-19) | S10, test + route:list | Critique | Haute | 201 reçu au lieu de 401 ; route sans `auth:sanctum` | 401 ; AnimalApiSecurityTest 4/4 | Corrigée et retestée |
| ANO-12 | `user_id` pris du corps de la requête : annonce créée au nom d'un autre | S10, test | Majeure | Haute | Annonce enregistrée pour l'utilisateur 2 avec le jeton de l'utilisateur 1 | `user_id` = utilisateur du jeton | Corrigée et retestée |
| ANO-13 | Pas de `max:255` sur titre et race de l'API (EX-06) | S10, lecture de code | Mineure | Moyenne | Le premier test passait à tort (le 422 venait d'un autre champ) | 256 caractères → 422 sur `titre` ; 255 → 201 | Corrigée et retestée |

## Synthèse
- 13 anomalies : 6 corrigées et retestées (ANO-02, 03, 09, 11, 12, 13), 5 ouvertes (accessibilité), 1 à confirmer (ANO-10), 1 hors exigence (ANO-01).
- Critiques : 3 (ANO-02, 09, 11), toutes corrigées.
- Semaines 6 et 8 : aucune anomalie enregistrée. Mais en S8, le test « POST sans jeton » n'avait pas été exécuté : ANO-11 est apparue en S10.

## Remarques
- ANO-02, 03 et 09 ont d'abord été identifiées par lecture de code ; seuls les tests exécutés les ont confirmées.
- Les 3 tests d'`AnimalApiTest` devenus rouges après la correction (401 reçu) vérifiaient l'ancien comportement et ont été réécrits : ce n'est pas une régression.