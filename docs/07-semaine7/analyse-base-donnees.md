
# Analyse de la base de données — Semaine 7

## 1. Objectif

L'objectif est de vérifier la cohérence des données
et les relations entre les utilisateurs et les animaux
dans l'application Patte Douce.

## 2. Persistance des données

Le test test_animal_is_persisted_in_database vérifie
qu'un animal créé est correctement enregistré
dans la table animals.

Résultat : PASS.

## 3. Modification des données

Le test test_animal_update_is_persisted vérifie
que les modifications du titre et de l'âge
sont bien enregistrées dans la base de données.

Résultat : PASS.

## 4. Suppression des données

Le test test_animal_is_deleted_from_database vérifie
que l'animal supprimé n'existe plus dans la table animals.

Résultat : PASS.

## 5. Contraintes d'intégrité

### Clé étrangère

Le test test_animal_cannot_reference_nonexistent_user
vérifie qu'un animal ne peut pas être associé
à un utilisateur inexistant.

Résultat : PASS.

### Suppression en cascade

Le test test_deleting_user_also_deletes_his_animals
vérifie que les animaux associés à un utilisateur
sont supprimés lorsque cet utilisateur est supprimé.

Résultat : PASS.

## 6. Conclusion

Les tests réalisés confirment le bon fonctionnement
des contraintes d'intégrité vérifiées.

La persistance, la modification et la suppression
des données fonctionnent conformément aux résultats attendus.
