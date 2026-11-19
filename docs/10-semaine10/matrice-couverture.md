# Matrice de couverture – Semaine 10

| Fonctionnalité | Tests | Niveau | Couverte ? |
|---|---|---|---|
| Connexion | auth.spec.js, AuthenticationTest | E2E + Feature | Oui |
| Inscription | RegistrationTest | Feature | Oui |
| Création d'annonce animal | animal.spec.js, regression.spec.js, AnimalIntegrationTest | E2E + Feature | Oui |
| Modification / suppression d'annonce animal | AnimalIntegrationTest, AnimalDatabaseIntegrationTest | Feature | Oui |
| Validation (titre vide) | animal.spec.js, AnimalIntegrationTest | E2E + Feature | Oui |
| API animaux | AnimalApiTest | Feature | Oui |
| Navigation et accès protégés | navigation.spec.js | E2E | Oui |
| Profil, mot de passe, e-mail | ProfileTest, Password*Test, EmailVerificationTest | Feature | Oui |
| Lost & Found : droits et validation | LostFoundSecurityTest | Feature | [à confirmer après relance] |
| Lost & Found : upload de photo | LostFoundUploadTest | Feature | [à confirmer après relance] |
| Lost & Found : recherche et filtre | – | – | Non testée |
| Rôle administrateur | – | – | Non testé |
| Accessibilité | accessibility.spec.js | E2E | Oui (5 anomalies détectées en S9) |
| Performance | [à compléter] | – | Local uniquement |

Couverture de code : 49,9 % (S6). Mesure S10 : [à compléter].

## Lecture
La couverture fonctionnelle est bonne sur les parcours principaux. Les zones non couvertes (recherche Lost & Found, administration) sont reprises dans les risques résiduels.