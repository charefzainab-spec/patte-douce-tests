# Cartographie des risques : Patte Douce

Échelle : probabilité P (1 faible, 3 forte) × impact I (1 faible, 3 fort) = criticité.
Criticité 1-3 : faible. 4-6 : moyenne. 7-9 : élevée.

| ID | Risque | P | I | Crit. | Exigence liée | Cas de test prévus |
|---|---|---|---|---|---|---|
| R-01 | Un utilisateur modifie ou supprime l'annonce d'un autre | 3 | 3 | 9 | Un utilisateur gère ses propres annonces | CT-13, CT-14 |
| R-02 | Création d'annonces via l'API sans authentification, au nom de n'importe qui | 3 | 3 | 9 | Authentification, contrôle des accès | tests API |
| R-03 | Un utilisateur simple gère les vétérinaires (réservé à l'admin) | 3 | 3 | 9 | Gestion des vétérinaires par l'admin | CT-20 à CT-22 |
| R-04 | Lost & Found : données invalides acceptées ou plantage à la création | 3 | 2 | 6 | Annonces Lost & Found | CT-24 |
| R-05 | Fonctions de recherche qui plantent ou renvoient des résultats faux | 2 | 2 | 4 | Recherche et filtrage | CT-15, CT-25 |
| R-06 | Accès à l'espace administrateur sans être admin | 2 | 3 | 6 | Espace administrateur | CT-17 à CT-19 |
| R-07 | Données d'annonce invalides en base (titre, âge, téléphone, description) | 2 | 2 | 4 | Validation des champs | CT-02 à CT-09 |
| R-08 | Upload de fichier invalide ou trop lourd (photo) | 2 | 2 | 4 | Photo : image, 2 Mo max | CT-10, CT-11 |
| R-09 | Injection (SQL, XSS) dans les champs texte et la recherche | 1 | 3 | 3 | Sécurité des données | test exploratoire |
| R-10 | Page ou action qui renvoie une erreur 500 | 2 | 2 | 4 | Fiabilité | CT-23, CT-25 |

## Priorisation
Les risques R-01, R-02 et R-03 (criticité 9) sont testés en premier.
Les tests de la campagne sont écrits en commençant par les risques les plus élevés.