# PLAN DE TEST
## Projet : Patte Douce
### Livrable 2 — Semaine 2

**Version :** 1.0
**Date :** 18/11/2026
**Application :** Patte Douce
**Framework :** Laravel [version]
**Langage :** PHP [version]
**Base de données :** MySQL

---

## 1. Introduction

Ce document présente la stratégie et le plan de test de l'application web Patte Douce.

Il définit les niveaux de test, les types de tests, les outils, l'environnement, les responsabilités, les critères d'entrée et de sortie, l'organisation du dépôt ainsi que le calendrier de la campagne.

L'objectif est de vérifier le bon fonctionnement des fonctionnalités, de détecter les anomalies et d'évaluer la qualité globale de l'application.

## 2. Objectifs des tests

- Vérifier le fonctionnement des principales fonctionnalités.
- Détecter les erreurs et les anomalies.
- Vérifier les règles de validation des formulaires.
- Contrôler les droits d'accès des visiteurs, des utilisateurs et des administrateurs.
- Vérifier les interactions avec la base de données.
- Évaluer la fiabilité et la performance de l'application.
- Vérifier que les corrections n'introduisent pas de nouvelles anomalies.
- Fournir des résultats permettant de prendre une décision de validation.

## 3. Stratégie et niveaux de test

La campagne est priorisée selon les risques de criticité élevée identifiés dans l'analyse des risques (Livrable 1).

### 3.1 Tests unitaires

**Objectif :** vérifier isolément une classe ou une méthode, sans dépendre de l'application complète.

Exemples :
- Middleware de contrôle du rôle administrateur.
- Méthodes et attributs des modèles User et Animal.
- Hachage du mot de passe.

**Outil :** PHPUnit.

### 3.2 Tests d'intégration

**Objectif :** vérifier les interactions entre les contrôleurs, les modèles et la base de données.

Exemples :
- Ajouter un animal et vérifier son enregistrement dans MySQL.
- Modifier une annonce et vérifier la mise à jour des données.
- Supprimer une annonce et vérifier sa suppression.
- Vérifier une contrainte d'intégrité (utilisateur inexistant).

**Outils :** PHPUnit avec les fonctionnalités de test Laravel et RefreshDatabase.

### 3.3 Tests système

**Objectif :** vérifier le comportement global de l'application, y compris l'API REST.

Exemples :
- Appeler les endpoints /api et contrôler les codes de réponse (200, 201, 401, 403, 404, 422).
- Ajouter un animal et consulter son annonce.
- Publier une annonce Lost & Found.
- Vérifier les accès selon les rôles.

**Outils :** tests fonctionnels Laravel, Postman.

### 3.4 Tests d'acceptation

**Objectif :** vérifier que les fonctionnalités répondent aux besoins des utilisateurs et aux critères d'acceptation définis.

Exemples :
- Un utilisateur peut consulter les animaux disponibles.
- Un utilisateur peut gérer ses propres annonces.
- Un administrateur peut gérer les utilisateurs et les vétérinaires.

**Outil :** Playwright (parcours connexion → création d'annonce → vérification).

## 4. Types de tests

| Type | Objectif | Application |
|---|---|---|
| Boîte noire | tester selon le comportement attendu | valeurs limites, partitions d'équivalence |
| Boîte blanche | mesurer ce qui est exécuté dans le code | couverture de lignes (Xdebug) |
| Négatif | vérifier le refus des entrées invalides | champs manquants, accès sans token |
| Exploratoire | découvrir des anomalies sans script | navigation libre, tentatives de contournement |
| Non fonctionnel | évaluer performance ou accessibilité | k6 sur l'API |
| Régression | vérifier que l'existant fonctionne toujours | suite rejouée après chaque modification |

## 5. Environnement de test

| Élément | Configuration |
|---|---|
| Système d'exploitation | Windows |
| Environnement local | Laragon |
| Application | Patte Douce |
| Framework | Laravel [version] |
| Langage | PHP [version] |
| Base de données | MySQL |
| Base de test | animal_adoption_test (distincte de la base de développement) |
| Configuration | fichier .env.testing |
| Données | RefreshDatabase et seeders, pour des données reproductibles |
| Serveur local | php artisan serve |
| Versionnement | Git et GitHub |

## 6. Outils de test

| Outil | Utilisation |
|---|---|
| PHPUnit | tests unitaires, d'intégration et fonctionnels |
| Laravel Testing | tests HTTP et base de données |
| Xdebug | mesure de la couverture de code |
| Postman | tests de l'API REST |
| Playwright | automatisation des parcours utilisateur |
| k6 | tests de performance |
| Git / GitHub | gestion des versions et hébergement |
| Markdown | documents, catalogue et matrice de traçabilité |

## 7. Responsabilités

Le projet est réalisé individuellement.

L'étudiant est responsable de :
- l'analyse des exigences et la préparation du plan de test ;
- la conception des cas de test et des données de test ;
- l'exécution des tests manuels et automatisés ;
- la documentation des anomalies ;
- la correction, la réexécution des tests et la décision finale ;
- la préparation du rapport final et de la soutenance.

L'enseignant assure l'encadrement, le suivi et l'évaluation des livrables.

## 8. Critères d'entrée

La campagne de test peut commencer lorsque :
- l'application est accessible dans l'environnement local ;
- l'environnement PHP, Laravel et MySQL est opérationnel ;
- la base de données de test est préparée ;
- le périmètre de test et l'analyse des risques sont définis ;
- les outils nécessaires sont installés ;
- le dépôt Git est initialisé et organisé.

## 9. Critères de sortie (seuils)

Ces seuils sont fixés avant le début de la campagne.

| Critère | Seuil |
|---|---|
| Cas de test prévus exécutés | 100 % |
| Couverture de lignes (Xdebug) | ≥ 70 % |
| Anomalies bloquantes ou critiques ouvertes | 0 |
| Tests de régression réussis | 100 % |
| Anomalies documentées (ID, sévérité, preuve) | 100 % |
| Preuves d'exécution conservées | 100 % |

Décision finale :
- **Validation** si tous les seuils sont atteints.
- **Validation conditionnelle** si seules des anomalies mineures restent ouvertes, avec risques résiduels documentés.
- **Refus** dans les autres cas.

## 10. Gestion des anomalies

Chaque anomalie est enregistrée avec :
- un identifiant (AN-xx), un titre et une description ;
- les étapes de reproduction ;
- le résultat attendu et le résultat obtenu ;
- la sévérité et la priorité de correction ;
- une preuve (capture, log) ;
- un statut : Ouverte, En cours, Corrigée ou Vérifiée.

Démarche : les anomalies sont d'abord détectées et documentées. Les corrections sont réalisées en fin de campagne, afin de disposer d'un état « avant » et d'un état « après ».

## 11. Stratégie de régression

Après chaque correction importante, les tests concernés sont exécutés de nouveau. Une suite de régression, constituée des tests critiques, vérifie que les fonctionnalités déjà validées continuent de fonctionner.

Les tests de sécurité et d'autorisation sont prioritaires après toute modification des contrôleurs, des routes ou des middlewares.

## 12. Organisation du dépôt

```
docs/             documents par semaine (01-semaine1, 02-semaine2, ...)
docs/preuves/     logs, captures, rapports de couverture
tests/Unit/       tests unitaires
tests/Feature/    tests d'intégration et système
tests/api/        collection Postman
tests/e2e/        scripts Playwright
tests/k6/         scripts de performance
```

Conventions :
- un commit à la fin de chaque semaine, message « Semaine N : ... » ;
- branche `depart-initial` : travail de la campagne ;
- chaque test exécuté est accompagné d'une preuve dans `docs/preuves/`.

## 13. Calendrier de campagne

| Semaine | Activité | Livrable |
|---|---|---|
| 3 | Référentiel d'exigences, matrice de traçabilité | Référentiel, matrice |
| 4 | Conception des cas de test | Catalogue de cas de test |
| 5 | États, tests exploratoires, premières anomalies | Registre d'anomalies |
| 6 | Tests unitaires | Tests et preuve |
| 7 | Tests d'intégration avec base de données | Tests et preuve |
| 8 | Tests API | Collection Postman et rapport |
| 9 | Playwright, non fonctionnel, régression | Scripts et preuves |
| 10 | Campagne finale, corrections, décision | Dossier final et soutenance |

## 14. Conclusion

Ce plan de test définit l'organisation de la campagne de validation de Patte Douce. Il constitue le document de référence pour les prochaines étapes : conception des cas de test, automatisation, exécution, suivi des anomalies et décision finale de validation.