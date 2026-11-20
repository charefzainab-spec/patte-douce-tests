# Décision de livraison – Semaine 10

## 1. Critères (plan de test, semaine 2)
| # | Critère | Seuil | Résultat | Atteint ? |
|---|---|---|---|---|
| C1 | Anomalies critiques ou bloquantes ouvertes | 0 | 4 critiques (ANO-02, 09, 11, 14), toutes corrigées et retestées | Oui |
| C2 | Tests de régression réussis | 100 % | 6/6 | Oui |
| C3 | Suite PHP sans échec | 0 échec | 82 tests, 0 échec | Oui |
| C4 | Anomalies documentées (ID, sévérité, preuve) | 100 % | 19 anomalies au registre | Oui |
| C5 | Couverture de lignes | ≥ 70 % | Non mesurée en S10 (49,9 % en S6) | Non démontré |
| C6 | Cas de test prévus exécutés | 100 % | Les exigences de sécurité sont exécutées ; 5 exigences ne le sont pas (voir matrice) | Non |

## 2. Décision
**Validation conditionnelle.**

Les 4 critères de sécurité (C1 à C4) sont atteints. Les critères C5 et C6 ne le sont pas, ce qui interdit une validation pleine selon le plan. Il reste des anomalies d'accessibilité ouvertes. La décision devient **Refus** si l'une des conditions ci-dessous échoue.

## 3. Arguments
1. **Résultats** : les 4 failles critiques (annonces d'autrui, upload, API sans authentification, gestion des vétérinaires par un utilisateur simple) sont corrigées et prouvées par des tests : avant, des tests en échec ; après, 82 tests verts et 9/9 en e2e.
2. **Couverture** : les exigences de sécurité (R01 à R03) sont couvertes. Non testés : propriété des annonces d'animaux, recherche, rôle imposé à l'inscription.
3. **Risques** : les risques restants sont documentés avec une mitigation ; aucun n'est critique.

## 4. Conditions de livraison
- Mesurer la couverture de code, ou assumer par écrit que le seuil de 70 % n'est pas démontré
- Tester la propriété des annonces d'animaux (EX-10) et la recherche (EX-14)
- Corriger l'accessibilité (ANO-04 en priorité) ou fournir un plan daté
- Aucun échec en régression après ces changements

## 5. Limites
Mesures en local ; couverture de code non mesurée ; accessibilité non corrigée ; propriété des annonces d'animaux non testée.