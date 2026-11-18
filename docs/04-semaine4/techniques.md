# Techniques de conception des cas de test

## Projet : Patte Douce

**Version :** 1.0  
**Date :** 18/11/2026

## 1. Objectif

Ce document présente les techniques de conception utilisées pour préparer les cas de test de l'application Patte Douce.

Les techniques appliquées sont :
- Les partitions d'équivalence.
- Les valeurs limites.
- Les tables de décision.

## 2. Partitions d'équivalence

Les partitions d'équivalence permettent de regrouper les données en catégories qui doivent produire un comportement similaire.

### Exemple 1 : Adresse e-mail

| Partition | Exemple | Résultat attendu |
|---|---|---|
| E-mail valide et unique | test1@test.local | Accepté |
| E-mail déjà utilisé | usera@test.local | Refusé |
| E-mail invalide | testemail | Refusé |
| E-mail vide | Champ vide | Refusé |

### Exemple 2 : Âge de l'animal

| Partition | Exemple | Résultat attendu |
|---|---|---|
| Âge valide | 3 | Accepté |
| Âge égal à zéro | 0 | Accepté si autorisé par la règle métier |
| Âge négatif | -1 | Refusé |
| Âge non numérique | abc | Refusé |

## 3. Valeurs limites

Les valeurs limites permettent de vérifier le comportement de l'application aux frontières des valeurs autorisées.

### Exemple : Âge de l'animal

| Valeur testée | Objectif |
|---|---|
| -1 | Vérifier le refus d'un âge négatif |
| 0 | Vérifier la limite minimale |
| 1 | Vérifier une valeur juste supérieure à la limite minimale |
| 18 | Vérifier une valeur élevée plausible |
| 19 | Vérifier le comportement au-dessus de 18, si cette limite est confirmée |

**Remarque :** La limite maximale de l'âge doit être confirmée à partir des exigences métier et du code de l'application. La valeur 18 est ici un exemple de test, pas une règle confirmée.

## 4. Table de décision

La table suivante vérifie les conditions d'accès à une page réservée à l'administration.

| Utilisateur connecté ? | Rôle administrateur ? | Accès autorisé ? |
|---|---|---|
| Non | Non | Non |
| Oui | Non | Non |
| Oui | Oui | Oui |

Cette table permet de vérifier que seuls les administrateurs connectés peuvent accéder aux fonctionnalités réservées.

## 5. Conclusion

Les partitions d'équivalence, les valeurs limites et les tables de décision permettent de concevoir des cas de test couvrant les données valides, invalides et les différentes conditions d'accès.