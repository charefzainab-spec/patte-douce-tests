4. Fiches d'anomalies
4.1 Objectif

Cette section permet de documenter les anomalies découvertes pendant les tests exploratoires.

4.2 Fiche ANO-01 : Absence de gestion des états
ID : ANO-01
Module : Lost & Found
Type : Anomalie fonctionnelle
Priorité : Moyenne
Description : La table lost_founds ne possède pas de champ statut permettant de suivre le cycle de vie d'une annonce.
Étapes de reproduction :
Ouvrir le projet Laravel.
Consulter la migration create_lost_founds_table.php.
Vérifier les colonnes définies.
Résultat observé : Aucun champ statut n'est défini.
Résultat attendu : Un champ statut devrait permettre de gérer les différentes étapes de l'annonce.
Proposition de correction : Ajouter un champ statut avec des valeurs contrôlées.
4.3 Fiche ANO-02 : Contrôle de propriété des annonces
ID : ANO-02
Module : Lost & Found
Type : Sécurité
Priorité : Élevée
Description : Les méthodes update et destroy du contrôleur ne montrent pas de vérification explicite de propriété de l'annonce.
Étapes de reproduction :
Créer une annonce avec un premier utilisateur.
Se connecter avec un autre utilisateur.
Tenter de modifier ou supprimer l'annonce du premier utilisateur.
Résultat attendu : L'accès doit être refusé si l'utilisateur n'est pas autorisé.
Proposition de correction : Ajouter une vérification de propriété ou utiliser des Policies Laravel.
Statut : À vérifier par un test réel.
4.4 Fiche ANO-03 : Validation des données
ID : ANO-03
Module : Lost & Found
Type : Validation
Priorité : Moyenne
Description : La méthode store utilise directement les données de la requête sans validation explicite.
Étapes de reproduction :
Ouvrir le formulaire de création.
Soumettre des données invalides.
Observer le comportement du serveur.
Résultat attendu : Les données incorrectes doivent être rejetées.
Proposition de correction : Ajouter une validation Laravel avec des règles adaptées.
Statut : À vérifier par un test réel.
4.5 Bilan

Les anomalies identifiées à partir de l'inspection du code constituent des points à vérifier et à corriger.

Les résultats des tests exploratoires doivent être complétés après leur exécution effective.