Rapport d'accessibilité – Patte Douce (Semaine 9)
1. Objectif

Vérifier la conformité de l'interface aux critères WCAG 2.0 A / AA avec axe-core (@axe-core/playwright).

2. Méthode
Outil : Playwright + AxeBuilder (tags wcag2a, wcag2aa)
Fichier : tests/non-fonctionnels/accessibility.spec.js
Commande : npx playwright test tests/non-fonctionnels/accessibility.spec.js --project=chromium
Audit documentaire : les tests n'échouent pas sur les anomalies, elles sont relevées et listées ici.
3. Pages testées
Page	URL	Règles en échec	Éléments concernés	Statut
Accueil	/	1	11	Anomalies détectées
Connexion	/login	1	4	Anomalies détectées
Formulaire d'annonce (connecté)	/animals/create	2	2	Anomalies détectées
Liste des animaux (connecté)	/animals	1	44	Anomalies détectées

Remarque : /animals nécessite une connexion (redirection vers /login sinon) ; le test se connecte donc avant l'audit.

4. Détail des anomalies
#	Page	Règle axe-core	Gravité	Éléments	Exemple d'élément	Correction proposée
1	Accueil	color-contrast	serious	11	.nav-links > a[href$="register"]	Foncer la couleur du texte ou éclaircir/foncer le fond pour atteindre un ratio d'au moins 4.5:1 (3:1 pour le grand texte)
2	Connexion	color-contrast	serious	4	.login-header > p	Même correction : augmenter le contraste du texte
3	Liste des animaux	color-contrast	serious	44	.nav-links > .active[href$="animals"]	Augmenter le contraste du lien actif du menu et des textes concernés
4	Formulaire d'annonce	color-contrast	serious	1	button	Augmenter le contraste entre le texte et le fond du bouton
5	Formulaire d'annonce	label	critical	1	input[type="file"]	Ajouter un <label for="..."> associé au champ photo, ou un aria-label
5. Synthèse
Pages auditées : 4 sur 4
Anomalies (règles en échec) : 5
Éléments concernés : 61 (11 + 4 + 44 + 2)
Critiques : 1 (champ photo sans label) ; sérieuses : 4 (contraste)
Page la plus touchée : liste des animaux (44 éléments)
6. Conclusion

Les deux types de problèmes relevés sont le contraste des couleurs (présent sur toutes les pages) et l'absence de label sur le champ photo du formulaire. Ces corrections sont simples à appliquer dans les vues Blade / le CSS. Le contraste est présent sur les 4 pages et semble venir de couleurs partagées (menu, textes secondaires) : corriger la feuille de style commune devrait résoudre la majorité des 61 éléments. [Si les corrections sont appliquées, relancer les tests et noter le résultat après correction.]

Limite : l'audit automatique détecte environ une partie seulement des problèmes d'accessibilité ; un contrôle manuel (navigation clavier, lecteur d'écran) reste nécessaire pour une conformité complète.