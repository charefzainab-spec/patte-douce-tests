# Analyse et cartographie des risques

## 1. Introduction
Un risque est un événement possible qui pourrait nuire à la qualité du logiciel. Ce n'est pas un bug constaté : c'est une hypothèse qui guide la priorité des tests. Les scores ci-dessous ne signifient pas que ces anomalies ont déjà été observées.

## 2. Échelles
- **Probabilité (P) :** 1 = faible, 2 = moyenne, 3 = élevée
- **Impact (I) :** 1 = mineur, 2 = gênant, 3 = grave (sécurité, perte ou corruption de données)
- **Criticité = P × I**
- **Niveaux :** 6 à 9 = Haute, 3 à 4 = Moyenne, 1 à 2 = Faible

## 3. Registre des risques
| ID | Risque | Module | P | I | Criticité | Niveau |
|---|---|---|---|---|---|---|
| R01 | Un visiteur non connecté crée ou modifie des données via l'API | F08 | 3 | 3 | 9 | Haute |
| R02 | Un utilisateur modifie ou supprime l'annonce d'un autre | F02 | 3 | 3 | 9 | Haute |
| R03 | Un utilisateur accède aux fonctions admin | F06, F07 | 2 | 3 | 6 | Haute |
| R04 | Absence de validation : données invalides en base | F02, F05, F06 | 3 | 2 | 6 | Haute |
| R05 | Upload de fichier trop lourd ou dangereux | F03 | 2 | 3 | 6 | Haute |
| R06 | Inscription avec un rôle admin | F01 | 2 | 3 | 6 | Haute |
| R07 | Recherche/filtres en erreur ou résultats faux | F04 | 2 | 2 | 4 | Moyenne |
| R08 | Pages en erreur 500 | Général | 2 | 2 | 4 | Moyenne |
| R09 | [risque trouvé par toi en explorant l'app] | [..] | [..] | [..] | [..] | [..] |

Ajoute au moins 2 risques que tu as trouvés toi-même.

## 4. Priorisation
Les risques de criticité 6 et plus sont testés en premier (tests API, tests d'autorisation, valeurs limites). Les risques moyens sont couverts ensuite par des tests fonctionnels et exploratoires.

## 5. Lien avec les tests prévus
| Risque | Type de test prévu |
|---|---|
| R01 | tests API sans token (401) |
| R02, R03 | tests d'autorisation par rôle (403) |
| R04 | valeurs limites, tests de validation (422) |
| R05 | tests d'upload (taille, format) |
| R06 | test d'inscription avec champ role |
| R07, R08 | tests fonctionnels et exploratoires |
