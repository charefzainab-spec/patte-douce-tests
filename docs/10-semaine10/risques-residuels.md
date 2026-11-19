# Risques résiduels – Semaine 10

| # | Risque | Probabilité | Impact | Mitigation | Statut |
|---|---|---|---|---|---|
| R1 | Droits sur les vétérinaires et la gestion des utilisateurs non testés (EX-15, EX-17) | Moyenne | Élevé | Tests d'autorisation (403 pour un utilisateur simple) | Ouvert |
| R2 | Anomalies d'accessibilité non corrigées (label du champ photo, contrastes) | Élevée | Moyen | Correction du label et des couleurs, nouvelle exécution d'axe | Ouvert |
| R3 | Recherche combinée au filtre de type non vérifiée (ANO-10) | Moyenne | Moyen | Test de la recherche combinée | Ouvert |
| R4 | Couverture de code non mesurée en S10 (49,9 % en S6, seuil du plan : 70 %) | Élevée | Moyen | Installer une extension de couverture compatible avec la version de PHP | Ouvert |
| R5 | Stabilité de la régression confirmée sur 4 passages seulement (6/6 à chaque fois) | Faible | Moyen | Répéter la suite plus souvent | Réduit |
| R6 | Les tests e2e créent des annonces et des images dans l'application | Certaine | Faible | Base de test dédiée, nettoyage de `public/uploads` | Ouvert |
| R7 | Mesures de performance faites en local uniquement | Moyenne | Moyen | Mesure sur un environnement de préproduction | Ouvert |
| R8 | Rôle administrateur sur Lost & Found non testé (EX-12) | Moyenne | Moyen | Test des droits admin | Ouvert |

Échelle : probabilité (Faible, Moyenne, Élevée, Certaine) ; impact (Faible, Moyen, Élevé).

## Risques traités pendant la campagne
- Modification ou suppression des annonces d'autrui (ANO-02) : corrigé, 6 tests verts.
- Création d'annonce par l'API sans authentification (ANO-11) et usurpation d'identité par `user_id` (ANO-12) : corrigés, 4 tests verts.
- Upload sans contrôle (ANO-09) : fichier PHP et fichier de 3 000 Ko refusés, 3 tests verts.