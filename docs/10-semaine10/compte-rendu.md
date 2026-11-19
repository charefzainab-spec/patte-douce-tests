# Compte rendu – Semaine 10 : campagne finale et décision de livraison

## 1. Objectif
Consolider les anomalies, corriger les plus critiques, réexécuter les tests, analyser couverture et risques, décider de la livraison.

## 2. Anomalies
13 anomalies au registre (`registre-anomalies.md`) : 6 corrigées et retestées, 5 ouvertes (accessibilité), 1 à confirmer (ANO-10), 1 hors exigence (ANO-01). Les 3 anomalies critiques (ANO-02, 09, 11) sont corrigées.

## 3. Avant / après
| Contrôle | Avant | Après |
|---|---|---|
| LostFoundSecurityTest | 3 échecs sur 4 | 6/6 |
| LostFoundUploadTest | – | 3/3 |
| AnimalApiSecurityTest | 2 échecs (201 au lieu de 401 ; `user_id` du body utilisé) | 4/4 |
| Suite PHP | 36 tests (S6) | 62 tests, 0 échec |
| Playwright e2e | 9/9 (S9) | 9/9 |
| Régression @regression | 6/6 (S9) | 6/6 (deux passages) |
| Accessibilité | 5 anomalies, 61 éléments | Inchangé (non corrigées) |
| Couverture de code | 49,9 % (S6) | Non mesurée |

## 5. Couverture
Voir `matrice-couverture.md`. Non testés : vétérinaires, gestion des utilisateurs, recherche, propriété des annonces d'animaux.

## 6. Risques résiduels
Voir `risques-residuels.md`. Principal : droits sur les vétérinaires et les utilisateurs non testés.

## 7. Décision
**Validation conditionnelle** (voir `decision-livraison.md`). Le plan de test exige une couverture de 70 % et 100 % des cas exécutés ; ces seuils ne sont pas démontrés. La décision se justifie par l'absence d'anomalie critique ouverte et de régression, et par des risques documentés. Elle devient **Refus** si l'une des conditions ci-dessous échoue.

Conditions de livraison :
- Tests d'autorisation des vétérinaires et des utilisateurs, verts
- Mesure de la couverture, ou limite assumée
- Plan daté pour l'accessibilité et ANO-10

## 8. Limites
Mesures en local, couverture non mesurée, modules non testés.