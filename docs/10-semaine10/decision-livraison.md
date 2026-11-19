# Décision de livraison – Semaine 10

## 1. Critères (fixés avant les résultats)
| # | Critère | Résultat | Atteint ? |
|---|---|---|---|
| C1 | 0 anomalie critique ouverte | ANO-02 corrigée et retestée | [à confirmer] |
| C2 | 100 % des tests de régression réussis | [à compléter] | [à compléter] |
| C3 | Suite PHP sans échec | [à compléter] | [à compléter] |
| C4 | Anomalies restantes documentées avec plan de correction | Voir registre-anomalies.md | [à confirmer] |

## 2. Décision
**Go conditionnel** (proposition, à confirmer selon les résultats ci-dessus).

## 3. Arguments
1. **Résultats** : la faille critique (modification et suppression des annonces d'autrui) est corrigée et prouvée par test (3 échecs avant, 6/6 après).
2. **Couverture** : connexion, annonces, API, droits et accès protégés sont testés ; la recherche Lost & Found et l'administration ne le sont pas.
3. **Risques** : les risques restants sont documentés avec une mitigation ; aucun n'est critique.

## 4. Conditions
- Tests e2e et @regression sans échec après correction
- Test d'upload réussi (ANO-09)
- Correction ou plan daté pour l'accessibilité

## 5. Limites
Données mesurées en local uniquement ; stabilité confirmée sur peu d'exécutions.

## 6. Quand la décision change
Un échec sur C1 ou C2 donne **No-Go** jusqu'à correction.