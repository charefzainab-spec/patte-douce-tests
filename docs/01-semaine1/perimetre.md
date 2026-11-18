# Périmètre de test

## 1. Objectif
Définir ce qui sera vérifié et validé, avec quels types de tests, et ce qui est exclu.

## 2. Dans le périmètre
| Module | Types de tests | Priorité |
|---|---|---|
| F01 Authentification | fonctionnel, sécurité d'accès | Haute |
| F02 Annonces | CRUD, validation, autorisation, valeurs limites | Haute |
| F03 Upload photo | valeurs limites (taille), format | Haute |
| F05 Lost & Found | fonctionnel, validation, recherche | Moyenne |
| F06 Vétérinaires | droits par rôle, validation | Haute |
| F07 Utilisateurs (admin) | droits, validation des rôles | Haute |
| F08 API | codes 200/201/401/403/404/422 | Haute |
| F04 Recherche/filtres | fonctionnel | Moyenne |

## 3. Types de tests prévus
Unitaires, intégration (avec base de test), API, interface (parcours principal), un test non fonctionnel, régression.

## 4. Hors périmètre
- Sécurité de l'infrastructure et du serveur
- Tests de charge massifs
- Compatibilité avec d'anciens navigateurs
- [emails/notifications si absents]

## 5. Justification
Durée limitée à 10 semaines : l'effort est concentré sur les risques de criticité élevée (R01 à R06), qui touchent la sécurité et l'intégrité des données.

## 6. Environnement et données
Base de test séparée, `RefreshDatabase` pour la reproductibilité, seeders pour les données de départ.