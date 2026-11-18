# Fiche de présentation du projet

## 1. Identification
- **Projet :** Patte Douce
- **Nature :** application web de gestion et de publication d'annonces relatives aux animaux (adoption, objets/animaux perdus ou trouvés, annuaire de vétérinaires)
- **Contexte :** mini-projet « Test et validation des logiciels », Licence 3 TI, spécialité Développement des systèmes d'information
- **Durée :** 10 semaines
- **Auteur :** [nom]

## 2. Description du système
- **But :** permettre aux utilisateurs de publier et consulter des annonces d'animaux, de signaler un animal perdu ou trouvé, et de consulter un annuaire de vétérinaires.
- **Technologies :** Laravel [version], PHP [version], MySQL, Laravel Sanctum (API), Blade
- **Dépôt :** https://github.com/charefzainab-spec/patte-douce-tests (branche `depart-initial`)
- **Environnement de travail :** Windows, Laragon, base de test dédiée

## 3. Acteurs et rôles
| Acteur | Droits |
|---|---|
| Visiteur (non connecté) | [consulter les annonces, s'inscrire, se connecter] |
| Utilisateur connecté | [créer, modifier, supprimer ses propres annonces, Lost & Found] |
| Administrateur | [gérer les vétérinaires, les utilisateurs, modérer] |

## 4. Modules fonctionnels
| ID | Module | Description |
|---|---|---|
| F01 | Authentification | inscription, connexion, déconnexion |
| F02 | Annonces d'animaux | CRUD des annonces |
| F03 | Upload de photo | ajout d'image à une annonce |
| F04 | Recherche / filtres | recherche par espèce, âge, etc. |
| F05 | Lost & Found | signalement d'animaux perdus/trouvés |
| F06 | Vétérinaires | annuaire, gestion réservée à l'admin |
| F07 | Gestion des utilisateurs | administration des comptes et rôles |
| F08 | API REST | endpoints `/api/...` protégés par Sanctum |
| F09 | Tableau de bord admin | [si présent] |

(Vérifie chaque ligne avec `php artisan route:list` et en testant à la main.)

## 5. Fonctions critiques
Login, création d'annonce, droits par rôle, upload de photo, API. Justification : une défaillance ici touche la sécurité ou l'intégrité des données.

## 6. Notions de qualité (5 phrases, avec exemple Patte Douce)
- **Erreur :** [définition + exemple]
- **Défaut :** [définition + exemple]
- **Défaillance :** [définition + exemple]
- **Vérification :** [définition + exemple]
- **Validation :** [définition + exemple]

## 7. Différences avec le cas RéclaGest
Le sujet décrit RéclaGest (réclamations, statuts NOUVELLE → CLÔTURÉE, plusieurs rôles). Patte Douce est adapté ainsi : une « annonce » remplace la « réclamation », il n'y a pas de cycle de statuts complexe, et il y a deux rôles (user/admin) plus le visiteur. Les règles métier et les cas de test sont donc adaptés à ce contexte.