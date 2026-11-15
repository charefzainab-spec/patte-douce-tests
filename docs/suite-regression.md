# Suite de régression : Patte Douce

## Principe
La suite `Regression` regroupe les tests écrits pendant la campagne. Elle est rejouée
après chaque correction et avant toute livraison. Les tests de Laravel Breeze
(authentification, profil) restent dans la suite complète `Feature`.

## Commande
    vendor\bin\phpunit --testsuite Regression

## Contenu
| Groupe | Fichiers | Objectif |
|---|---|---|
| Contrôle d'accès (priorité 1) | AnimalAuthorizationTest, RoleAccessTest, LostFoundTest, AdminMiddlewareTest, AnimalApiTest | Propriétaire des annonces, rôle administrateur, authentification de l'API |
| Validation des données | AnimalValidationTest, PhotoUploadTest, VetValidationTest, AdminUserTest, AnimalBugsTest | Valeurs limites, champs obligatoires, types |
| Intégration et persistance | AnimalIntegrationTest | CRUD, contraintes d'intégrité |
| Affichage | PagesDisplayTest | Pages utilisateur et administrateur |
| Modèles | UserModelTest, AnimalModelTest | Hachage, relations, données de test |

## Complément hors PHPUnit (à rejouer avant livraison)
- Parcours d'interface : npx playwright test (CT-57, CT-58)
- API : collection Postman tests/api (CT-52 à CT-56, CT-16, CT-39)
- Performance : perf/liste-animaux.js et perf/accueil.js (k6)

## Quand la rejouer
- Après chaque correction d'anomalie.
- Avant chaque fusion dans la branche principale.
- Avant la décision de livraison.

## Règle
Un test en échec dû à une anomalie connue reste dans la suite : il passe au vert
quand l'anomalie est corrigée, et protège ensuite contre sa réapparition.

## État
| Date | Suite | Tests | Échecs |
|---|---|---|---|
| 15/11/2026 | Regression (avant corrections) | 72 | 18 |