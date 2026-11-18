Analyse de l'API REST — Patte Douce
1. Objectif

L'objectif de cette semaine est de tester l'API REST de l'application Patte Douce afin de vérifier le bon fonctionnement des routes, les méthodes HTTP, les réponses JSON et les codes de statut.

2. Environnement de test
Application : Patte Douce
Framework : Laravel
Langage : PHP
Outil de test : Postman
Base de données : MySQL
Authentification : Laravel Sanctum
URL de base : http://127.0.0.1:8000
3. Routes API disponibles
Méthode	Route	Description
GET	/api/animals	Afficher les animaux
GET	/api/animals/{id}	Afficher un animal
POST	/api/animals	Créer un animal
GET	/api/user	Afficher l'utilisateur connecté
4. Formats des réponses

Les réponses de l'API utilisent le format JSON.

Les requêtes utilisent les en-têtes suivants :

Accept: application/json
Content-Type: application/json
5. Codes HTTP vérifiés
Code	Signification
200	Requête réussie
201	Ressource créée
401	Utilisateur non authentifié
404	Ressource introuvable
422	Erreur de validation
6. Conclusion

Les premiers tests Postman ont confirmé le bon fonctionnement des opérations de consultation et de création des animaux ainsi que la gestion des ressources inexistantes.

L'authentification avec Sanctum a également été vérifiée avec succès.