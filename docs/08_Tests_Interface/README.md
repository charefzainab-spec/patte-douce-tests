\# Tests d'interface



\- Parcours automatisé (Playwright) : `tests/e2e/parcours-annonce.spec.js`

&#x20; (CT-57 : connexion, création d'une annonce, vérification ; CT-58 : mauvais mot de passe).

\- Exécution : serveur de test (`php artisan serve --env=testing --port=8001`),

&#x20; puis `npx playwright test`.

\- Tests exploratoires manuels : voir tests-manuels.md et les captures dans docs/preuves/manuel/.

\- Preuve : docs/preuves/playwright.txt.

