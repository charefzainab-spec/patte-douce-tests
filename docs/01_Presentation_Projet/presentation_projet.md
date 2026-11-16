# LIVRABLE 1 — FICHE DE PRÉSENTATION DU PROJET

## 1. Identification du projet

- **Nom du projet :** Patte Douce
- **Nature :** Application web de gestion et de publication d'annonces relatives aux animaux.
- **Type de projet :** Projet de test et validation des logiciels.
- **Niveau :** Licence 3 — Technologies de l'Information.
- **Spécialité :** Développement des systèmes d'information.
- **Framework :** Laravel.
- **Langage :** PHP.
- **Base de données :** MySQL.
- **Outils de test prévus :** PHPUnit, Postman, Playwright et k6.

## 2. Contexte du projet

Patte Douce est une application web qui vise à faciliter la gestion des annonces relatives aux animaux domestiques. Elle permet aux utilisateurs de publier des animaux proposés à l'adoption, de consulter les annonces disponibles et de publier des annonces concernant les animaux perdus ou trouvés.

L'application propose également un espace de consultation des vétérinaires. Un administrateur assure la gestion des utilisateurs, des annonces et des informations relatives aux vétérinaires.

Dans le cadre de l'atelier Test et Validation des Logiciels, cette application sera utilisée comme support pour concevoir et exécuter une campagne de tests afin d'évaluer sa qualité, détecter les anomalies et vérifier le respect des règles métier.

## 3. Objectifs de l'application

Les principaux objectifs de Patte Douce sont :

- Faciliter la publication et la consultation des annonces d'animaux.
- Permettre aux utilisateurs de gérer leurs propres annonces.
- Aider à retrouver les animaux perdus grâce aux annonces Lost & Found.
- Faciliter la consultation des coordonnées des vétérinaires.
- Permettre à l'administrateur de gérer les utilisateurs et les différentes ressources de la plateforme.

## 4. Acteurs du système

### 4.1 Utilisateur

L'utilisateur peut :

- Créer un compte et se connecter.
- Consulter les animaux disponibles.
- Ajouter une annonce d'animal.
- Consulter les annonces Lost & Found.
- Ajouter une annonce concernant un animal perdu ou trouvé.
- Consulter la liste des vétérinaires.
- Consulter, modifier et supprimer ses propres annonces.
- Modifier les informations de son profil.
- Se déconnecter.

### 4.2 Administrateur

L'administrateur peut :

- Consulter et gérer les utilisateurs.
- Consulter et gérer les annonces des animaux.
- Consulter et gérer les annonces Lost & Found.
- Ajouter, modifier et supprimer les vétérinaires.
- Accéder au tableau de bord d'administration.

## 5. Fonctionnalités à tester

| Code | Module | Fonctionnalités |
|---|---|---|
| F01 | Authentification | Inscription, connexion et déconnexion |
| F02 | Utilisateurs | Gestion des comptes et des rôles |
| F03 | Animaux | Ajouter, consulter, modifier et supprimer |
| F04 | Mes animaux | Gestion des annonces personnelles |
| F05 | Lost & Found | Ajouter et consulter les annonces |
| F06 | Mes annonces | Modifier et supprimer ses propres annonces |
| F07 | Vétérinaires | Consulter la liste des vétérinaires |
| F08 | Administration | Gestion des utilisateurs, animaux et annonces |
| F09 | Base de données | Persistance et cohérence des informations |

*Remarque : les fonctionnalités seront confirmées à partir du code source et des routes réellement disponibles dans l'application.*

## 6. Périmètre des tests

### 6.1 Éléments inclus

La campagne de tests portera sur :

- La validation des formulaires.
- Le fonctionnement de l'authentification.
- Le contrôle des autorisations selon les rôles.
- Les opérations CRUD sur les animaux et les annonces.
- La protection des données personnelles des utilisateurs.
- La gestion des vétérinaires par l'administrateur.
- La persistance et l'intégrité des données.
- Les performances et l'accessibilité de certaines pages.
- Les fonctionnalités API, si des endpoints REST sont disponibles.

### 6.2 Éléments exclus

Les fonctionnalités qui ne sont pas implémentées dans l'application ne seront pas considérées comme faisant partie de cette campagne. Par exemple, un système de paiement, de réservation vétérinaire ou de messagerie ne sera pas testé s'il n'existe pas dans la version étudiée.

## 7. Environnement de test

| Élément | Description |
|---|---|
| Système d'exploitation | Windows |
| Environnement local | Laragon |
| Langage | PHP |
| Framework | Laravel |
| Base de données | MySQL |
| Tests unitaires et intégration | PHPUnit |
| Tests API | Postman |
| Tests interface | Playwright |
| Tests de performance | k6 |
| Gestion de versions | Git et GitHub |

## 8. Objectif de la campagne de test

L'objectif principal est de vérifier que les fonctionnalités de Patte Douce répondent aux exigences fonctionnelles et techniques définies.

La campagne vise notamment à :

- Détecter les erreurs et les anomalies.
- Vérifier les droits d'accès des utilisateurs et des administrateurs.
- Vérifier la validité des données enregistrées.
- Évaluer la fiabilité des principales fonctionnalités.
- Mesurer la couverture des tests.
- Préparer une décision argumentée concernant la qualité de l'application et sa livraison.

**Conclusion**

Patte Douce constitue le support de ce mini-projet de test et validation. La campagne permettra d'évaluer progressivement ses fonctionnalités, de documenter les anomalies détectées et de proposer des améliorations basées sur les résultats des tests.