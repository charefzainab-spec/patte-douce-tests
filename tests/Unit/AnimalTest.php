<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Animal;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AnimalTest extends TestCase
{
    // TEST 1 : Vérifier le nom de la table
    public function test_animal_uses_animals_table(): void
    {
        // Arrange
        $animal = new Animal();

        // Act
        $table = $animal->getTable();

        // Assert
        $this->assertEquals('animals', $table);
    }

    // TEST 2 : Vérifier les attributs autorisés
    public function test_animal_has_correct_fillable_attributes(): void
    {
        // Arrange
        $animal = new Animal();

        // Act
        $fillable = $animal->getFillable();

        // Assert
        $this->assertEquals([
            'titre',
            'description',
            'age',
            'race',
            'photo',
            'statut',
            'user_id',
            'tel'
        ], $fillable);
    }

    // TEST 3 : Vérifier la relation avec User
    public function test_animal_belongs_to_user(): void
    {
        // Arrange
        $animal = new Animal();

        // Act
        $relation = $animal->user();

        // Assert
        $this->assertInstanceOf(BelongsTo::class, $relation);
    }

    // TEST 4 : Vérifier la clé étrangère
    public function test_animal_uses_user_id_as_foreign_key(): void
    {
        // Arrange
        $animal = new Animal();

        // Act
        $relation = $animal->user();

        // Assert
        $this->assertEquals(
            'user_id',
            $relation->getForeignKeyName()
        );
    }

    // TEST 5 : Vérifier le modèle associé
    public function test_animal_relation_references_user_model(): void
    {
        // Arrange
        $animal = new Animal();

        // Act
        $relation = $animal->user();

        // Assert
        $this->assertInstanceOf(User::class, $relation->getRelated());
    }
}
