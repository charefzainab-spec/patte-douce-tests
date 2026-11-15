<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
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

    // CT-16 : champs manquants (utilisateur authentifie)
    public function test_api_store_rejects_missing_fields(): void
    {
        Sanctum::actingAs(User::factory()->create());

        $this->postJson('/api/animals', [])
            ->assertStatus(422)
            ->assertJsonValidationErrors(['titre', 'description', 'age', 'race']);
    }

    // CT-39 / AN-03 : une creation sans authentification doit etre refusee
    public function test_api_store_requires_authentication(): void
    {
        $this->postJson('/api/animals', [
            'titre' => 'Chien',
            'description' => 'Un chien gentil',
            'age' => 3,
            'race' => 'Labrador',
        ])->assertUnauthorized();

        $this->assertDatabaseCount('animals', 0);
    }

    // CT-61 : l'annonce est rattachee a l'utilisateur authentifie
    public function test_api_store_attaches_authenticated_user(): void
    {
        $user = User::factory()->create();
        Sanctum::actingAs($user);

        $this->postJson('/api/animals', [
            'titre' => 'Chien',
            'description' => 'Un chien gentil',
            'age' => 3,
            'race' => 'Labrador',
        ])->assertCreated();

        $this->assertDatabaseHas('animals', ['titre' => 'Chien', 'user_id' => $user->id]);
    }

    // CT-62 : un user_id fourni par le client est ignore (pas d'usurpation)
    public function test_api_store_ignores_client_supplied_user_id(): void
    {
        $user = User::factory()->create();
        $other = User::factory()->create();
        Sanctum::actingAs($user);

        $this->postJson('/api/animals', [
            'titre' => 'Chat',
            'description' => 'Un chat calme',
            'age' => 2,
            'race' => 'Persan',
            'user_id' => $other->id,
        ])->assertCreated();

        $this->assertDatabaseHas('animals', ['titre' => 'Chat', 'user_id' => $user->id]);
        $this->assertDatabaseMissing('animals', ['titre' => 'Chat', 'user_id' => $other->id]);
    }
}