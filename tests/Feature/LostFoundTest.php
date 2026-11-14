<?php

namespace Tests\Feature;

use App\Models\LostFound;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LostFoundTest extends TestCase
{
    use RefreshDatabase;

    private function lost(User $owner): LostFound
    {
        return LostFound::forceCreate([
            'type' => 'perdu',
            'description' => 'Chat noir perdu',
            'localisation' => 'Tunis',
            'contact' => '12345678',
            'user_id' => $owner->id,
        ]);
    }

    // CT-24 / AN-08 : formulaire vide -> erreurs de validation, pas d'erreur 500
    public function test_store_rejects_empty_form(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/lost-found', []);

        $response->assertSessionHasErrors(['type', 'description', 'localisation', 'contact']);
    }

    // CT-25 / AN-09 : la recherche ne doit pas planter
    public function test_search_does_not_crash(): void
    {
        $user = User::factory()->create();
        $this->lost($user);

        $this->actingAs($user)->get('/lost-found?search=chat')->assertOk();
    }

    // CT-26 : consultation sans recherche
    public function test_index_is_displayed(): void
    {
        $user = User::factory()->create();
        $this->lost($user);

        $this->actingAs($user)->get('/lost-found')->assertOk()->assertSee('Chat noir perdu');
    }

    // CT-27 / AN-10
    public function test_user_cannot_update_another_users_lostfound(): void
    {
        $owner = User::factory()->create();
        $intruder = User::factory()->create();
        $lost = $this->lost($owner);

        $response = $this->actingAs($intruder)->put('/lost-found/' . $lost->id, [
            'type' => 'trouve',
            'description' => 'Modifie par un autre',
            'localisation' => 'Ailleurs',
            'contact' => '0',
        ]);

        $this->assertDatabaseHas('lost_founds', [
            'id' => $lost->id,
            'description' => 'Chat noir perdu',
        ]);
        $response->assertForbidden();
    }

    // CT-28 / AN-10
    public function test_user_cannot_delete_another_users_lostfound(): void
    {
        $owner = User::factory()->create();
        $intruder = User::factory()->create();
        $lost = $this->lost($owner);

        $response = $this->actingAs($intruder)->delete('/lost-found/' . $lost->id);

        $this->assertDatabaseHas('lost_founds', ['id' => $lost->id]);
        $response->assertForbidden();
    }
}