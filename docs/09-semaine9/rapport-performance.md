Rapport de performance – Patte Douce (Semaine 9)
1. Objectif

Mesurer les temps de chargement des pages principales et les comparer à des seuils définis.

2. Méthode
Outil : Playwright (performance.getEntriesByType('navigation') pour DCL et Load ; PerformanceObserver pour LCP ; entrée first-contentful-paint pour FCP)
Fichier : tests/non-fonctionnels/performance.spec.js
Environnement : serveur local (Laragon / php artisan serve), Chromium
Commande : npx playwright test tests/non-fonctionnels/performance.spec.js --project=chromium
Les pages /animals et /animals/create sont mesurées après connexion.
3. Seuils
Indicateur	Seuil	Vérifié par le test ?
Temps de chargement (Load)	< 3000 ms	Oui (le test échoue au-delà)
FCP	≤ 1800 ms (valeur « bon » de Google Web Vitals)	Non, comparaison indicative
LCP	≤ 2500 ms (valeur « bon » de Google Web Vitals)	Non, comparaison indicative
DOMContentLoaded	Aucun seuil fixé	Non, mesure à titre d'information
4. Mesures (une exécution)
Page	DCL (ms)	Load (ms)	FCP (ms)	LCP (ms)	Seuil Load respecté
Accueil /	241	243	496	496	Oui
Connexion /login	230	243	420	420	Oui
Liste des animaux /animals	352	445	488	508	Oui
Formulaire annonce /animals/create	329	333	396	396	Oui

Moyennes (calculées sur les 4 pages) : Load ≈ 316 ms ; LCP ≈ 455 ms.

5. Analyse
Toutes les pages se chargent en moins de 0,5 s, très en dessous du seuil de 3 s.
La liste des animaux est la page la plus lente (Load 445 ms), ce qui est cohérent avec le fait qu'elle charge des données et des images ; elle reste largement dans le seuil.
Pour chaque page, FCP et LCP sont proches : le contenu principal s'affiche dès le premier rendu.
6. Limites
Mesures faites sur un serveur local, sans latence réseau ni charge : elles ne représentent pas la production.
Une seule exécution par page ; les valeurs peuvent varier d'un passage à l'autre. Pour plus de fiabilité, répéter la mesure plusieurs fois et prendre la moyenne ou la médiane.
La liste des animaux contenait peu de données au moment du test ; le temps peut augmenter avec le nombre d'annonces (pagination à envisager).
7. Conclusion

Les performances mesurées sont bonnes sur les 4 pages testées en environnement local. Un test sur un environnement proche de la production et avec davantage de données serait nécessaire pour confirmer ces résultats.