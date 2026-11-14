<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Animal;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\QueryException;

class AnimalIntegrationTest extends TestCase
{
    use RefreshDatabase;

    // TEST 1 : CREATE
    public function test_user_can_create_animal(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/animals', [
            'titre' => 'Chat adorable',
            'description' => 'Un chat calme et gentil.',
            'age' => 2,
            'race' => 'Persan',
            'telephone' => '12345678',
        ]);

        $response->assertRedirect(route('animals.index'));

        $this->assertDatabaseHas('animals', [
            'titre' => 'Chat adorable',
            'race' => 'Persan',
            'age' => 2,
            'user_id' => $user->id,
            'tel' => '12345678',
            'statut' => 'adoption',
        ]);
    }

    // TEST 2 : READ
    public function test_user_can_view_animals(): void
    {
        $user = User::factory()->create();

        $animal = Animal::factory()->create([
            'user_id' => $user->id,
        ]);

        $response = $this->actingAs($user)->get('/animals');

        $response->assertStatus(200);
        $response->assertSee($animal->titre);
    }

    // TEST 3 : UPDATE
    public function test_user_can_update_animal(): void
    {
        $user = User::factory()->create();

        $animal = Animal::factory()->create([
            'user_id' => $user->id,
        ]);

        $response = $this->actingAs($user)->put('/animals/' . $animal->id, [
            'titre' => 'Chat modifié',
            'race' => 'Siamois',
            'age' => 3,
            'description' => 'Nouvelle description',
            'tel' => '87654321',
        ]);

        $response->assertRedirect(route('animals.index'));

        $this->assertDatabaseHas('animals', [
            'id' => $animal->id,
            'titre' => 'Chat modifié',
            'race' => 'Siamois',
            'age' => 3,
            'tel' => '87654321',
        ]);
    }

    // TEST 4 : DELETE
    public function test_user_can_delete_animal(): void
    {
        $user = User::factory()->create();

        $animal = Animal::factory()->create([
            'user_id' => $user->id,
        ]);

        $response = $this->actingAs($user)->delete('/animals/' . $animal->id);

        $response->assertRedirect();

        $this->assertDatabaseMissing('animals', [
            'id' => $animal->id,
        ]);
    }

    
    // TEST 5 : CONTRAINTE TITRE OBLIGATOIRE
    public function test_animal_cannot_be_created_without_title(): void
    {
        $user = User::factory()->create();

        $countBefore = Animal::count();

        $response = $this->actingAs($user)->post('/animals', [
            'description' => 'Un chat calme et gentil.',
            'age' => 2,
            'race' => 'Persan',
            'telephone' => '12345678',
        ]);

        $response->assertSessionHasErrors('titre');

        $this->assertDatabaseCount('animals', $countBefore);
    }

    // TEST 6 : CONTRAINTE CLE ETRANGERE
    public function test_animal_cannot_reference_nonexistent_user(): void
    {
        $this->expectException(QueryException::class);

        Animal::factory()->create([
            'user_id' => 99999999,
        ]);
    }
}