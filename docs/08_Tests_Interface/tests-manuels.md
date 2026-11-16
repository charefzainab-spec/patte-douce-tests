\# Tests exploratoires manuels



Environnement : serveur de test (php artisan serve --env=testing --port=8001), navigateur,

comptes Alice et Bob (utilisateurs), Admin (administrateur). Captures dans docs/preuves/manuel/.



| Date | Objectif | Étapes | Attendu | Obtenu | Capture |

|---|---|---|---|---|---|

| | AN-01 : annonce d'un autre | Alice publie une annonce ; Bob ouvre /animals/{id}/edit | Page 403 | | |

| | AN-01 : suppression | Bob tente de supprimer l'annonce d'Alice | 403, annonce conservée | | |

| | AN-05 : vétérinaires | Bob ouvre /vet/create | 403 ou 404 | | |

| | AN-08 : Lost \& Found vide | Envoyer le formulaire vide | Messages d'erreur affichés | | |

| | AN-09 : recherche | Taper un mot dans la recherche Lost \& Found | Résultats, pas d'erreur | | |

| | AN-11 : email vétérinaire | Admin crée un vétérinaire avec « abc » comme email | Message d'erreur sur l'email | | |

| | AN-02 : titre vide | Modifier une annonce avec un titre vide | Message d'erreur sur le titre | | |

| | AN-14 : email déjà pris | Admin modifie un utilisateur avec l'email d'un autre | Message d'erreur sur l'email | | |

| | Suppression par l'admin | Admin supprime l'annonce d'Alice | Annonce supprimée | | |



\## Observations libres

(Notes sur tout comportement inattendu : messages absents, libellés, ergonomie.)



