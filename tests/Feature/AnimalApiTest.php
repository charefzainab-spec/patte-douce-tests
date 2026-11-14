<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AnimalApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_api_show_returns_404_for_unknown_animal(): void
    {
        $this->getJson('/api/animals/999999')
            ->assertStatus(404)
            ->assertJson(['message' => 'Animal not found']);
    }

    public function test_api_store_rejects_missing_fields(): void
    {
        $this->postJson('/api/animals', [])
            ->assertStatus(422)
            ->assertJsonValidationErrors(['titre', 'description', 'age', 'race', 'user_id']);
    }

    // AN-03 : une creation sans authentification doit etre refusee
    public function test_api_store_requires_authentication(): void
    {
        $user = User::factory()->create();

        $this->postJson('/api/animals', [
            'titre' => 'Chien',
            'description' => 'Un chien gentil',
            'age' => 3,
            'race' => 'Labrador',
            'user_id' => $user->id,
        ])->assertUnauthorized();
    }
}