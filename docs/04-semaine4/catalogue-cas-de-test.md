# Catalogue des cas de test

## Projet : Patte Douce

**Version :** 1.0  
**Date :** 18/11/2026  
**Environnement prévu :** Windows, Laragon, Laravel, PHP et MySQL

## 1. Objectif

Ce document présente les cas de test fonctionnels conçus pour vérifier les principales fonctionnalités de l'application Patte Douce.

Les tests couvrent les scénarios positifs, négatifs, les valeurs limites et les règles de sécurité.

## 2. Préconditions générales

- L'application est installée et accessible.
- La base de données de test est opérationnelle.
- Les comptes de test sont disponibles.
- Les données utilisées sont fictives.
- Les rôles utilisateur et administrateur sont configurés.

## 3. Catalogue des cas de test

### A. Authentification et gestion des comptes

| ID | Cas de test | Type | Résultat attendu |
|---|---|---|---|
| CT-01 | Inscription avec des données valides | Positif | Le compte est créé. |
| CT-02 | Inscription avec un e-mail déjà utilisé | Négatif | L'inscription est refusée. |
| CT-03 | Inscription avec un e-mail invalide | Négatif | Une erreur de validation est affichée. |
| CT-04 | Inscription avec des champs obligatoires vides | Négatif | Les erreurs de validation sont affichées. |
| CT-05 | Connexion avec des identifiants corrects | Positif | L'utilisateur accède à son espace. |
| CT-06 | Connexion avec un mot de passe incorrect | Négatif | La connexion est refusée. |
| CT-07 | Accès à une page protégée sans authentification | Sécurité | L'utilisateur est redirigé vers la connexion. |

### B. Gestion des animaux

| ID | Cas de test | Type | Résultat attendu |
|---|---|---|---|
| CT-08 | Ajouter un animal avec des données valides | Positif | L'animal est enregistré. |
| CT-09 | Ajouter un animal sans nom | Négatif | La validation refuse l'enregistrement. |
| CT-10 | Ajouter un animal avec un âge égal à zéro | Limite | Le résultat respecte la règle métier. |
| CT-11 | Ajouter un animal avec un âge négatif | Négatif | La validation refuse l'âge négatif. |
| CT-12 | Ajouter un animal avec une photo valide | Positif | La photo est acceptée. |
| CT-13 | Ajouter un animal avec un format de photo non autorisé | Négatif | La photo est refusée. |
| CT-14 | Modifier son propre animal | Positif | Les modifications sont enregistrées. |
| CT-15 | Modifier l'animal d'un autre utilisateur | Sécurité | L'accès est refusé. |
| CT-16 | Supprimer son propre animal | Positif | L'animal est supprimé. |
| CT-17 | Supprimer l'animal d'un autre utilisateur | Sécurité | La suppression est refusée. |

### C. Gestion des annonces Lost & Found

| ID | Cas de test | Type | Résultat attendu |
|---|---|---|---|
| CT-18 | Publier une annonce valide | Positif | L'annonce est enregistrée. |
| CT-19 | Publier une annonce sans description | Négatif | La validation refuse l'enregistrement si la description est obligatoire. |
| CT-20 | Modifier sa propre annonce | Positif | Les modifications sont enregistrées. |
| CT-21 | Modifier l'annonce d'un autre utilisateur | Sécurité | L'accès est refusé. |
| CT-22 | Supprimer sa propre annonce | Positif | L'annonce est supprimée. |
| CT-23 | Rechercher une annonce existante | Positif | Les annonces correspondantes sont affichées. |
| CT-24 | Filtrer les annonces par type | Positif | Seules les annonces du type choisi sont affichées. |

### D. Administration et gestion des vétérinaires

| ID | Cas de test | Type | Résultat attendu |
|---|---|---|---|
| CT-25 | Accéder au tableau de bord administrateur | Positif | Le tableau de bord est accessible. |
| CT-26 | Accéder à une page administrateur avec un compte utilisateur | Sécurité | L'accès est refusé. |
| CT-27 | Ajouter un vétérinaire avec des données valides | Positif | Le vétérinaire est enregistré. |
| CT-28 | Ajouter un vétérinaire avec des données invalides | Négatif | La validation refuse les données invalides. |
| CT-29 | Gérer les vétérinaires avec un compte utilisateur | Sécurité | L'accès est refusé. |
| CT-30 | Modifier ou supprimer un vétérinaire | Positif | L'opération est effectuée par un administrateur autorisé. |
| CT-31 | Créer un utilisateur avec un rôle autorisé | Positif | L'utilisateur est créé avec le rôle prévu. |
| CT-32 | Créer un utilisateur avec un rôle non autorisé | Négatif | Le rôle invalide est refusé. |
| CT-33 | Modifier le rôle d'un utilisateur sans autorisation | Sécurité | L'opération est refusée. |

### E. API

| ID | Cas de test | Type | Résultat attendu |
|---|---|---|---|
| CT-34 | Consulter la liste des animaux via l'API publique | Positif | La liste des animaux est retournée. |
| CT-35 | Consulter les détails d'un animal existant | Positif | Les détails de l'animal sont retournés. |
| CT-36 | Créer un animal via l'API avec un token valide | Positif | L'animal est créé. |
| CT-37 | Créer un animal via l'API sans token | Sécurité | La requête est refusée. |
| CT-38 | Créer un animal via l'API avec des données invalides | Négatif | Les erreurs de validation sont retournées. |
| CT-39 | Tenter de créer un animal au nom d'un autre utilisateur | Sécurité | L'identité liée au token est utilisée. |

### F. Robustesse et sécurité complémentaire

| ID | Cas de test | Type | Résultat attendu |
|---|---|---|---|
| CT-40 | Saisir des caractères spéciaux dans les champs texte | Robustesse | Les données sont traitées sans erreur inattendue. |
| CT-41 | Consulter une ressource inexistante | Négatif | Une réponse adaptée est retournée. |
| CT-42 | Vérifier le stockage du mot de passe | Sécurité | Le mot de passe est stocké sous forme hachée. |
| CT-43 | Vérifier la protection contre les accès non autorisés | Sécurité | Les opérations interdites sont refusées. |

## 4. Statut des tests

Tous les cas de test de ce catalogue sont à l'état **Non exécuté**.

Ce document décrit les tests conçus et préparés. Les résultats réels seront renseignés pendant les phases d'exécution prévues dans les semaines suivantes.

## 5. Conclusion

Ce catalogue contient 43 cas de test couvrant l'authentification, la gestion des animaux, les annonces Lost & Found, l'administration, l'API, la robustesse et la sécurité.

Les cas de test sont conçus à partir des exigences identifiées et des techniques de conception étudiées. Ils seront utilisés lors des prochaines phases d'exécution.