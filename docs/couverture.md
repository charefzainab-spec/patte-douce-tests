# Couverture de code (Xdebug 3.5.3, PHPUnit 10.5.63)

| Mesure | Lignes | Méthodes |
|---|---|---|
| Application entière (état de départ, 31 tests) | non mesurée | non mesurée |
| Après tests de contrôle d'accès et de validation (62 tests) | 67,43 % | 48,75 % |
| Après tests des pages et recherches (67 tests) | 79,39 % | 65,00 % |

| Contrôleur | Lignes avant | Lignes après | Critère ≥ 70 % |
|---|---|---|---|
| AnimalController | 62,50 % | 86,36 % | atteint |
| LostFoundController | 60,87 % | 86,96 % | atteint |
| VeterinaireController | 45,65 % | 71,74 % | atteint |

## Limites
- Les chiffres incluent les lignes exécutées par des tests en échec (anomalies confirmées) :
  la couverture mesure ce qui est exécuté, pas ce qui est correct.
- AdminUserController (gestion des utilisateurs) n'est couvert qu'à 8,70 % des lignes.
- AnimalApiController : 1 méthode sur 3 exécutée.
- Preuves : docs/preuves/couverture-actuelle.txt, docs/preuves/couverture-apres-lecture.txt