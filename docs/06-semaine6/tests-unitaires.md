cat > docs/06-semaine6/tests-unitaires.md <<'EOF'
# Semaine 6 — Tests unitaires automatisés

## 1. Objectif

L'objectif est de vérifier automatiquement les règles et la configuration
du modèle Animal dans l'application Patte Douce.

## 2. Environnement

- Framework : Laravel
- Langage : PHP
- Outil : PHPUnit
- Couverture : Xdebug
- Fichier testé : app/Models/Animal.php
- Classe de test : tests/Unit/AnimalTest.php

## 3. Tests réalisés

| ID | Test | Résultat |
|----|------|----------|
| TU01 | Vérifier le nom de la table animals | PASS |
| TU02 | Vérifier les attributs fillable | PASS |
| TU03 | Vérifier la relation Animal-User | PASS |
| TU04 | Vérifier la clé étrangère user_id | PASS |
| TU05 | Vérifier le modèle User associé | PASS |

## 4. Méthode Arrange – Act – Assert

Chaque test utilise trois étapes :

- Arrange : préparation des objets nécessaires.
- Act : exécution de la méthode à vérifier.
- Assert : vérification du résultat attendu.

## 5. Résultat

Les cinq tests unitaires sont réussis.

Aucune erreur n'a été détectée pendant leur exécution.
EOF