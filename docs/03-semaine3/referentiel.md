# Référentiel d'exigences et critères d'acceptation
## Projet : Patte Douce — Livrable 3

## 1. Méthode
Les exigences décrivent le comportement attendu de l'application. Les valeurs chiffrées (longueurs, tailles, formats) sont relevées dans les règles de validation et les migrations ; les règles d'accès et de propriété sont déduites du besoin métier d'une application d'adoption et du principe du moindre privilège.

Le référentiel décrit ce qui doit être vrai. Un écart entre le code et une exigence n'est pas corrigé ici : il sera consigné comme anomalie lors des tests.

Priorité : Haute (sécurité, intégrité des données), Moyenne, Faible.

## 2. Exigences fonctionnelles

| ID | Exigence | Module | Priorité |
|---|---|---|---|
| EX-01 | À l'inscription, le nom (255 max) et l'email (format valide, 255 max, minuscules, unique) sont obligatoires ; le mot de passe est obligatoire, confirmé et conforme aux règles par défaut Laravel (8 caractères minimum) | F01 | Haute |
| EX-02 | Un utilisateur inscrit peut se connecter ; des identifiants erronés sont refusés ; un administrateur est redirigé vers /admin | F01 | Haute |
| EX-03 | Un nouvel inscrit reçoit toujours le rôle user ; le rôle admin ne peut pas être choisi à l'inscription | F01 | Haute |
| EX-04 | Les pages animaux, Lost & Found, vétérinaires et profil exigent une connexion ; un visiteur est redirigé vers /login | F01 | Haute |
| EX-05 | La création d'une annonce d'animal exige titre, race, âge, description et téléphone | F02 | Haute |
| EX-06 | Le titre et la race sont limités à 255 caractères | F02 | Haute |
| EX-07 | L'âge est un entier supérieur ou égal à 0 | F02 | Moyenne |
| EX-08 | Le téléphone d'une annonce est limité à 20 caractères et est enregistré puis réaffiché | F02 | Moyenne |
| EX-09 | La photo est facultative ; si elle est fournie, c'est une image jpg, jpeg, png ou webp de 2048 Ko maximum | F03 | Haute |
| EX-10 | Un utilisateur ne peut modifier ou supprimer que ses propres annonces d'animaux | F02 | Haute |
| EX-11 | Un utilisateur connecté peut publier un signalement Lost & Found avec type, description, localisation et contact | F05 | Moyenne |
| EX-12 | La modification et la suppression d'un signalement Lost & Found sont réservées à son propriétaire (ou à l'administrateur) | F05 | Haute |
| EX-13 | La photo d'un signalement Lost & Found est contrôlée (type image, taille maximale) | F03/F05 | Haute |
| EX-14 | La recherche et les filtres (animaux, Lost & Found) renvoient les éléments correspondants, sans erreur | F04 | Moyenne |
| EX-15 | Seul l'administrateur peut créer, modifier ou supprimer un vétérinaire | F06 | Haute |
| EX-16 | Un vétérinaire exige nom, email (format valide), téléphone et adresse | F06 | Moyenne |
| EX-17 | La gestion des utilisateurs (/users) est réservée à l'administrateur | F07 | Haute |
| EX-18 | Le rôle d'un utilisateur ne peut valoir que user ou admin ; l'email reste unique ; nom, email et mot de passe sont validés | F07 | Haute |
| EX-19 | POST /api/animals exige une authentification : sans jeton, la réponse est 401 | F08 | Haute |
| EX-20 | L'API applique les mêmes règles de validation que le formulaire web ; le propriétaire de l'annonce est l'utilisateur authentifié | F08 | Haute |
| EX-21 | Aucune page ne renvoie d'erreur 500 à la suite d'une entrée utilisateur | Général | Moyenne |
| EX-22 | Les mots de passe sont stockés hachés | F01 | Haute |

## 3. Ambiguïtés et hypothèses

| ID | Point ambigu | Hypothèse retenue |
|---|---|---|
| AMB-01 | Les routes /animals sont derrière le middleware auth, alors que l'API GET /api/animals est publique | Web : consultation réservée aux connectés ; API : lecture publique |
| AMB-02 | Deux séries de routes pour les vétérinaires : /vet/* (auth) et /admin/veterinaires/* (admin) | La gestion (création, modification, suppression) est réservée à l'admin ; /vet sert à la consultation |
| AMB-03 | L'administrateur peut-il modifier ou supprimer les annonces d'autrui ? | Oui, pour la modération |
| AMB-04 | Le formulaire utilise `telephone` alors que la migration ajoute une colonne `tel` | Le numéro saisi doit être enregistré et réaffiché, quel que soit le nom de la colonne |
| AMB-05 | Aucune règle de validation n'est visible pour Lost & Found | Type, description, localisation et contact sont obligatoires |
| AMB-06 | Le rôle à l'inscription est-il imposé côté serveur ? | Toujours user |
| AMB-07 | Que deviennent les annonces d'un utilisateur supprimé ? | À vérifier à l'exécution (aucune règle documentée) |
| AMB-08 | L'API n'expose que GET et POST (pas de PUT ni DELETE) | Périmètre API limité à la lecture et à la création |

## 4. Critères d'acceptation

| ID | Exigence | Critère d'acceptation (vérifiable) |
|---|---|---|
| CA-01 | EX-01 | Inscription valide : utilisateur créé. Email déjà utilisé, email invalide, nom vide, mot de passe de 7 caractères ou confirmation différente : refus avec message d'erreur |
| CA-02 | EX-02 | Bons identifiants : accès (admin redirigé vers /admin). Mauvais mot de passe : refus, pas de session |
| CA-03 | EX-03 | Une inscription envoyée avec role=admin crée un compte de rôle user |
| CA-04 | EX-04 | GET /animals, /lost-found, /vet, /profile sans session : redirection vers /login |
| CA-05 | EX-05 | Création sans l'un des 5 champs obligatoires : refus ; avec tous : annonce créée |
| CA-06 | EX-06 | Titre de 255 caractères accepté ; 256 refusé ; titre vide refusé ; idem pour la race |
| CA-07 | EX-07 | Âge 0 accepté ; -1 refusé ; 1,5 ou texte refusé |
| CA-08 | EX-08 | Téléphone de 20 caractères accepté ; 21 refusé ; valeur saisie réaffichée sur la fiche |
| CA-09 | EX-09 | Image png de 2048 Ko acceptée ; 2049 Ko refusée ; fichier .pdf ou .php refusé ; absence de photo acceptée |
| CA-10 | EX-10 | L'utilisateur B qui modifie ou supprime l'annonce de A reçoit 403 ; la base est inchangée |
| CA-11 | EX-11 | Signalement valide connecté : enregistré et visible dans la liste |
| CA-12 | EX-12 | L'utilisateur B qui modifie ou supprime le signalement de A reçoit 403 ; données inchangées |
| CA-13 | EX-13 | Fichier non image ou supérieur à la taille maximale : refusé |
| CA-14 | EX-14 | Une recherche par mot-clé et un filtre par type renvoient uniquement des résultats correspondants, statut 200 |
| CA-15 | EX-15 | Un utilisateur simple qui crée, modifie ou supprime un vétérinaire (via /vet ou /admin/veterinaires) reçoit 403 ; l'admin réussit |
| CA-16 | EX-16 | Email « abc » ou nom vide refusé ; données valides acceptées |
| CA-17 | EX-17 | Un utilisateur simple qui accède à /users ou à une action de gestion reçoit 403 ; l'admin accède |
| CA-18 | EX-18 | Rôle « superadmin », email déjà utilisé ou nom vide : refus ; rôle user ou admin : accepté |
| CA-19 | EX-19 | POST /api/animals sans jeton : 401 et aucune ligne créée ; avec jeton valide : 201 |
| CA-20 | EX-20 | POST /api/animals avec un jeton : l'annonce appartient à l'utilisateur du jeton ; titre de 256 caractères refusé (422) |
| CA-21 | EX-21 | Recherches (y compris caractères spéciaux), pages de détail et formulaires avec entrées invalides : statut jamais 500 |
| CA-22 | EX-22 | Le mot de passe enregistré en base est différent du mot de passe saisi (hash) |

## 5. Différence avec RéclaGest
RéclaGest décrit des exigences autour des réclamations (statuts de NOUVELLE à CLÔTURÉE, rôles multiples). Patte Douce porte sur des annonces et signalements, sans cycle de statuts, avec deux rôles (user, admin) et le visiteur. Les exigences portent donc sur la validation, la propriété des données et les droits d'accès.