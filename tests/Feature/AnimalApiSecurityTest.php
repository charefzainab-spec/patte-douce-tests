<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class AnimalApiSecurityTest extends TestCase
{
    use RefreshDatabase;

    private function donnees(array $extra = []): array
    {
        return array_merge([
            'titre' => 'Chat API',
            'description' => 'Animal cree par API',
            'age' => 3,
            'race' => 'Persan',
        ], $extra);
    }

    public function test_creation_sans_token_est_refusee(): void
    {
        $user = User::factory()->create();

        $response = $this->postJson('/api/animals', $this->donnees(['user_id' => $user->id]));

        $response->assertStatus(401);
        $this->assertDatabaseCount('animals', 0);
    }

    public function test_creation_avec_token_utilise_l_utilisateur_du_token(): void
    {
        $user = User::factory()->create();
        $autre = User::factory()->create();
        Sanctum::actingAs($user);

        $response = $this->postJson('/api/animals', $this->donnees(['user_id' => $autre->id]));

        $response->assertStatus(201);
        $this->assertDatabaseHas('animals', [
            'titre' => 'Chat API',
            'user_id' => $user->id,
        ]);
        $this->assertDatabaseMissing('animals', ['user_id' => $autre->id]);
    }

    public function test_titre_de_256_caracteres_est_refuse(): void
    {
        Sanctum::actingAs(User::factory()->create());

        $response = $this->postJson('/api/animals', $this->donnees([
            'titre' => str_repeat('a', 256),
        ]));

        $response->assertStatus(422)->assertJsonValidationErrors('titre');
    }

    public function test_titre_de_255_caracteres_est_accepte(): void
    {
        Sanctum::actingAs(User::factory()->create());

        $response = $this->postJson('/api/animals', $this->donnees([
            'titre' => str_repeat('a', 255),
        ]));

        $response->assertStatus(201);
    }
}