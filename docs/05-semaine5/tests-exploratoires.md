3. Tests exploratoires
3.1 Objectif

Les tests exploratoires permettent de découvrir des anomalies fonctionnelles, des problèmes de sécurité et des comportements inattendus dans le module Lost & Found.

3.2 Environnement de test
Application : Patte Douce
Framework : Laravel
Serveur local : Laragon
Navigateur : Google Chrome
Module testé : Lost & Found
Base de données : MySQL
3.3 Scénarios de tests
TEST-01 : Création d'une annonce
Acteur : Utilisateur connecté.
Action : Créer une annonce avec des informations valides.
Résultat attendu : L'annonce est enregistrée et affichée.
TEST-02 : Création avec champs vides
Acteur : Utilisateur connecté.
Action : Soumettre le formulaire sans remplir les champs obligatoires.
Résultat attendu : Les erreurs de validation sont affichées.
TEST-03 : Consultation des annonces
Acteur : Utilisateur.
Action : Accéder à la liste des annonces.
Résultat attendu : Les annonces disponibles sont affichées.
TEST-04 : Recherche d'une annonce
Acteur : Utilisateur.
Action : Rechercher une annonce par description ou localisation.
Résultat attendu : Les résultats correspondent aux critères de recherche.
TEST-05 : Modification d'une annonce
Acteur : Utilisateur.
Action : Modifier une annonce.
Résultat attendu : Les modifications sont enregistrées.
TEST-06 : Suppression d'une annonce
Acteur : Utilisateur.
Action : Supprimer une annonce.
Résultat attendu : L'annonce est supprimée.
TEST-07 : Accès administrateur
Acteur : Administrateur.
Action : Accéder à la liste administrative des annonces.
Résultat attendu : L'administrateur peut consulter les annonces.
TEST-08 : Accès non autorisé
Acteur : Utilisateur non administrateur.
Action : Tenter d'accéder à une page réservée à l'administrateur.
Résultat attendu : Accès refusé.
TEST-09 : Transition interdite
Acteur : Utilisateur.
Action : Tenter de clôturer une annonce directement depuis l'état Brouillon.
Résultat attendu : Transition refusée.
TEST-10 : Modification par un autre utilisateur
Acteur : Deux utilisateurs différents.
Action : Le deuxième utilisateur tente de modifier l'annonce du premier.
Résultat attendu : Opération refusée si l'annonce ne lui appartient pas.
3.4 Tableau de suivi des tests
ID	Scénario	Résultat obtenu
TEST-01	Création annonce	À exécuter
TEST-02	Champs vides	À exécuter
TEST-03	Consultation	À exécuter
TEST-04	Recherche	À exécuter
TEST-05	Modification	À exécuter
TEST-06	Suppression	À exécuter
TEST-07	Accès administrateur	À exécuter
TEST-08	Accès non autorisé	À exécuter
TEST-09	Transition interdite	À exécuter
TEST-10	Modification par autre utilisateur	À exécuter
3.5 Conclusion

Les tests exploratoires permettent d'évaluer le fonctionnement du module Lost & Found et d'identifier les améliorations nécessaires concernant la validation, les autorisations et la gestion des états.