Scénarios de tests API — Patte Douce
1. Objectif

Définir les scénarios permettant de vérifier les fonctionnalités de l'API REST.

2. Scénarios de tests
ID	Scénario	Méthode	Résultat attendu
API01	Consulter la liste des animaux	GET	200 OK
API02	Consulter un animal existant	GET	200 OK
API03	Consulter un animal inexistant	GET	404 Not Found
API04	Créer un nouvel animal	POST	201 Created
API05	Consulter l'utilisateur connecté	GET	200 OK
API06	Consulter l'utilisateur sans authentification	GET	401 Unauthorized
API07	Créer un animal sans titre	POST	422 Unprocessable Content
API08	Créer un animal avec un utilisateur inexistant	POST	422 Unprocessable Content
3. Données utilisées

Exemple de données pour la création :

json
{
    "titre": "Chat Postman",
    "description": "Animal créé pour tester l'API",
    "age": 3,
    "race": "Persan",
    "user_id": 1
}

4. Résultats réellement obtenus
ID	Résultat obtenu	Statut
API01	200 OK	PASS
API02	200 OK	PASS
API03	404 Not Found	PASS
API04	201 Created	PASS
API05	200 OK	PASS
API06	À exécuter	Non testé
API07	À exécuter	Non testé
API08	À exécuter	Non testé
5. Conclusion

Les scénarios exécutés montrent que les principales opérations de consultation et de création fonctionnent correctement.

Les scénarios négatifs supplémentaires restent à exécuter.