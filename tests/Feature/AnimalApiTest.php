<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Animal;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;

class AnimalApiTest extends TestCase
{
    use RefreshDatabase;

    // TEST 1 : GET - Liste des animaux
    public function test_api_can_return_animals_list(): void
    {
        // Arrange
        Animal::factory()->count(3)->create();

        // Act
        $response = $this->getJson('/api/animals');

        // Assert
        $response->assertStatus(200)
            ->assertJsonCount(3)
            ->assertHeader('content-type', 'application/json');
    }

    // TEST 2 : GET - Détail d'un animal
    public function test_api_can_return_animal_details(): void
    {
        // Arrange
        $animal = Animal::factory()->create([
            'titre' => 'Chat API',
        ]);

        // Act
        $response = $this->getJson('/api/animals/' . $animal->id);

        // Assert
        $response->assertStatus(200)
            ->assertJsonPath('titre', 'Chat API');
    }

    // TEST 3 : GET - Animal inexistant
    public function test_api_returns_404_for_nonexistent_animal(): void
    {
        // Act
        $response = $this->getJson('/api/animals/99999999');

        // Assert
        $response->assertStatus(404)
            ->assertJson([
                'message' => 'Animal not found',
            ]);
    }

    // TEST 4 : POST - Création d'un animal
    public function test_api_can_create_animal(): void
    {
        // Arrange
        $user = User::factory()->create();

        $data = [
            'titre' => 'Chat persan',
            'description' => 'Un chat calme et gentil',
            'age' => 3,
            'race' => 'Persan',
            'user_id' => $user->id,
        ];

        // Act
        $response = $this->postJson('/api/animals', $data);

        // Assert
        $response->assertStatus(201)
            ->assertJsonPath('titre', 'Chat persan')
            ->assertJsonPath('statut', 'adoption');

        $this->assertDatabaseHas('animals', [
            'titre' => 'Chat persan',
            'user_id' => $user->id,
        ]);
    }

    // TEST 5 : POST - Validation des données invalides
    public function test_api_rejects_invalid_animal_data(): void
    {
        // Arrange
        $user = User::factory()->create();

        $data = [
            'titre' => 'Chat invalide',
            'description' => 'Test de validation',
            'age' => -1,
            'race' => 'Persan',
            'user_id' => $user->id,
        ];

        // Act
        $response = $this->postJson('/api/animals', $data);

        // Assert
        $response->assertStatus(422)
            ->assertJsonValidationErrors(['age']);
    }

    // TEST 6 : POST - Utilisateur inexistant
    public function test_api_rejects_nonexistent_user(): void
    {
        // Arrange
        $data = [
            'titre' => 'Chat test',
            'description' => 'Test utilisateur',
            'age' => 2,
            'race' => 'Persan',
            'user_id' => 99999999,
        ];

        // Act
        $response = $this->postJson('/api/animals', $data);

        // Assert
        $response->assertStatus(422)
            ->assertJsonValidationErrors(['user_id']);
    }

    // TEST 7 : GET - Accès utilisateur sans authentification
    public function test_api_user_requires_authentication(): void
    {
        // Act
        $response = $this->getJson('/api/user');

        // Assert
        $response->assertStatus(401);
    }

    // TEST 8 : GET - Accès utilisateur authentifié
    public function test_authenticated_user_can_access_api_user(): void
    {
        // Arrange
        $user = User::factory()->create();

        Sanctum::actingAs($user);

        // Act
        $response = $this->getJson('/api/user');

        // Assert
        $response->assertStatus(200)
            ->assertJsonPath('email', $user->email);
    }
}
