\# Tests de l'API REST



\- Collection Postman : `tests/api/patte-douce.postman\_collection.json`

\- Tests PHPUnit de l'API : `tests/Feature/AnimalApiTest.php`

\- Exécution Postman : importer la collection, renseigner la variable `token`, lancer le Collection Runner

&#x20; (ou `newman run tests\\api\\patte-douce.postman\_collection.json`).

\- Changement de contrat (correction AN-03) : POST /api/animals exige un jeton Sanctum ;

&#x20; le champ user\_id n'est plus accepté.

\- Preuves : docs/preuves/postman-apres-corrections.txt (et capture du Collection Runner).

