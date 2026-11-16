# Plan de test : Patte Douce

Version 1.0

## 1. Objectif
Évaluer la qualité de l'application Patte Douce (Laravel 10.50.2, PHP 8.1.10),
détecter les anomalies et décider de sa livraison : validation, validation conditionnelle
ou refus de livraison.

## 2. Références
- Cahier des charges Patte Douce
- Sujet du mini-projet (Test et validation d'une application web)
- docs/fiche-projet.md, docs/risques.md, docs/perimetre.md,
  docs/adaptation-referentiel.md

## 3. Niveaux de test
| Niveau | Cible | Outil | Dossier |
|---|---|---|---|
| Unitaire | Règles de validation et logique isolée, sans interface | PHPUnit | tests/Unit |
| Intégration | CRUD, persistance, contraintes d'intégrité en base | PHPUnit + base de test | tests/Feature |
| Système (API) | Routes /api/animals : méthodes, codes HTTP, JSON, authentification | Postman | tests/api |
| Système (interface) | Parcours critique : connexion, création d'une annonce, vérification | Playwright | tests/e2e |
| Non fonctionnel | Performance de la liste des animaux | k6 | perf |
| Acceptation | Vérification des critères d'acceptation des exigences | Manuel + matrice | docs |

## 4. Environnement
- Windows, Laragon, PHP 8.1.10, Laravel 10.50.2, MariaDB 10.11.16
- Base de test séparée : animal_adoption_test, réinitialisée par RefreshDatabase
- Fichier .env.testing, non versionné
- Dépôt GitHub : patte-douce-tests
- Données de test : factories Laravel (User, Animal), création directe pour les autres modèles

## 5. Techniques de conception
- Partitions d'équivalence et valeurs limites (titre 255/256, âge -1/0, téléphone 20/21, photo 2 Mo)
- Table de décision (rôle × action × propriétaire de l'annonce)
- Transitions d'état (statut des annonces, voir semaine 5)
- Tests exploratoires (sessions de 45 minutes avec un objectif)

## 6. Priorités (issues de risques.md)
1. Contrôle d'accès : R-01, R-02, R-03 (criticité 9)
2. Validation des données : R-04, R-07, R-08
3. Rôle administrateur : R-06
4. Recherche et filtres : R-05
5. Fiabilité : R-10
6. Sécurité de base : R-09

## 7. Critères d'entrée
- L'application démarre et la base de test est migrée.
- `php artisan test` s'exécute sans erreur d'environnement.
- Le référentiel des règles métier (adaptation-referentiel.md) est rédigé.
- Les outils nécessaires sont installés.

## 8. Critères de sortie
- 100 % des cas de test prévus sont exécutés, avec preuves.
- 100 % des tests de priorité 1 (contrôle d'accès) passent après correction.
- Aucune anomalie critique ou majeure ouverte.
- Couverture de lignes des contrôleurs AnimalController, LostFoundController et
  VeterinaireController d'au moins 70 %.
- Suite de régression exécutée sans échec après la dernière correction.
- Toutes les anomalies sont enregistrées avec sévérité, priorité et preuve.

## 9. Classification des anomalies
| Gravité | Définition |
|---|---|
| Critique | Faille de sécurité ou perte de données, exploitable sans compte ou sans droit |
| Majeure | Une fonction essentielle est incorrecte ou plante (erreur 500, droits non respectés) |
| Mineure | Défaut de validation ou comportement incorrect sans impact sur les droits ni les données |

| Priorité | Délai de correction |
|---|---|
| Haute | Avant toute livraison |
| Moyenne | Avant la livraison, ou acceptée avec condition écrite |
| Basse | Peut suivre la livraison |

## 10. Règles de décision
- **Validation** : tous les critères de sortie sont satisfaits.
- **Validation conditionnelle** : aucune anomalie critique ouverte, quelques anomalies
  majeures ou mineures ouvertes avec risques explicités et conditions de livraison écrites.
- **Refus de livraison** : au moins une anomalie critique ouverte, ou une exigence
  essentielle non satisfaite (contrôle d'accès).

## 11. Gestion des anomalies et suites de régression
- Une anomalie est déclarée seulement si un test l'a reproduite et qu'une preuve est conservée
  dans docs/preuves.
- Chaque anomalie est enregistrée dans docs/registre-anomalies.md et dans une Issue GitHub.
- Les tests des anomalies restent dans le dépôt : en échec avant correction, ils passent
  après, et deviennent des tests de régression.
- La suite de régression regroupe les tests de priorité 1 et ceux des anomalies corrigées.

## 12. Calendrier
| Semaine | Thème | Livrable |
|---|---|---|
| 1 | Compréhension et risques | fiche-projet, risques, périmètre |
| 2 | Stratégie et plan de test | plan-de-test, dépôt organisé |
| 3 | Exigences et traçabilité | exigences, critères d'acceptation, matrice |
| 4 | Conception des cas de test | catalogue de 15 cas ou plus, jeux de données |
| 5 | Transitions d'état, exploratoire | diagramme d'états, premières anomalies |
| 6 | Tests unitaires | 5 tests unitaires ou plus, rapport |
| 7 | Intégration et base de données | 3 tests d'intégration ou plus, preuves |
| 8 | API REST | collection Postman, rapport |
| 9 | Interface et non fonctionnel | scénario Playwright, test k6, suite de régression |
| 10 | Campagne finale et décision | bilan, couverture, décision de livraison |

## 13. Responsabilités
(Travail individuel ou en binôme : indiquer ici qui fait quoi.)