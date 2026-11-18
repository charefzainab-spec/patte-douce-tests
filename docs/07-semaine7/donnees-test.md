
# Données de test reproductibles — Semaine 7

## 1. Objectif

Préparer des données reproductibles pour exécuter
les tests d'intégration plusieurs fois dans les mêmes
conditions.

## 2. Outils utilisés

- User::factory() : création automatique des utilisateurs.
- Animal::factory() : création automatique des animaux.
- RefreshDatabase : réinitialisation de la base de données
  de test entre les tests.

## 3. Données utilisées

| Champ | Valeur |
|-------|--------|
| Utilisateur | User::factory()->create() |
| Animal | Animal::factory()->create() |
| Titre de test | Chat persan |
| Titre modifié | Chien modifié |
| Âge modifié | 5 |
| Identifiant utilisateur invalide | 99999999 |

## 4. Préparation des données

Chaque test prépare ses propres données avec les factories.

Exemple :

```php
$user = User::factory()->create();

$animal = Animal::factory()->create([
    'user_id' => $user->id,
    'titre' => 'Chat persan',
]);
```

## 5. Isolation des tests

Le trait RefreshDatabase est utilisé pour garantir
un environnement de test propre.

Les données créées pendant les tests ne doivent pas
modifier les données réelles de l'application.

## 6. Reproductibilité

Les factories permettent de générer automatiquement
les données nécessaires à chaque exécution.

La réexécution de AnimalDatabaseIntegrationTest
a donné le même résultat :

- 5 tests réussis.
- 0 test échoué.

## 7. Conclusion

La préparation automatique des données facilite
la répétition des tests et garantit un environnement
de test organisé et reproductible.
