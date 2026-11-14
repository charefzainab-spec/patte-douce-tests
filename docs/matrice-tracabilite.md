# Matrice de traçabilité : Exigences, risques, cas de test

Légende : ✅ test réussi, ❌ test en échec (anomalie), ⏳ cas conçu, test à écrire.

| Exigence | Critère d'acceptation | Risque | Cas de test | Résultat | Anomalie |
|---|---|---|---|---|---|
| EX-01 Validation des champs d'une annonce (RG-01 à RG-05) | Chaque valeur limite est acceptée ou refusée comme prévu | R-07 | CT-02 à CT-09 | ✅ | |
| EX-02 Photo : type et taille (RG-06) | PDF refusé, 2 Mo accepté, 2 Mo + 1 refusé | R-08 | CT-10, CT-11 | ⏳ | |
| EX-03 Authentification requise (RG-08) | Un visiteur est redirigé vers /login | R-06 | CT-12 | ✅ | |
| EX-04 Seul le propriétaire modifie ou supprime son annonce (EX-A) | Un autre utilisateur reçoit 403 et les données restent intactes | R-01 | CT-13, CT-14 | ❌ | AN-01 |
| EX-05 /admin réservé à l'administrateur (RG-09, RG-13) | Visiteur redirigé, utilisateur redirigé vers /, admin 200 | R-06 | CT-17 à CT-19 | ✅ | |
| EX-06 Seul l'administrateur gère les vétérinaires | Un utilisateur ne peut ni créer, ni modifier, ni supprimer | R-03 | CT-20 à CT-22 | ❌ | AN-05 |
| EX-07 La fiche d'un vétérinaire s'affiche | GET /vet/{id} répond 200 | R-10 | CT-23 | ❌ | AN-07 |
| EX-08 Lost & Found : champs obligatoires (RG-15) | Formulaire vide refusé avec erreurs | R-04 | CT-24 | ❌ | AN-08 |
| EX-09 Lost & Found : seul le propriétaire modifie ou supprime | Un autre utilisateur reçoit 403, données intactes | R-01 | CT-27, CT-28 | ❌ | AN-10 |
| EX-10 Recherche et filtres (RG-10, RG-16) | Résultats corrects, aucune erreur serveur, catégories exclusives | R-05 | CT-15, CT-25, CT-34, CT-35, CT-36 | ❌ (CT-15, CT-25) ✅ (autres) | AN-04, AN-09 |
| EX-11 API REST (RG-12) | 404 pour un animal absent, 422 si champs manquants, 401 sans authentification | R-02 | CT-16, CT-39 | ❌ (CT-39) ✅ (CT-16) | AN-03 |
| EX-12 Validation des vétérinaires (RG-14) | Nom obligatoire, email valide, update validé | R-04 | CT-29, CT-30, CT-31 | ❌ (CT-30, CT-31) ✅ (CT-29) | AN-11 |
| EX-13 CRUD des annonces et persistance (RG-07) | Création, lecture, modification, suppression, clé étrangère | R-07 | CT-01 et tests d'intégration | ✅ | |
| EX-14 Pages principales accessibles | Pages utilisateur et administrateur répondent 200 | R-10 | CT-32, CT-33 | ✅ | |
| EX-15 `update()` d'une annonce valide les champs | Titre vide refusé avec erreur | R-07 | CT-37 | ❌ | AN-02 |

## Couverture de la traçabilité
- 15 exigences, 14 risques ou cas de test associés (R-09 reste à couvrir par un test exploratoire en semaine 5).
- 39 cas de test numérotés, dont 2 à écrire (CT-10, CT-11).