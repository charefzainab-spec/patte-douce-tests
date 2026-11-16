# Périmètre de test : Patte Douce

## Dans le périmètre
- Authentification : inscription, connexion, déconnexion, mot de passe.
- Annonces d'animaux : création, consultation, modification, suppression, recherche, filtre d'âge, "mes annonces".
- Lost & Found : création, consultation, modification, suppression, recherche, filtre de type.
- Vétérinaires : consultation (utilisateur), gestion complète (administrateur).
- Contrôle d'accès par rôle (visiteur, utilisateur, administrateur).
- API REST `/api/animals` (GET liste, GET détail, POST).
- Intégrité des données en base (contraintes, clés étrangères).
- Un parcours d'interface critique et un test non fonctionnel.

## Hors périmètre
- Envoi réel d'emails (vérification, réinitialisation de mot de passe).
- Compatibilité exhaustive des navigateurs et des appareils.
- Tests de charge à grande échelle, hébergement et déploiement.
- Code des dépendances (Laravel, Breeze, Sanctum).

## Niveaux de test visés
Unitaire, intégration, système (API + interface), acceptation : détaillés dans le plan de test (semaine 2).

## Hypothèses et limites
- Les tests utilisent une base séparée (`animal_adoption_test`), réinitialisée à chaque test.
- Les tests de Laravel Breeze sont conservés comme tests de régression sur l'authentification.
- Une anomalie n'est déclarée que si un test l'a reproduite et qu'une preuve est conservée.