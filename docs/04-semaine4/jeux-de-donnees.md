# Jeux de données de test

## Projet : Patte Douce

**Version :** 1.0  
**Date :** 18/11/2026

## 1. Objectif

Ce document présente les données fictives utilisées pour préparer les tests fonctionnels de l'application Patte Douce.

## 2. Comptes utilisateurs

| ID | Nom | E-mail | Mot de passe de test | Rôle |
|---|---|---|---|---|
| U01 | Test User A | usera@test.local | Test1234! | Utilisateur |
| U02 | Test User B | userb@test.local | Test1234! | Utilisateur |
| U03 | Test Admin | admin@test.local | Admin1234! | Administrateur |

Les mots de passe sont fictifs et réservés à l'environnement de test.

## 3. Données pour les animaux

| ID | Nom | Espèce | Âge | Localisation | Utilisateur |
|---|---|---|---|---|---|
| A01 | Max | Chien | 3 | Sousse | U01 |
| A02 | Luna | Chat | 2 | Monastir | U02 |
| A03 | Coco | Oiseau | 0 | Mahdia | U01 |
| A04 | Rex | Chien | -1 | Sousse | U01 |

A04 représente une donnée invalide destinée à vérifier le refus d'un âge négatif. Elle ne doit pas être insérée directement dans la base de données si la contrainte l'interdit.

## 4. Données pour les annonces Lost & Found

| ID | Type | Description | Localisation | Contact |
|---|---|---|---|---|
| LF01 | Perdu | Chat blanc disparu | Sousse | 20111222 |
| LF02 | Trouvé | Chien trouvé près du parc | Monastir | 22123456 |
| LF03 | Perdu | Description vide | Mahdia | 20123456 |

LF03 est destiné à vérifier la validation d'une description obligatoire.

## 5. Données invalides complémentaires

| ID | Champ | Valeur | Objectif |
|---|---|---|---|
| D01 | Nom | Vide | Tester un champ obligatoire |
| D02 | E-mail | usera@test.local | Tester l'unicité de l'e-mail |
| D03 | E-mail | usertest | Tester le format de l'e-mail |
| D04 | Âge | -1 | Tester une valeur négative |
| D05 | Description | Vide | Tester la validation |
| D06 | Mot de passe | Incorrect123 | Tester l'échec de connexion |

## 6. Règles d'utilisation

- Utiliser uniquement des données fictives.
- Réinitialiser les données de test lorsque cela est nécessaire.
- Ne pas utiliser les comptes ou données de production.
- Conserver les résultats de chaque exécution.
- Vérifier les règles réelles de validation avant de considérer une donnée comme invalide.

## 7. Conclusion

Ces jeux de données permettent de préparer des scénarios positifs et négatifs et de répéter les tests dans des conditions comparables.