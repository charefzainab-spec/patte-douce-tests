# Analyse de la couverture de code

## 1. Outil utilisé

Xdebug a été utilisé pour mesurer la couverture du code
pendant l'exécution des tests Laravel.

## 2. Résultats

| Classe | Couverture |
|--------|------------|
| Animal | 100 % |
| AnimalController | 62.5 % |
| LostFoundController | 0 % |
| VeterinaireController | 0 % |
| User | 0 % |
| Exceptions Handler | 100 % |
| Couverture globale | 49.9 % |

## 3. Interprétation

Le modèle Animal possède une couverture de 100 %.

Le contrôleur AnimalController possède une couverture de 62.5 %.
Certaines fonctionnalités restent à tester.

Les contrôleurs LostFoundController et VeterinaireController
ne sont pas couverts par les tests exécutés.

La couverture globale est de 49.9 %.

## 4. Améliorations proposées

- Ajouter des tests pour les annonces Lost & Found.
- Ajouter des tests pour les vétérinaires.
- Tester les validations du contrôleur Animal.
- Tester les permissions des utilisateurs.
- Augmenter progressivement la couverture globale.

## 5. Conclusion

La couverture obtenue constitue une première mesure.
Des tests supplémentaires permettront d'améliorer
la qualité et la fiabilité de l'application.
