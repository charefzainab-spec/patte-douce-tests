
# Semaine 7 — Tests d'intégration

## 1. Objectif

L'objectif de cette étape est de vérifier le bon fonctionnement
des opérations CRUD et l'interaction avec la base de données
dans le projet Patte Douce.

Les tests permettent de vérifier la persistance des données,
les modifications, les suppressions et les contraintes
d'intégrité référentielle.

## 2. Environnement de test

- Projet : Patte Douce (Animal Adoption)
- Framework : Laravel
- Langage : PHP
- Outil : PHPUnit
- Classe de test : AnimalDatabaseIntegrationTest
- Fichier : tests/Feature/AnimalDatabaseIntegrationTest.php

## 3. Tests d'intégration réalisés

| ID | Test | Description | Résultat |
|----|------|-------------|----------|
| TI01 | Persistance | Vérifier l'enregistrement d'un animal | PASS |
| TI02 | Modification | Vérifier la mise à jour d'un animal | PASS |
| TI03 | Suppression | Vérifier la suppression d'un animal | PASS |
| TI04 | Clé étrangère | Refuser un utilisateur inexistant | PASS |
| TI05 | Suppression en cascade | Supprimer les animaux avec leur utilisateur | PASS |

## 4. Vérification des opérations CRUD

### Create
Création d'un animal avec Animal::factory().
Vérification de son existence dans la table animals.

### Read
Vérification de la présence des données enregistrées
avec assertDatabaseHas().

### Update
Modification du titre et de l'âge de l'animal.
Vérification des nouvelles valeurs dans la base.

### Delete
Suppression de l'animal.
Vérification de son absence avec assertDatabaseMissing().

## 5. Résultats

Les cinq tests d'intégration ont réussi.

- Tests réussis : 5
- Tests échoués : 0
- Assertions : 5

## 6. Conclusion

Les tests confirment le bon fonctionnement des opérations
de création, de modification et de suppression des animaux.
Les contraintes d'intégrité testées fonctionnent également
comme prévu.
