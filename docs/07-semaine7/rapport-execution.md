
# Rapport d'exécution — Semaine 7

## 1. Objectif

Présenter les résultats obtenus après l'exécution
des tests d'intégration et de la suite complète PHPUnit.

## 2. Première commande exécutée

```bash
php artisan test --filter=AnimalDatabaseIntegrationTest
```

Résultats :

| Indicateur | Résultat |
|------------|----------|
| Tests exécutés | 5 |
| Tests réussis | 5 |
| Tests échoués | 0 |
| Assertions | 5 |
| Durée | 1.52 seconde |

## 3. Deuxième commande exécutée

```bash
php artisan test
```

Résultats globaux :

| Indicateur | Résultat |
|------------|----------|
| Tests exécutés | 41 |
| Tests réussis | 41 |
| Tests échoués | 0 |
| Assertions | 85 |
| Durée | 5.07 secondes |

## 4. Vérification supplémentaire

La classe AnimalDatabaseIntegrationTest a été exécutée
une deuxième fois.

Résultat :

- 5 tests réussis.
- 0 test échoué.
- Durée : 2.70 secondes.

## 5. Conclusion

Tous les tests exécutés ont réussi.

Les résultats montrent que les opérations de base de données
testées fonctionnent correctement et que la suite complète
des tests Laravel ne présente aucun échec.
