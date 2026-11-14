<?php

namespace Tests\Feature;

use App\Models\Animal;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AnimalAuthorizationTest extends TestCase
{
    use RefreshDatabase;

    // CT-12 / RG-08
    public function test_guest_is_redirected_to_login(): void
    {
        $this->get('/animals')->assertRedirect('/login');
    }

    // CT-13 / EX-A
    public function test_user_cannot_update_another_users_animal(): void
    {
        $owner = User::factory()->create();
        $intruder = User::factory()->create();
        $animal = Animal::factory()->create([
            'user_id' => $owner->id,
            'titre' => 'Titre original',
        ]);

        $response = $this->actingAs($intruder)->put('/animals/' . $animal->id, [
            'titre' => 'Titre pirate',
            'race' => 'X',
            'age' => 1,
            'description' => 'Modifie par un autre',
            'tel' => '000',
        ]);

        $this->assertDatabaseHas('animals', [
            'id' => $animal->id,
            'titre' => 'Titre original',
        ]);
        $response->assertForbidden();
    }

    // CT-14 / EX-A
    public function test_user_cannot_delete_another_users_animal(): void
    {
        $owner = User::factory()->create();
        $intruder = User::factory()->create();
        $animal = Animal::factory()->create(['user_id' => $owner->id]);

        $response = $this->actingAs($intruder)->delete('/animals/' . $animal->id);

        $this->assertDatabaseHas('animals', ['id' => $animal->id]);
        $response->assertForbidden();
    }
}