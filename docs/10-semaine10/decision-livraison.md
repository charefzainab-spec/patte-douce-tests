# Décision de livraison – Semaine 10

## 1. Critères (plan de test, semaine 2)
| # | Critère | Seuil | Résultat | Atteint ? |
|---|---|---|---|---|
| C1 | Anomalies critiques ou bloquantes ouvertes | 0 | ANO-02 et ANO-11 corrigées et retestées | Oui |
| C2 | Tests de régression réussis | 100 % | 6/6 | Oui |
| C3 | Suite PHP sans échec | 0 échec | 62 tests, 0 échec | Oui |
| C4 | Anomalies documentées (ID, sévérité, preuve) | 100 % | Registre à jour | Oui |
| C5 | Couverture de lignes | ≥ 70 % | [à compléter, 49,9 % en S6] | [à compléter] |
| C6 | Cas de test prévus exécutés | 100 % | [à compléter, voir matrice] | [à compléter] |

## 2. Décision
**Validation conditionnelle** (proposition, à confirmer selon C2, C5 et C6).

Un critère non atteint ou non mesuré (C5, C6) empêche une validation pleine selon le plan. S'il reste une anomalie critique ouverte ou un échec de régression, la décision devient **Refus**.

## 3. Arguments
1. **Résultats** : les deux failles critiques (modification ou suppression des annonces d'autrui, création d'annonce par l'API sans authentification) sont corrigées et prouvées (avant : tests en échec ; après : 62 tests verts).
2. **Couverture** : connexion, annonces, API, droits Lost & Found et upload sont testés. Les vétérinaires, la gestion des utilisateurs et la recherche ne le sont pas encore.
3. **Risques** : les risques restants sont documentés avec une mitigation ; aucun n'est critique.

## 4. Conditions de livraison
- Tests e2e et suite @regression sans échec après correction
- Couverture mesurée, ou limite documentée
- Tests des droits sur les vétérinaires et les utilisateurs (EX-15, EX-17)
- Plan daté pour les anomalies d'accessibilité et ANO-10

## 5. Limites
Mesures de performance en local uniquement ; stabilité de la régression confirmée sur peu d'exécutions ; couverture [à compléter].