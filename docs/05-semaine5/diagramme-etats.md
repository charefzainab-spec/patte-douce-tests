1. Diagramme d'états – Module Lost & Found
1.1 Objectif

L'objectif est de modéliser le cycle de vie d'une annonce Lost & Found dans l'application Patte Douce.

Le diagramme représente les différents états possibles d'une annonce ainsi que les transitions entre ces états.

1.2 États proposés
Brouillon : annonce en cours de préparation.
Publiée : annonce visible par les utilisateurs.
En cours de traitement : une démarche de recherche ou de récupération est en cours.
Résolue : animal retrouvé ou situation résolue.
Clôturée : annonce définitivement terminée.

Remarque : ces états constituent une proposition d'évolution. Le code actuel ne contient pas encore de champ statut dans la table lost_founds.

1.3 Diagramme d'états
mermaid
stateDiagram-v2
    [*] --> Brouillon
    Brouillon --> Publiee : Publier annonce
    Publiee --> EnCours : Début traitement
    EnCours --> Resolue : Problème résolu
    EnCours --> Publiee : Reprise annonce
    Resolue --> Cloturee : Clôturer annonce
    Publiee --> Cloturee : Annuler annonce
    Cloturee --> [*]

1.4 Description

Une annonce commence à l'état Brouillon.

Après validation, elle passe à l'état Publiée et devient visible aux utilisateurs.

Lorsqu'une personne commence à traiter l'annonce, elle passe à l'état En cours de traitement.

Si l'animal est retrouvé ou la situation réglée, l'annonce passe à l'état Résolue.

Enfin, l'annonce peut être clôturée définitivement.

Les transitions doivent respecter les droits des utilisateurs et des administrateurs.