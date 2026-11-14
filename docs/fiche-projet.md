# Fiche projet : Patte Douce

## 1. Système testé
Patte Douce est une plateforme web de gestion et d'adoption d'animaux domestiques.
Elle remplace l'application RéclaGest proposée dans le sujet (application existante
autorisée, avec adaptation des règles métier : voir adaptation-referentiel.md).

## 2. Acteurs
| Acteur | Droits |
|---|---|
| Visiteur | Page d'accueil, inscription, connexion |
| Utilisateur (`role = user`) | Gère son profil, ses annonces d'animaux et ses annonces Lost & Found, consulte les vétérinaires |
| Administrateur (`role = admin`) | Gère les utilisateurs, les animaux, les annonces Lost & Found et les vétérinaires, consulte les statistiques |

## 3. Modules et correspondance avec le sujet
| Module Patte Douce | Équivalent RéclaGest |
|---|---|
| Authentification (inscription, connexion, mot de passe) | Authentification |
| Administration des utilisateurs | Gestion des utilisateurs |
| Annonces d'animaux (CRUD, recherche, filtre d'âge) | Réclamations + Recherche |
| Lost & Found (CRUD, recherche, filtre de type) | Réclamations |
| Vétérinaires (CRUD admin, consultation) | Affectation (le plus proche) |
| API REST `/api/animals` | API REST |
| Base MySQL | Persistance |

## 4. Environnement technique
- Backend : Laravel X.X, PHP X.X, architecture MVC
- Base de données : MySQL (base de test séparée : `animal_adoption_test`)
- Interface : Blade, HTML, CSS, JavaScript
- API : routes `routes/api.php`, Laravel Sanctum
- Serveur local : Laragon, système Windows
- Tests : PHPUnit (intégré à Laravel), dépôt GitHub `patte-douce-tests`

## 5. Définitions
- **Erreur** : action humaine incorrecte (ex. : oublier de vérifier le propriétaire d'une annonce).
- **Défaut** : conséquence de l'erreur dans le code (ex. : `destroy()` sans contrôle du propriétaire).
- **Défaillance** : comportement incorrect observé à l'exécution (ex. : l'annonce d'un autre est supprimée).
- **Vérification** : l'application est-elle construite correctement (conforme à sa spécification) ?
- **Validation** : l'application répond-elle au besoin réel de l'utilisateur ?

## 6. État de départ (avant la campagne)
- 31 tests existants, tous réussis. Ils viennent de Laravel Breeze (authentification, profil)
  et d'un premier fichier `AnimalIntegrationTest` (6 tests).
- Preuve : `docs/resultats-baseline.txt` (si ce fichier existe).

## 7. Différences avec le sujet RéclaGest
- Pas de cycle de vie NOUVELLE → EN_COURS → RESOLUE → CLOTUREE : le statut d'un animal
  est un `enum('adoption','perdu')` sans transition.
- Pas de bornes 5-100 / 10-1000 : le titre est limité à 255 caractères, sans minimum.
- Rôles : utilisateur et administrateur, pas d'agent.
- L'API REST ne couvre que les animaux (3 routes).