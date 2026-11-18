Rapport d'exécution des tests API
1. Introduction

Ce rapport présente les résultats des tests de l'API REST de l'application Patte Douce réalisés avec Postman.

2. Environnement
Laravel
PHP
MySQL
Postman
Laravel Sanctum
3. Résultats des tests
Test	Méthode	Résultat	Statut
Liste des animaux	GET	200 OK	PASS
Détail d'un animal	GET	200 OK	PASS
Animal inexistant	GET	404 Not Found	PASS
Création d'un animal	POST	201 Created	PASS
Utilisateur connecté	GET	200 OK	PASS
Utilisateur non connecté	GET	À exécuter	Non testé
4. Analyse des résultats

Les tests réalisés ont permis de vérifier :

La récupération de la liste des animaux.
La récupération des détails d'un animal.
La gestion d'un identifiant inexistant.
La création d'un animal dans la base de données.
L'accès aux informations de l'utilisateur authentifié avec Sanctum.
5. Preuves des tests

Les captures d'écran des résultats Postman sont enregistrées dans :

docs/08-semaine8/preuves/

Les preuves prévues sont :

get-animals.png
get-animal.png
get-404.png
post-animal.png
auth-200.png
auth-401.png
6. Conclusion

Les tests API exécutés ont donné les résultats attendus.

L'API permet actuellement de consulter et de créer des animaux et de protéger l'accès aux informations de l'utilisateur connecté.

Des tests négatifs supplémentaires sont prévus pour compléter la validation.
