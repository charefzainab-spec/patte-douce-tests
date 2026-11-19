# Bilan de campagne – Patte Douce

| Semaine | Livrable principal | Résultat |
|---|---|---|
| 1-4 | Fiche projet, risques, plan de test, référentiel, catalogue de cas | Cadrage |
| 5 | Tests exploratoires, fiches d'anomalies | 3 anomalies (ANO-01 à ANO-03) |
| 6 | Tests unitaires et Feature, couverture | 36 réussis, 0 échec, couverture 49,9 % |
| 7 | [à compléter] | [à compléter] |
| 8 | Analyse API | Aucune anomalie |
| 9 | Accessibilité, performance, régression | 5 anomalies ; régression 6/6 ; e2e 9/9 |
| 10 | Campagne finale | Voir ci-dessous |

## Chiffres de la campagne
- Anomalies consolidées : 10 (S5 : 3, S9 : 5, S10 : 2)
- Corrigées et retestées : ANO-02, ANO-03 ; ANO-09 [à confirmer]
- Restantes : [à compléter après relance]

## Leçons apprises
- Un échec de test avant correction est une preuve, pas un problème.
- La lecture de code identifie, seul le test exécuté confirme.
- `phpunit.xml` doit isoler la base de test avant d'utiliser RefreshDatabase.
- Les échecs de la semaine 9 venaient des tests, ceux de la semaine 10 de vraies failles.