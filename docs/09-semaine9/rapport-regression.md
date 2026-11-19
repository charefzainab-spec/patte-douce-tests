Rapport de régression – Patte Douce (Semaine 9)
1. Objectif

Vérifier que les fonctionnalités principales restent opérationnelles après chaque modification de l'application ou des tests.

2. Méthode

Les tests critiques sont marqués @regression et lancés avec :

npx playwright test --grep "@regression" --project=chromium

Configuration : Chromium, workers: 1 (tests exécutés en série), serveur local php artisan serve.

3. Tests inclus dans la suite
#	Fichier	Test	Tag
1	auth.spec.js	Connexion utilisateur réussie	@regression
2	animal.spec.js	Création d'une annonce animal	@regression
3	navigation.spec.js	Pages publiques accessibles	@regression
4	navigation.spec.js	Navigation par le menu après connexion	@regression
5	navigation.spec.js	Accès à /user refusé sans connexion	@regression
6	regression.spec.js	Parcours critique : connexion, création, vérification	@regression

Tests présents dans les fichiers mais hors suite de régression (sans tag) : connexion refusée avec un mauvais mot de passe (auth.spec.js, [à exécuter et noter le résultat]), formulaire refusé si le titre est vide (animal.spec.js, réussi lors de son exécution), accès à /animals refusé sans connexion (navigation.spec.js, réussi).

4. Historique des exécutions
#	Périmètre	Réussis	Échoués	Durée	Remarque
1	Suite @regression (3 tests à l'époque)	2/3	1	38,8 s	Échec : locator a[href="/"] introuvable sur la page profil
2	navigation.spec.js seul	3/4	1	–	Échec : URL attendue /, reçue /dashboard
3	navigation.spec.js seul	4/4	0	15,4 s	Après correction de l'attente d'URL
4	Suite @regression (4 tests)	4/4	0	16,1 s	2 workers
5	Suite @regression (6 tests)	5/6	1	28,9 s	4 workers ; échec par timeout sur le clic du logo (instabilité)
6	Suite @regression (6 tests)	6/6	0	19,9 s	workers: 1, attente de 5 s retirée

Dernière exécution : 6 tests sur 6 réussis.

5. Échecs constatés et corrections
Exécution	Test	Message d'erreur	Cause	Correction
1	Navigation par le menu	waiting for locator('a[href="/"]') (timeout)	Le lien du logo n'a pas href="/" mais une URL complète vers /dashboard	Locator basé sur le texte : getByRole('link', { name: /Patte Douce/ })
2	Navigation par le menu	URL reçue http://127.0.0.1:8000/dashboard	Un utilisateur connecté est redirigé vers /dashboard, le test attendait /	Accepter / ou /dashboard
5	Navigation par le menu	locator.click: Timeout 5000ms exceeded	Timeout trop court et 4 tests en parallèle sur un serveur local peu réactif	Suppression du timeout de 5 s et workers: 1

Ces trois échecs étaient des erreurs dans les tests (locator, URL attendue, timeout), pas des défauts de l'application.

6. Limites
La suite n'a été exécutée en totalité avec succès qu'une seule fois (exécution 6) ; la stabilité n'est pas encore confirmée sur plusieurs passages. [Relancer 2 fois et noter les résultats ici.]
Chaque exécution crée de vraies annonces de test dans la base (tests de création) ; la base n'est pas nettoyée automatiquement.
Mesures faites sur serveur local uniquement.
7. Conclusion

La suite de régression compte 6 tests couvrant la connexion, la création d'une annonce, la navigation et la protection des pages. Elle passe à 6/6 après correction de trois erreurs de test, dont une instabilité liée à l'exécution en parallèle sur le serveur local. [Compléter après les exécutions de confirmation.]