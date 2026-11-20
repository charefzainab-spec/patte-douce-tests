# Compte rendu – Semaine 10 : campagne finale et décision de livraison

## 1. Objectif
Consolider les anomalies, corriger les plus critiques, réexécuter les tests, analyser couverture et risques, décider de la livraison.

## 2. Anomalies
19 anomalies au registre : 12 corrigées et retestées, 5 ouvertes (accessibilité), 1 à confirmer (ANO-10), 1 hors exigence (ANO-01). Les 4 critiques (ANO-02, 09, 11, 14) sont corrigées.

## 3. Avant / après
| Contrôle | Avant | Après |
|---|---|---|
| Annonces Lost & Found (droits, validation) | 3 échecs sur 4 | 6/6 |
| Upload Lost & Found | constat par lecture de code | 3/3 |
| API (jeton, utilisateur du jeton, longueur) | 2 échecs | 4/4 |
| Vétérinaires (droits, validation) | 5 échecs sur 10 | 10/10 |
| Utilisateurs (rôles, validation) | 5 échecs sur 10 | 10/10 |
| Suite PHP complète | 36 tests (S6) | 82 tests, 156 assertions, 0 échec |
| Playwright e2e | 9/9 (S9) | 9/9 |
| Régression @regression | 6/6 (S9) | 6/6 |
| Accessibilité | 5 anomalies, 61 éléments | Inchangé (non corrigées) |
| Couverture de code | 49,9 % (S6) | Non mesurée |

## 4. Couverture
Voir `matrice-couverture.md` : 11 exigences couvertes sur 22, 5 partielles, 5 non testées, 1 à vérifier.

## 5. Risques résiduels
Voir `risques-residuels.md`.

## 6. Décision
**Validation conditionnelle** (voir `decision-livraison.md`). Elle repose sur l'absence d'anomalie critique ouverte et de régression. Elle devient **Refus** si les conditions ne sont pas remplies.

## 7. Limites
Mesures en local, couverture de code non mesurée, accessibilité non corrigée, quelques exigences sans test.