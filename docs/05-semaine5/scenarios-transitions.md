2. Scénarios de transitions
2.1 Objectif

Vérifier que les transitions entre les différents états d'une annonce Lost & Found respectent les règles métier.

2.2 Transitions autorisées
État initial	Action	État final
Brouillon	Publier	Publiée
Publiée	Commencer traitement	En cours
En cours	Résoudre	Résolue
En cours	Reprendre annonce	Publiée
Résolue	Clôturer	Clôturée
Publiée	Annuler	Clôturée
2.3 Transitions interdites
État initial	Action	Résultat attendu
Brouillon	Clôturer directement	Refus
Clôturée	Publier	Refus
Résolue	Reprendre traitement	Refus
Brouillon	Résoudre	Refus
Clôturée	Modifier le statut	Refus
2.4 Vérification des droits par rôle
Utilisateur
Créer une annonce.
Consulter les annonces.
Modifier ses propres annonces selon les règles définies.
Supprimer ses propres annonces selon les règles définies.
Administrateur
Consulter toutes les annonces.
Superviser les annonces.
Gérer les situations nécessitant une intervention administrative.
Contrôler les opérations sensibles.
2.5 Résultat attendu

Chaque transition doit être autorisée uniquement lorsque l'état initial et le rôle de l'utilisateur respectent les règles métier.

Les transitions interdites doivent être rejetées avec un message explicatif.

Remarque : les règles présentées constituent les règles métier proposées pour les tests. Elles ne sont pas encore toutes implémentées dans le projet actuel.