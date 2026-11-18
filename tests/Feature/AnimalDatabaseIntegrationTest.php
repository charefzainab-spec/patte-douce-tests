<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Animal;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\QueryException;

class AnimalDatabaseIntegrationTest extends TestCase
{
    use RefreshDatabase;

    // TEST 1 : Persistance après création
    public function test_animal_is_persisted_in_database(): void
    {
        // Arrange
        $user = User::factory()->create();

        // Act
        $animal = Animal::factory()->create([
            'user_id' => $user->id,
            'titre' => 'Chat persan',
        ]);

        // Assert
        $this->assertDatabaseHas('animals', [
            'id' => $animal->id,
            'titre' => 'Chat persan',
            'user_id' => $user->id,
        ]);
    }

    // TEST 2 : Modification en base de données
    public function test_animal_update_is_persisted(): void
    {
        // Arrange
        $animal = Animal::factory()->create();

        // Act
        $animal->update([
            'titre' => 'Chien modifié',
            'age' => 5,
        ]);

        // Assert
        $this->assertDatabaseHas('animals', [
            'id' => $animal->id,
            'titre' => 'Chien modifié',
            'age' => 5,
        ]);
    }

    // TEST 3 : Suppression d'un animal
    public function test_animal_is_deleted_from_database(): void
    {
        // Arrange
        $animal = Animal::factory()->create();

        // Act
        $animal->delete();

        // Assert
        $this->assertDatabaseMissing('animals', [
            'id' => $animal->id,
        ]);
    }

    // TEST 4 : Contrainte de clé étrangère
    public function test_animal_cannot_reference_nonexistent_user(): void
    {
        $this->expectException(QueryException::class);

        Animal::factory()->create([
            'user_id' => 99999999,
        ]);
    }

    // TEST 5 : Suppression en cascade
    public function test_deleting_user_also_deletes_his_animals(): void
    {
        // Arrange
        $user = User::factory()->create();

        $animal = Animal::factory()->create([
            'user_id' => $user->id,
        ]);

        // Act
        $user->delete();

        // Assert
        $this->assertDatabaseMissing('animals', [
            'id' => $animal->id,
        ]);
    }
}
