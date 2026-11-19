# Rapport de réexécution – Semaine 10

## 1. Contexte
Réexécution après correction d'ANO-02 (propriétaire), ANO-03 (validation) et du volet upload d'ANO-09 dans LostFoundController.

## 2. Résultats avant / après

| Indicateur | Avant correction | Après correction |
|---|---|---|
| LostFoundSecurityTest | 3 échecs sur 4 tests | 6/6 |
| LostFoundUploadTest | – | [à compléter] |
| Suite PHP complète (`php artisan test`) | 36 tests (S6) | [à compléter] |
| Tests e2e Playwright | 9/9 (S9) | [à compléter] |
| Suite @regression | 6/6 (S9) | [à compléter] |
| Accessibilité : anomalies | 5 | [à compléter] |
| Accessibilité : éléments concernés | 61 | [à compléter] |

## 3. Remarques
- Les 2 tests « deprecated » (AnimalTest) viennent de PHP 8.5 (`PDO::MYSQL_ATTR_SSL_CA`, config/database.php ligne 62), pas de l'application.
- Les tests PHP utilisent SQLite en mémoire (phpunit.xml) : la base MySQL de l'application n'est pas touchée.

## 4. Conclusion
[à compléter après les relances]