# Registre des anomalies — Patte Douce

| ID | Titre | Gravité | Priorité | Statut | Preuve |
|---|---|---|---|---|---|
| AN-01 | Un utilisateur peut modifier/supprimer l'annonce d'un autre | Majeure | Haute | Ouverte | docs/preuves/an-01.txt |
| AN-03 | POST /api/animals accessible sans authentification | Critique | Haute | Ouverte | docs/preuves/an-03.txt |

## AN-01
- **Exigence violée :** un utilisateur ne modifie et ne supprime que ses propres annonces (cahier des charges, 2.2 A.5).
- **Étapes :** 1) créer les utilisateurs A et B ; 2) A publie une annonce ; 3) B envoie PUT ou DELETE sur /animals/{id}.
- **Obtenu :** redirection 302, l'action est exécutée.
- **Attendu :** 403 et données inchangées.
- **Test :** tests/Feature/AnimalAuthorizationTest.php

## AN-03
- **Exigence violée :** contrôle d'accès et authentification (besoins non fonctionnels).
- **Étapes :** envoyer POST /api/animals en JSON, sans token, avec un user_id existant.
- **Obtenu :** 201 Created, l'annonce est créée au nom de l'utilisateur indiqué.
- **Attendu :** 401 Unauthorized.
- **Test :** tests/Feature/AnimalApiTest.php