\# Test non fonctionnel : performance (k6 v1.8.3)



\## Objectif

Mesurer le temps de réponse et la fiabilité de la liste des animaux de l'API

(GET /api/animals) et de la page de connexion sous charge légère.



\## Protocole

\- Outil : k6 v1.8.3, scripts dans perf/ (liste-animaux.js, accueil.js).

\- Environnement : application servie par `php artisan serve` (serveur de développement),

&#x20; base animal\_adoption\_test avec 30 animaux, machine locale Windows.

\- Seuils : p(95) du temps de réponse inférieur à 800 ms ; moins de 1 % d'erreurs.

\- Preuves : docs/preuves/k6-\*.txt.



\## Résultats

| Scénario | Requêtes | Erreurs | Moyenne | p(95) | Seuils |

|---|---|---|---|---|---|

| API, 1 utilisateur, 30 s | 27 | 0 % | 115 ms | 190 ms | respectés |

| Page /login, 10 utilisateurs, 30 s | 278 | 0 % | 93 ms | 199 ms | respectés |

| API, 10 utilisateurs, 30 s | 273 | 78 % de réponses 429 | 115 ms (toutes) | 357 ms (toutes) ; 947 ms (acceptées) | seuil d'erreur dépassé |



\## Observations

1\. L'API applique la limitation `throttle:api`, fixée à 60 requêtes par minute et par

&#x20;  utilisateur ou adresse IP (RouteServiceProvider). Sous 10 utilisateurs, 213 requêtes sur

&#x20;  273 ont reçu un 429. C'est une protection utile, pas une anomalie, mais elle empêche

&#x20;  de mesurer l'API sous charge depuis une seule machine.

2\. Sur la page de connexion, 10 utilisateurs simultanés n'ont causé aucune erreur

&#x20;  (p(95) = 199 ms).

3\. Sur les requêtes acceptées de l'API sous 10 utilisateurs, le p(95) est proche

&#x20;  ou supérieur au seuil de 800 ms (785 ms puis 947 ms, sur 60 échantillons seulement).

4\. GET /api/animals renvoie tous les animaux sans pagination : le temps de réponse

&#x20;  et le volume de données augmenteront avec la table (risque, non confirmé par un test).



\## Limites

\- Serveur de développement à un seul processus : les chiffres ne représentent pas une production.

\- Charge faible (10 utilisateurs, 30 secondes), 30 animaux, une seule machine.

\- Peu d'échantillons acceptés sous 10 utilisateurs (60) : p(95) instable.

\- Pas de test sur les pages authentifiées, ni d'endurance ni de pic.



\## Recommandations

\- Ajouter une pagination à GET /api/animals.

\- Tester sur un serveur de type production (PHP-FPM, Apache ou Nginx) avant livraison.

\- Si une charge plus élevée est attendue, adapter ou documenter le quota de l'API.

