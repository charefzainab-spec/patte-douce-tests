# Rapport d'exécution — Semaine 6

## 1. Commande exécutée

php artisan test --coverage

## 2. Résultats globaux

| Indicateur | Résultat |
|------------|----------|
| Tests réussis | 36 |
| Tests échoués | 0 |
| Assertions | 80 |
| Durée | 5.59 secondes |
| Couverture globale | 49.9 % |

## 3. Résultats des tests unitaires

| Test | Résultat |
|------|----------|
| animal uses animals table | PASS |
| animal has correct fillable attributes | PASS |
| animal belongs to user | PASS |
| animal uses user id as foreign key | PASS |
| animal relation references user model | PASS |

## 4. Résultats des tests Feature

Les tests d'intégration des animaux sont réussis :

- Création d'un animal.
- Consultation des animaux.
- Modification d'un animal.
- Suppression d'un animal.
- Refus de création sans titre.
- Refus d'une référence utilisateur inexistante.

Les tests d'authentification, de profil et de gestion des mots de passe sont également réussis.

## 5. Conclusion

L'exécution confirme que les 36 tests sont passés avec succès
et que 80 assertions ont été vérifiées.

Aucune erreur n'a été détectée.
