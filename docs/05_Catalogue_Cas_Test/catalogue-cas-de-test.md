# Catalogue des cas de test : Patte Douce

Techniques : PE = partition d'équivalence, VL = valeurs limites, TD = table de décision.
Type : P = positif, N = négatif, L = limite.

| ID | Exigence | Technique | Scénario | Attendu | Type | Test automatisé | Résultat |
|---|---|---|---|---|---|---|---|
| CT-01 | EX-13 | PE | Création valide d'une annonce | Créée, statut `adoption`, liée à l'utilisateur | P | AnimalIntegrationTest | ✅ |
| CT-02 | EX-01 | PE | Titre vide | Refusé | N | AnimalValidationTest | ✅ |
| CT-03 | EX-01 | VL | Titre de 255 caractères | Accepté | L | AnimalValidationTest | ✅ |
| CT-04 | EX-01 | VL | Titre de 256 caractères | Refusé | L | AnimalValidationTest | ✅ |
| CT-05 | EX-01 | VL | Âge = -1 | Refusé | L | AnimalValidationTest | ✅ |
| CT-06 | EX-01 | VL | Âge = 0 | Accepté | L | AnimalValidationTest | ✅ |
| CT-07 | EX-01 | PE | Âge décimal ou texte | Refusé | N | AnimalValidationTest | ✅ |
| CT-08 | EX-01 | VL | Téléphone de 20 puis 21 caractères | Accepté puis refusé | L | AnimalValidationTest | ✅ |
| CT-09 | EX-01 | PE | Description vide | Refusé | N | AnimalValidationTest | ✅ |
| CT-10 | EX-02 | VL | Photo de 2048 Ko puis 2049 Ko | Accepté puis refusé | L | PhotoUploadTest | ✅ |
| CT-11 | EX-02 | PE | PDF comme photo | Refusé | N | PhotoUploadTest | ✅ |
| CT-12 | EX-03 | TD | Visiteur sur /animals | Redirigé vers /login | N | AnimalAuthorizationTest | ✅ |
| CT-13 | EX-04 | TD | Un utilisateur modifie l'annonce d'un autre | 403, données inchangées | N | AnimalAuthorizationTest | ❌ AN-01 |
| CT-14 | EX-04 | TD | Un utilisateur supprime l'annonce d'un autre | 403, annonce conservée | N | AnimalAuthorizationTest | ❌ AN-01 |
| CT-15 | EX-10 | VL | Âge 1 dans les filtres bébé et jeune | Présent dans une seule catégorie | L | AnimalBugsTest | ❌ AN-04 |
| CT-16 | EX-11 | PE | API : animal absent (404), champs manquants (422) | 404 puis 422 | N | AnimalApiTest | ✅ |
| CT-17 | EX-05 | TD | Visiteur sur /admin | Redirigé vers /login | N | RoleAccessTest | ✅ |
| CT-18 | EX-05 | TD | Utilisateur simple sur /admin | Redirigé vers / | N | RoleAccessTest | ✅ |
| CT-19 | EX-05 | TD | Administrateur sur /admin | 200 | P | RoleAccessTest | ✅ |
| CT-20 | EX-06 | TD | Utilisateur simple supprime un vétérinaire | Refusé, vétérinaire conservé | N | RoleAccessTest | ❌ AN-05 |
| CT-21 | EX-06 | TD | Utilisateur simple crée un vétérinaire | Refusé | N | RoleAccessTest | ❌ AN-05 |
| CT-22 | EX-06 | TD | Utilisateur simple modifie un vétérinaire | Refusé | N | RoleAccessTest | ❌ AN-05 |
| CT-23 | EX-07 | PE | Fiche d'un vétérinaire | 200 | P | RoleAccessTest | ❌ AN-07 |
| CT-24 | EX-08 | PE | Lost & Found : formulaire vide | Erreurs de validation | N | LostFoundTest | ❌ AN-08 |
| CT-25 | EX-10 | PE | Lost & Found : recherche « chat » | 200 | P | LostFoundTest | ❌ AN-09 |
| CT-26 | EX-10 | PE | Lost & Found : liste sans recherche | 200, annonce visible | P | LostFoundTest | ✅ |
| CT-27 | EX-09 | TD | Un utilisateur modifie le Lost & Found d'un autre | 403, données inchangées | N | LostFoundTest | ❌ AN-10 |
| CT-28 | EX-09 | TD | Un utilisateur supprime le Lost & Found d'un autre | 403, annonce conservée | N | LostFoundTest | ❌ AN-10 |
| CT-29 | EX-12 | PE | Vétérinaire sans nom (admin) | Refusé | N | VetValidationTest | ✅ |
| CT-30 | EX-12 | PE | Vétérinaire avec email invalide | Refusé | N | VetValidationTest | ❌ AN-11 |
| CT-31 | EX-12 | PE | Modifier un vétérinaire avec un nom vide | Refusé | N | VetValidationTest | ❌ AN-11 |
| CT-32 | EX-14 | PE | 11 pages utilisateur | 200 | P | PagesDisplayTest | ✅ |
| CT-33 | EX-14 | PE | 7 pages administrateur | 200 | P | PagesDisplayTest | ✅ |
| CT-34 | EX-10 | PE | Recherche d'animaux par titre | Seul le bon animal apparaît | P | PagesDisplayTest | ✅ |
| CT-35 | EX-10 | PE | Filtre senior | Animaux de 10 ans et plus | P | PagesDisplayTest | ✅ |
| CT-36 | EX-10 | PE | Filtre de type Lost & Found | Seul le type demandé apparaît | P | PagesDisplayTest | ✅ |
| CT-37 | EX-15 | PE | Modifier une annonce avec un titre vide | Refusé avec erreur | N | AnimalBugsTest | ❌ AN-02 |
| CT-38 | n/a | n/a | Fusionné avec CT-15 | n/a | n/a | n/a | n/a |
| CT-39 | EX-11 | TD | API : POST sans authentification | 401 | N | AnimalApiTest | ❌ AN-03 |
| CT-40 | EX-05 | TD | Utilisateur simple sur /users | Redirigé vers / | N | AdminUserTest | ✅ |
| CT-41 | EX-16 | PE | Admin crée un utilisateur, mot de passe utilisable | Créé, connexion possible | P | AdminUserTest | ✅ |
| CT-42 | EX-16 | PE | Admin crée un utilisateur avec formulaire vide | Erreurs de validation | N | AdminUserTest | À relancer (AN-12) |
| CT-43 | EX-16 | PE | Rôle `superadmin` | Refusé | N | AdminUserTest | ❌ AN-13 |
| CT-44 | EX-16 | PE | Email déjà utilisé à la création | Aucun doublon | N | AdminUserTest | ✅ |
| CT-45 | EX-16 | PE | Modifier avec l'email d'un autre | Erreur de validation | N | AdminUserTest | ❌ AN-14 |
| CT-46 | EX-16 | PE | Admin modifie un utilisateur | Modifié | P | AdminUserTest | ✅ |
| CT-47 | EX-16 | PE | Admin supprime un utilisateur | Supprimé | P | AdminUserTest | ✅ |
| CT-48 | EX-16 | TD | Utilisateur simple crée un utilisateur | Refusé | N | AdminUserTest | ✅ |
| CT-49 | EX-16 | TD | Utilisateur simple supprime un utilisateur | Refusé | N | AdminUserTest | ✅ |
| CT-50 | EX-03 | TD | Inscription avec `role=admin` | Rôle `user` enregistré | N | AdminUserTest | ✅ |
| CT-51 | EX-13 | PE | Suppression d'un utilisateur | Ses annonces sont supprimées | P | AdminUserTest | ✅ |

## Jeux de données
- Utilisateurs : factory User (rôle `user`), et administrateur créé avec `role = admin`.
- Animaux : factory Animal (titre, âge 0 à 15, race, téléphone aléatoires), valeurs forcées pour les limites.
- Vétérinaires et Lost & Found : création directe (`forceCreate`) avec valeurs fixes (Dr Test, Chat noir perdu).
- Fichiers : images et PDF factices générés par `UploadedFile::fake()`.

## Tests hors catalogue
- 25 tests de régression de Laravel Breeze (authentification, mot de passe, profil).
- 5 tests d'intégration supplémentaires dans AnimalIntegrationTest (lecture, modification, suppression, titre obligatoire, clé étrangère).