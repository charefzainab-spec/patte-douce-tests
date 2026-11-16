\# Couverture de code (Xdebug 3.5.3, PHPUnit 10.5.63)



\## Évolution globale

| Mesure | Lignes | Méthodes |

|---|---|---|

| Après tests de contrôle d'accès et de validation (62 tests) | 67,43 % | 48,75 % |

| Après tests des pages et recherches (67 tests) | 79,39 % | 65,00 % |

| Après corrections des anomalies (15/11/2026) | 82,19 % | 70,73 % |

| Finale, après tests complémentaires | à compléter | à compléter |



\## Contrôleurs visés par le critère de sortie (lignes, seuil 70 %)

| Contrôleur | 62 tests | 67 tests | Après corrections | Finale |

|---|---|---|---|---|

| AnimalController | 62,50 % | 86,36 % | 93,46 % | à compléter |

| LostFoundController | 60,87 % | 86,96 % | 57,58 % (non atteint) | à compléter |

| VeterinaireController | 45,65 % | 71,74 % | 72,34 % | à compléter |

| AdminUserController | 8,70 % | non mesuré | 89,29 % | à compléter |



\## Interprétation

\- Corriger du code sans ajouter de tests fait baisser la couverture : les validations ajoutées

&#x20; à LostFoundController (46 à 66 lignes) ont fait passer le contrôleur sous 70 %, d'où l'ajout

&#x20; de tests complémentaires (LostFoundCrudTest, VetSearchTest).

\- Les chiffres des premières mesures incluent des lignes exécutées par des tests en échec :

&#x20; la couverture mesure ce qui est exécuté, pas ce qui est correct.

\- Points faibles restants : AnimalApiController (1 méthode sur 3), contrôleurs d'authentification Breeze.



\## Preuves

docs/preuves/couverture-actuelle.txt, couverture-apres-lecture.txt, couverture-finale.txt



