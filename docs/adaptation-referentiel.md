# Adaptation du référentiel : de RéclaGest à Patte Douce

Le sujet autorise une application existante à condition d'adapter les règles métier
et de documenter les différences. Les règles ci-dessous sont extraites du code réel
(contrôleurs, routes, migrations).

## Règles métier de référence
| ID | Règle | Source |
|---|---|---|
| RG-01 | Titre d'annonce obligatoire, 255 caractères maximum, pas de minimum | AnimalController::store |
| RG-02 | Race obligatoire, 255 caractères maximum | AnimalController::store |
| RG-03 | Âge obligatoire, entier supérieur ou égal à 0, sans maximum | AnimalController::store |
| RG-04 | Description obligatoire, sans limite de longueur | AnimalController::store |
| RG-05 | Téléphone obligatoire, 20 caractères maximum | AnimalController::store |
| RG-06 | Photo facultative : jpg, jpeg, png ou webp, 2 Mo maximum | AnimalController::store |
| RG-07 | Une annonce est créée avec le statut `adoption` et liée à l'utilisateur connecté | AnimalController::store |
| RG-08 | Les routes /animals, /lost-found, /vet exigent d'être connecté | routes/web.php |
| RG-09 | Les routes /admin et /users sont réservées à l'administrateur | routes/web.php |
| RG-10 | Recherche d'animaux par titre ou race ; filtre d'âge bébé 0-1, jeune 1-5, adulte 5-10, senior à partir de 10 | AnimalController::index |
| RG-11 | Liste des animaux paginée par 9, plus récents d'abord | AnimalController::index |
| RG-12 | API : GET /api/animals, GET /api/animals/{id} (404 si absent), POST avec titre, description, âge, race, user_id existant → 201 | AnimalApiController |
| RG-13 | Un non-administrateur qui tente d'accéder à /admin est redirigé vers / | AdminMiddleware |
| RG-14 | Vétérinaire : nom, email, téléphone, adresse obligatoires | VeterinaireController::store |
| RG-15 | Lost & Found : type, description, localisation, contact obligatoires en base | migration lost_founds |
| RG-16 | Lost & Found : recherche texte et filtre de type | LostFoundController::index |
| RG-17 | Chaque utilisateur a un rôle : `user` par défaut ou `admin` | migration users |
| EX-A | Exigence du cahier des charges : un utilisateur ne modifie et ne supprime que ses propres annonces | cahier des charges 2.2 A |

## Différences avec le sujet RéclaGest
| Sujet | Patte Douce |
|---|---|
| Titre de 5 à 100 caractères | Titre jusqu'à 255 caractères, sans minimum |
| Description de 10 à 1000 caractères | Description obligatoire, sans limite |
| Statuts NOUVELLE → EN_COURS → RESOLUE → CLOTUREE | Statut `adoption` ou `perdu`, sans transition |
| Client, agent, administrateur | Utilisateur et administrateur |
| Affectation d'une réclamation à un agent | Gestion des vétérinaires par l'administrateur |
| Historique des changements | Non implémenté |
| API REST complète | 3 routes sur les animaux |

## Ambiguïtés relevées
- Les âges 1, 5 et 10 appartiennent-ils à une ou deux catégories de filtre ? (RG-10)
- Un utilisateur peut-il supprimer l'annonce d'un autre ? Le cahier des charges dit non, le code autorise.
- Un simple utilisateur peut-il gérer les vétérinaires ? Le cahier des charges réserve cela à l'administrateur.
- Lost & Found et vétérinaires : aucune limite de longueur ni format d'email n'est précisé.