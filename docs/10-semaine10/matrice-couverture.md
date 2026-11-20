# Matrice de couverture – Semaine 10

Suite PHP : 82 tests, 0 échec. Playwright : 9/9, dont 6/6 en régression.

| Exigence | Fonctionnalité | Tests | Couverte ? |
|---|---|---|---|
| EX-01 | Inscription (validation) | RegistrationTest | Partielle (cas nominal) |
| EX-02 | Connexion | AuthenticationTest, auth.spec.js | Oui |
| EX-03 | Rôle `user` imposé à l'inscription | – | Non testé |
| EX-04 | Pages protégées | navigation.spec.js | Oui |
| EX-05 à EX-08 | Création d'annonce animal, validation | AnimalIntegrationTest, animal.spec.js | Partielle (titre vide ; valeurs limites non testées) |
| EX-09 | Photo d'une annonce animal | – | Non testé (testé seulement pour Lost & Found) |
| EX-10 | Annonce animal modifiable par son propriétaire seulement | – | Non testé |
| EX-11 | Création Lost & Found | LostFoundSecurityTest | Oui |
| EX-12 | Droits Lost & Found | LostFoundSecurityTest (6 tests) | Oui (propriétaire) ; administrateur non testé |
| EX-13 | Upload Lost & Found | LostFoundUploadTest (3 tests) | Oui |
| EX-14 | Recherche et filtres | – | Non testé |
| EX-15 | Vétérinaires : droits | VeterinaireSecurityTest | Oui |
| EX-16 | Vétérinaires : validation | VeterinaireSecurityTest | Oui |
| EX-17 | Gestion des utilisateurs : droits | AdminUserSecurityTest | Oui |
| EX-18 | Gestion des utilisateurs : rôles et validation | AdminUserSecurityTest | Oui |
| EX-19 | API : POST sans jeton refusé | AnimalApiSecurityTest | Oui |
| EX-20 | API : propriétaire = utilisateur du jeton, validation | AnimalApiSecurityTest, AnimalApiTest | Oui |
| EX-21 | Aucune erreur 500 | – | Non testé |
| EX-22 | Mots de passe hachés | – | À vérifier |

## Autres éléments testés
- API en lecture (liste, détail, 404) : AnimalApiTest.
- Profil, mot de passe, e-mail : ProfileTest, Password*Test, EmailVerificationTest.
- Intégrité de la base (cascade, clé étrangère) : AnimalDatabaseIntegrationTest.
- Accessibilité : accessibility.spec.js (5 anomalies).

## Lecture
Sur 22 exigences : 11 couvertes, 5 partiellement (EX-01, EX-05 à EX-08), 5 non testées (EX-03, 09, 10, 14, 21) et 1 à vérifier (EX-22). Les exigences de sécurité des risques R01 à R03 (API, annonces, vétérinaires, utilisateurs) sont couvertes. Restent sans test la propriété des annonces d'animaux (EX-10), la recherche (EX-14) et le rôle imposé à l'inscription (EX-03).

Couverture de code : 49,9 % en S6, non mesurée en S10 (aucune extension Xdebug ou PCOV compatible avec PHP 8.5.12 ZTS). Seuil du plan : 70 %.