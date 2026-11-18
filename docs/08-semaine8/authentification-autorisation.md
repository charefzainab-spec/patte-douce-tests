Authentification et autorisation — Patte Douce
1. Objectif

Vérifier la protection des routes API et l'accès aux informations des utilisateurs.

2. Technologie utilisée

L'application utilise Laravel Sanctum pour gérer l'authentification par Token API.

3. Route protégée
Méthode	Route	Middleware
GET	/api/user	auth:sanctum
4. Création du Token

Un token Sanctum a été généré pour un utilisateur existant avec Tinker :

php
$user = \App\Models\User::first();

$token = $user->createToken('Postman')->plainTextToken;


Le token est ensuite utilisé dans Postman.

5. Test avec authentification

Configuration Postman :

Méthode : GET
URL : /api/user
Authorization : Bearer Token
Token : Token Sanctum généré

Résultat obtenu : 200 OK.

L'utilisateur authentifié peut accéder à ses informations.

6. Test sans authentification

Configuration prévue :

Méthode : GET
URL : /api/user
Authorization : No Auth

Résultat attendu : 401 Unauthorized.

Ce test doit être exécuté pour confirmer le refus d'accès sans token.

7. Conclusion

L'authentification avec Laravel Sanctum fonctionne correctement avec un token valide.

Le test sans authentification permettra de confirmer la protection de la route /api/user.