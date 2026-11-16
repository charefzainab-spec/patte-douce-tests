\# Tests automatisés (PHPUnit)



Le code des tests est dans `tests/Unit` et `tests/Feature`. Il n'est pas copié ici

car les outils le lisent à cet emplacement.



\## Exécution

\- Campagne complète : `vendor\\bin\\phpunit --testsuite Unit,Feature`

\- Suite de régression : `vendor\\bin\\phpunit --testsuite Regression`

\- Couverture : `vendor\\bin\\phpunit --testsuite Unit,Feature --coverage-text=docs\\preuves\\couverture-finale.txt`



\## Contenu

| Niveau | Fichiers |

|---|---|

| Unitaire | AdminMiddlewareTest, UserModelTest, AnimalModelTest |

| Intégration et système | AnimalIntegrationTest, AnimalValidationTest, PhotoUploadTest, AnimalAuthorizationTest, AnimalBugsTest, LostFoundTest, RoleAccessTest, VetValidationTest, VetAdminTest, AdminUserTest, PagesDisplayTest |



\## Preuves

docs/preuves/ : execution-avant-corrections.txt, execution-apres-corrections.txt,

regression-\*.txt, tests-unitaires.txt.

