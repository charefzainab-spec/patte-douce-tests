<?php

namespace Tests\Feature;

use App\Models\Animal;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class AnimalApiTest extends TestCase
{
    use RefreshDatabase;

    private function donnees(array $extra = []): array
    {
        return array_merge([
            'titre' => 'Chat Postman',
            'description' => 'Animal cree pour tester l API',
            'age' => 3,
            'race' => 'Persan',
        ], $extra);
    }

    public function test_api_can_return_animals_list(): void
    {
        $user = User::factory()->create();
        Animal::factory()->create(['user_id' => $user->id]);

        $this->getJson('/api/animals')
            ->assertStatus(200)
            ->assertJsonCount(1);
    }

    public function test_api_can_return_animal_details(): void
    {
        $user = User::factory()->create();
        $animal = Animal::factory()->create([
            'user_id' => $user->id,
            'titre' => 'Chat details',
        ]);

        $this->getJson('/api/animals/'.$animal->id)
            ->assertStatus(200)
            ->assertJsonFragment(['titre' => 'Chat details']);
    }

    public function test_api_returns_404_for_nonexistent_animal(): void
    {
        $this->getJson('/api/animals/999999')->assertStatus(404);
    }

    public function test_api_can_create_animal_with_token(): void
    {
        $user = User::factory()->create();
        Sanctum::actingAs($user);

        $this->postJson('/api/animals', $this->donnees())->assertStatus(201);

        $this->assertDatabaseHas('animals', [
            'titre' => 'Chat Postman',
            'user_id' => $user->id,
        ]);
    }

    public function test_api_rejects_missing_title(): void
    {
        Sanctum::actingAs(User::factory()->create());

        $this->postJson('/api/animals', $this->donnees(['titre' => '']))
            ->assertStatus(422)
            ->assertJsonValidationErrors('titre');
    }

    public function test_api_rejects_negative_age(): void
    {
        Sanctum::actingAs(User::factory()->create());

        $this->postJson('/api/animals', $this->donnees(['age' => -1]))
            ->assertStatus(422)
            ->assertJsonValidationErrors('age');
    }

    public function test_api_user_requires_authentication(): void
    {
        $this->getJson('/api/user')->assertStatus(401);
    }

    public function test_authenticated_user_can_access_api_user(): void
    {
        $user = User::factory()->create();
        Sanctum::actingAs($user);

        $this->getJson('/api/user')
            ->assertStatus(200)
            ->assertJsonFragment(['id' => $user->id]);
    }
}