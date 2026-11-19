# Bilan de campagne – Patte Douce

## Chiffres
| Indicateur | Valeur |
|---|---|
| Tests PHP | 36 (S6), 41 (S7), 62 (S10), 0 échec |
| Tests e2e Playwright | 9/9, régression 6/6 (deux passages après correction) |
| Anomalies | 13 : 6 corrigées et retestées, 5 ouvertes (accessibilité), 1 à confirmer, 1 hors exigence |
| Anomalies critiques | 3, toutes corrigées |
| Couverture de code | 49,9 % (S6), non mesurée en S10 |

## Ce qui a bien fonctionné
- Les tests d'autorisation ont trouvé 2 failles critiques (annonces d'autrui, API sans authentification) que les tests précédents ne cherchaient pas.
- Le principe « test en échec avant, au vert après » donne une preuve claire de chaque correction.

## Limites
- Vétérinaires, gestion des utilisateurs, recherche et propriété des annonces d'animaux : non testés.
- Couverture de code non mesurée en S10.
- Mesures de performance en local uniquement.
- Les tests e2e créent des données dans l'application.

## Leçons apprises
- Un script écrit mais non exécuté ne prouve rien : en S8, le test « POST sans jeton » n'avait pas été exécuté et ANO-11 est restée cachée.
- Un test qui passe n'est pas forcément un bon test : le premier test de `max:255` passait pour une mauvaise raison (ANO-13).
- Un échec avant correction est une preuve utile.
- Les anciens tests qui vérifient l'ancien comportement doivent être réécrits après une correction légitime.