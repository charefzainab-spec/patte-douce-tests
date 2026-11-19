# Registre des anomalies – Patte Douce (Semaine 10)

## 1. Objectif
Consolider en un seul tableau toutes les anomalies relevées pendant la campagne (semaines 5 à 9), avec leur sévérité, leur priorité et leur statut, afin de préparer la décision de livraison.

## 2. Échelles utilisées

**Sévérité** (gravité technique) :
- **Critique** : faille de sécurité, perte de données ou fonctionnalité principale inutilisable
- **Majeure** : fonctionnalité importante dégradée ou donnée non contrôlée
- **Mineure** : défaut de confort, d'accessibilité ou d'évolution sans blocage fonctionnel

**Priorité** (urgence de correction) : Haute / Moyenne / Basse

**Statut** : À vérifier (relevée à la lecture du code, pas encore confirmée par un test) / Ouverte (confirmée par un test) / Corrigée / Corrigée et retestée

## 3. Registre

| ID | Description | Source | Module / page | Sévérité | Priorité | Statut |
|---|---|---|---|---|---|---|
| ANO-01 | La table `lost_founds` n'a pas de champ statut pour suivre le cycle de vie d'une annonce | S5, fiches-anomalies | Lost & Found | Mineure | Moyenne | À vérifier |
| ANO-02 | Pas de vérification de propriété dans `update` et `destroy` : un autre utilisateur pourrait modifier ou supprimer une annonce | S5, fiches-anomalies | Lost & Found | Critique (si confirmée) | Haute | À vérifier |
| ANO-03 | La méthode `store` utilise les données de la requête sans validation explicite | S5, fiches-anomalies | Lost & Found | Majeure (si confirmée) | Moyenne | À vérifier |
| ANO-04 | Champ photo du formulaire sans label (règle axe `label`, impact critical) | S9, accessibilité | `/animals/create` | Majeure | Haute | Ouverte |
| ANO-05 | Contraste de couleurs insuffisant, 11 éléments (ex. lien du menu « register ») | S9, accessibilité | `/` | Mineure | Moyenne | Ouverte |
| ANO-06 | Contraste de couleurs insuffisant, 4 éléments (ex. sous-titre de l'en-tête) | S9, accessibilité | `/login` | Mineure | Moyenne | Ouverte |
| ANO-07 | Contraste de couleurs insuffisant, 44 éléments (ex. lien actif du menu) | S9, accessibilité | `/animals` | Mineure | Moyenne | Ouverte |
| ANO-08 | Contraste de couleurs insuffisant sur un bouton | S9, accessibilité | `/animals/create` | Mineure | Basse | Ouverte |

Sévérité des anomalies d'accessibilité : proposition de l'équipe de test. L'outil axe-core les classe « serious » (contraste) et « critical » (label), ce qui peut justifier de relever la sévérité du contraste si le public cible inclut des personnes malvoyantes.

## 4. Points à vérifier (non enregistrés comme anomalies)

| Observation | Source | Action |
|---|---|---|
| La balise `<html>` d'une page (dashboard) porte `lang="en"` alors que le contenu est en français | S9, journal d'erreur Playwright | Vérifier le gabarit Blade principal ; si confirmé, créer ANO-09 |
| Les routes API exposées sont limitées à 4 (liste, détail, création, utilisateur) ; pas de modification ni de suppression via l'API | S8, analyse-api | Question de couverture, pas une anomalie |

## 5. Éléments exclus du registre
- Les 3 échecs de la suite de régression (S9) étaient des erreurs dans les tests eux-mêmes (locator, URL attendue, timeout), corrigées ; ce ne sont pas des défauts de l'application.
- Semaine 6 : 36 tests réussis, 0 échec, donc aucune anomalie issue de l'exécution automatisée. La couverture de 49,9 % est traitée comme un risque (voir risques résiduels), pas comme une anomalie.
- Semaine 8 : aucune anomalie documentée dans `analyse-api.md`.

## 6. Synthèse (avant correction)

| Statut | Nombre |
|---|---|
| À vérifier | 3 (ANO-01, ANO-02, ANO-03) |
| Ouverte | 5 (ANO-04 à ANO-08) |
| Corrigée | 0 |
| **Total** | **8** |

Anomalies à traiter en premier : ANO-02 (à confirmer d'urgence par un test à deux utilisateurs), ANO-04 (label), puis ANO-03.

## 7. Mise à jour après correction
[À compléter après la réexécution des tests : statut final de chaque anomalie, date et test de preuve.]
