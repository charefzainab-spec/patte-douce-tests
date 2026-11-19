# Compte rendu – Semaine 10 : Campagne finale et décision de livraison

Projet : Patte Douce (application Laravel de gestion d'annonces d'animaux)

## 1. Objectif
Consolider les anomalies détectées pendant la campagne, corriger les plus critiques, réexécuter les tests, analyser la couverture et les risques résiduels, puis décider de la livraison.

## 2. Anomalies consolidées
Le registre complet est dans `registre-anomalies.md` : 10 anomalies (3 issues de la semaine 5, 5 de la semaine 9, 2 identifiées en semaine 10). Les semaines 6 et 8 n'ont produit aucune anomalie.

| ID | Description | Sévérité | Statut |
|---|---|---|---|
| ANO-01 | Absence de gestion des états | [à compléter] | [à compléter] |
| ANO-02 | Aucune vérification du propriétaire à la modification et à la suppression d'une annonce (Lost & Found) | Critique | Corrigée et retestée |
| ANO-03 | Aucune validation des données à la création et à la modification (Lost & Found) | Majeure | Corrigée et retestée |
| ANO-09 | Upload de fichier sans contrôle de type ni de taille | À confirmer | Partiellement corrigée (validation image, 2 Mo, extension déterminée par le fichier) ; test dédié à écrire |
| ANO-10 | Recherche combinée au filtre de type | À confirmer | À vérifier |
| Anomalies S9 (5) | Champ photo sans label ; contraste insuffisant (accueil 11 éléments, login 4, /animals 44, formulaire 1) | Voir registre | Ouvertes |

## 3. Preuve avant / après (Lost & Found)
Fichier de test : `tests/Feature/LostFoundSecurityTest.php`.

| | Avant correction | Après correction |
|---|---|---|
| Modifier l'annonce d'un autre utilisateur | Échec (annonce modifiée) | Réussi (refusé, 403) |
| Supprimer l'annonce d'un autre utilisateur | Échec (annonce supprimée) | Réussi (refusé, 403) |
| Supprimer sans connexion | Réussi (route déjà protégée) | Réussi |
| Création avec données vides | Échec (aucune validation) | Réussi (erreurs de validation) |
| Le propriétaire modifie son annonce | – | Réussi |
| Le propriétaire supprime son annonce | – | Réussi |
| **Total** | **3 échecs sur 4** | **6/6** |

Un échec avant correction confirme l'anomalie ; la réussite après correction confirme que le correctif fonctionne sans casser le comportement normal.

## 4. Réexécution de la suite complète
Commande : `php artisan test`

| Indicateur | Semaine 6 | Semaine 10 |
|---|---|---|
| Tests | 36 | 55 |
| Réussis | 36 | 53 |
| Échecs | 0 | 0 |
| « Deprecated » | – | 2 |
| Assertions | 80 | 112 |
| Durée | 5,59 s | 3,03 s |

Les 2 tests « deprecated » (`AnimalTest`) ne sont pas des échecs : PHP 8.5 signale que la constante `PDO::MYSQL_ATTR_SSL_CA` (config/database.php, ligne 62) est dépréciée.

Autres campagnes :
- Tests e2e Playwright : [à compléter après réexécution] (semaine 9 : 9/9)
- Suite @regression : [à compléter] (semaine 9 : 6/6)
- Accessibilité : [à compléter après correction] (semaine 9 : 5 anomalies, 61 éléments)

## 5. Couverture
| Fonctionnalité | Tests | Couverte ? |
|---|---|---|
| Connexion | auth.spec.js, AuthenticationTest | Oui |
| Inscription | RegistrationTest | Oui (niveau Feature) |
| Création d'annonce | animal.spec.js, regression.spec.js, AnimalIntegrationTest | Oui |
| Modification / suppression d'annonce | AnimalIntegrationTest | Oui |
| Lost & Found (droits, validation) | LostFoundSecurityTest | Oui |
| API | AnimalApiTest (8 tests) | Oui |
| Navigation / accès protégés | navigation.spec.js | Oui |
| Profil, mot de passe, vérification e-mail | ProfileTest, Password*Test, EmailVerificationTest | Oui |
| Recherche et filtres Lost & Found | – | Non testée |
| Upload de photos (type, taille) | – | Non testé |
| Rôle administrateur | – | Non testé |

Couverture de code mesurée en semaine 6 : 49,9 %. Mesure semaine 10 : [à compléter avec `php artisan test --coverage`].

## 6. Risques résiduels
| Risque | Probabilité | Impact | Mitigation |
|---|---|---|---|
| Anomalies d'accessibilité non corrigées | [à compléter] | Moyen | Plan de correction (label du champ photo, contrastes CSS) |
| Upload de fichiers non couvert par un test | Moyenne | Élevé | Écrire un test d'upload (fichier non image refusé) |
| Recherche et filtre non vérifiés | Moyenne | Moyen | Test de la recherche combinée |
| Rôle administrateur non testé | [à compléter] | [à compléter] | Test des droits administrateur |
| Stabilité de la régression confirmée sur 2 passages seulement | Faible | Moyen | Répéter la suite plusieurs fois |
| Les tests e2e créent des données dans la base | Certaine | Faible | Nettoyage ou base de test dédiée |
| Mesures de performance faites en local uniquement | Moyenne | Moyen | Mesurer sur un environnement de préproduction |

## 7. Décision de livraison
Critères définis avant les résultats :
1. 0 anomalie critique ouverte
2. 100 % des tests de régression réussis
3. Anomalies restantes documentées avec un plan de correction

Décision proposée : **Go conditionnel** [à confirmer après réexécution de Playwright].

Arguments :
- **Résultats** : la faille critique (ANO-02) est corrigée et prouvée par un test (3 échecs avant, 6/6 après) ; la suite PHP passe sans échec (53 réussis, 2 deprecated).
- **Couverture** : les parcours principaux (connexion, annonces, API, droits) sont couverts ; la recherche, l'upload et l'administration ne le sont pas.
- **Risques** : les risques restants sont documentés avec une mitigation ; aucun n'est critique une fois ANO-02 corrigée.

Conditions de la livraison :
- Réexécution des tests e2e et de la suite @regression sans échec
- Test d'upload écrit et réussi (ANO-09)
- Correction ou plan daté pour les anomalies d'accessibilité

## 8. Bilan et leçons apprises
- La lecture de code a identifié les anomalies, mais seul un test exécuté les a prouvées.
- Un échec de test avant correction est une preuve utile, pas un problème.
- `phpunit.xml` pointait vers la base réelle (lignes SQLite commentées) : les tests de la campagne tournent maintenant sur SQLite en mémoire pour protéger la base de l'application.
- Les tests de la semaine 9 avaient échoué à cause d'erreurs dans les tests eux-mêmes, pas de l'application ; ici, les échecs révélaient de vraies failles.