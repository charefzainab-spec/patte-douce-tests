# Rapport de réexécution – Semaine 10

## 1. Contexte
Réexécution après correction des anomalies ANO-02, ANO-03, ANO-09 (upload), ANO-11, ANO-12 et ANO-13.

## 2. Résultats avant / après

| Indicateur | Avant correction | Après correction |
|---|---|---|
| LostFoundSecurityTest | 3 échecs sur 4 tests | 6/6 |
| LostFoundUploadTest | – | 3/3 (7 assertions) |
| AnimalApiSecurityTest | 2 échecs (401 attendu, 201 reçu ; user_id du body utilisé) | 4/4 (9 assertions) |
| AnimalApiTest | 8 tests (POST sans token) | 8 tests réécrits avec jeton Sanctum |
| Suite PHP complète | 36 tests (S6), 41 tests (S7) | 62 tests, 0 échec |
| Tests e2e Playwright | 9/9 (S9) | 9/9 (39,7 s) |
| Suite @regression | 6/6 (S9) | 6/6 (incluse dans les 9 tests e2e) |
| Accessibilité : anomalies | 5 | [à compléter] |
| Accessibilité : éléments concernés | 61 | [à compléter] |
| Couverture de code | 49,9 % (S6) | [à compléter, ou « non mesurée »] |

## 3. Remarques
- Les 3 tests de `AnimalApiTest` qui échouaient après la correction (401 reçu) vérifiaient l'ancien comportement (création sans jeton). Ils ont été réécrits : ce n'est pas une régression.
- Les warnings « deprecated » (`PDO::MYSQL_ATTR_SSL_CA`) étaient dus à PHP 8.5 ; ils sont corrigés dans `config/database.php`.
- Les tests PHP s'exécutent sur une base isolée ; la base de l'application n'est pas utilisée.
- ANO-13 (absence de `max:255` sur l'API) a d'abord été constatée par lecture du code : le premier test passait à tort, car le 422 venait d'un autre champ.

## 4. Conclusion
Les corrections des anomalies critiques sont vérifiées par des tests exécutés. [à compléter après Playwright]