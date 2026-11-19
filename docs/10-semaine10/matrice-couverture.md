# Matrice de couverture – Semaine 10

Suite PHP : 62 tests, 0 échec. Playwright : 9/9, dont 6/6 en régression.

| Exigence | Fonctionnalité | Tests | Couverte ? |
|---|---|---|---|
| EX-01 | Inscription (validation) | RegistrationTest | Partielle (cas nominal) |
| EX-02 | Connexion | AuthenticationTest, auth.spec.js | Oui |
| EX-03 | Rôle `user` imposé à l'inscription | – | Non testé |
| EX-04 | Pages protégées | navigation.spec.js | Oui |
| EX-05 à EX-08 | Création d'annonce animal, validation | AnimalIntegrationTest, animal.spec.js | Partielle (titre vide ; valeurs limites non testées) |
| EX-09 | Photo animal (format, taille) | – | Non testé (testé seulement pour Lost & Found) |
| EX-10 | Annonce animal modifiable par son propriétaire seulement | – | Non testé (CRUD sans second utilisateur) |
| EX-11 | Création Lost & Found | LostFoundSecurityTest | Oui |
| EX-12 | Droits Lost & Found | LostFoundSecurityTest (6 tests) | Oui (propriétaire) ; administrateur non testé |
| EX-13 | Upload Lost & Found | LostFoundUploadTest (3 tests) | Oui |
| EX-14 | Recherche et filtres | – | Non testé |
| EX-15, EX-16 | Vétérinaires (droits, validation) | – | Non testé |
| EX-17, EX-18 | Gestion des utilisateurs (droits, rôles) | – | Non testé |
| EX-19 | API : POST sans jeton refusé | AnimalApiSecurityTest | Oui |
| EX-20 | API : propriétaire = utilisateur du jeton, validation | AnimalApiSecurityTest, AnimalApiTest | Oui |
| EX-21 | Aucune erreur 500 | – | Non testé |
| EX-22 | Mots de passe hachés | – | À vérifier |
| – | API lecture (liste, détail, 404) | AnimalApiTest | Oui |
| – | Profil, mot de passe, e-mail | ProfileTest, Password*Test, EmailVerificationTest | Oui |
| – | Intégrité de la base (cascade, clé étrangère) | AnimalDatabaseIntegrationTest | Oui |
| – | Accessibilité | accessibility.spec.js | Oui (5 anomalies) |

## Lecture
Parmi les 22 exigences, 9 sont couvertes, 3 partiellement, 9 non testées et 1 à vérifier. Les non couvertes sont surtout les vétérinaires, la gestion des utilisateurs, la recherche et la propriété des annonces d'animaux (risque R03, criticité haute).

Couverture de code : 49,9 % en S6. Non mesurée en S10 (aucune extension Xdebug ou PCOV compatible avec PHP 8.5.12 ZTS). Seuil du plan : 70 %.