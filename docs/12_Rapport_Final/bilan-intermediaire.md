# Bilan intermédiaire de la campagne (avant corrections)

Date d'exécution : 14/11/2026. Outil : PHPUnit 10.5.63, PHP 8.1.10, Laravel 10.50.2.
Preuve : docs/preuves/execution-avant-corrections.txt

## Résultats
| Indicateur | Valeur |
|---|---|
| Tests exécutés | 97 (14 unitaires, 83 fonctionnels et d'intégration) |
| Réussis | 79 (81,4 %) |
| En échec | 18 |
| Assertions | 471 |
| Couverture de lignes (application) | 79,39 % (312/393) |
| Couverture AnimalController / LostFoundController / VeterinaireController | 86,36 % / 86,96 % / 71,74 % |

## Anomalies confirmées : 13
- 1 critique : AN-03 (création d'annonces par l'API sans authentification).
- 8 majeures : AN-01, AN-02, AN-05, AN-07, AN-08, AN-09, AN-10, AN-14.
- 4 mineures : AN-04, AN-11, AN-12, AN-13.
- 1 hypothèse écartée : AN-06.

## Zones saines
- Validation de la création d'une annonce et valeurs limites (titre, âge, téléphone, description).
- Validation de la photo (type et 2 Mo).
- Protection de l'espace administrateur (visiteur, utilisateur, administrateur).
- Mot de passe haché sans double hachage, masqué dans les réponses.
- Pas d'élévation de privilège à l'inscription.
- Suppression en cascade des annonces d'un utilisateur supprimé.
- Pages principales et recherches d'animaux.

## Thèmes dominants
1. Contrôle d'accès incomplet : propriétaire des annonces (AN-01, AN-10), rôle administrateur sur les vétérinaires (AN-05), authentification de l'API (AN-03).
2. Validation absente à la modification et sur certains formulaires (AN-02, AN-08, AN-11, AN-12, AN-13, AN-14).
3. Erreurs serveur sur deux fonctions (AN-07, AN-09).

## État par rapport aux critères de sortie du plan de test
| Critère | État |
|---|---|
| 100 % des cas exécutés avec preuves | atteint pour les cas automatisés ; parcours d'interface et test non fonctionnel à faire |
| Tests de priorité 1 (contrôle d'accès) tous réussis | non atteint (AN-01, AN-03, AN-05, AN-10) |
| Aucune anomalie critique ou majeure ouverte | non atteint (1 critique, 8 majeures) |
| Couverture des 3 contrôleurs au moins 70 % | atteint |
| Suite de régression sans échec | à vérifier après corrections |

## Décision provisoire
Refus de livraison dans l'état actuel (anomalie critique ouverte, exigence essentielle
de contrôle d'accès non satisfaite). La décision sera réexaminée en semaine 10 après corrections et réexécution.