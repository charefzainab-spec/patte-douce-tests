<?php

namespace Tests\Feature;

use App\Models\LostFound;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LostFoundSecurityTest extends TestCase
{
    use RefreshDatabase;

    private function annonce(User $owner): LostFound
    {
        return LostFound::create([
            'type' => 'perdu',
            'description' => 'Chat noir',
            'localisation' => 'Gabès',
            'contact' => '20123456',
            'photo' => null,
            'user_id' => $owner->id,
        ]);
    }

    public function test_un_autre_utilisateur_ne_peut_pas_modifier_une_annonce(): void
    {
        $proprietaire = User::factory()->create();
        $autre = User::factory()->create();
        $annonce = $this->annonce($proprietaire);

        $this->actingAs($autre)->put(route('lost-found.update', $annonce->id), [
            'type' => 'trouve',
            'description' => 'Modifié par un autre',
            'localisation' => 'X',
            'contact' => '0',
        ]);

        $this->assertDatabaseHas('lost_founds', [
            'id' => $annonce->id,
            'description' => 'Chat noir',
        ]);
    }

    public function test_un_autre_utilisateur_ne_peut_pas_supprimer_une_annonce(): void
    {
        $proprietaire = User::factory()->create();
        $autre = User::factory()->create();
        $annonce = $this->annonce($proprietaire);

        $this->actingAs($autre)->delete(route('lost-found.destroy', $annonce->id));

        $this->assertDatabaseHas('lost_founds', ['id' => $annonce->id]);
    }

    public function test_un_visiteur_non_connecte_ne_peut_pas_supprimer(): void
    {
        $proprietaire = User::factory()->create();
        $annonce = $this->annonce($proprietaire);

        $this->delete(route('lost-found.destroy', $annonce->id));

        $this->assertDatabaseHas('lost_founds', ['id' => $annonce->id]);
    }

    public function test_creation_refusee_avec_des_donnees_vides(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route('lost-found.store'), []);

        $response->assertSessionHasErrors();
    }

    public function test_le_proprietaire_peut_modifier_son_annonce(): void
    {
        $proprietaire = User::factory()->create();
        $annonce = $this->annonce($proprietaire);

        $this->actingAs($proprietaire)->put(route('lost-found.update', $annonce->id), [
            'type' => 'perdu',
            'description' => 'Chat noir modifié',
            'localisation' => 'Gabès',
            'contact' => '20123456',
        ]);

        $this->assertDatabaseHas('lost_founds', [
            'id' => $annonce->id,
            'description' => 'Chat noir modifié',
        ]);
    }

    public function test_le_proprietaire_peut_supprimer_son_annonce(): void
    {
        $proprietaire = User::factory()->create();
        $annonce = $this->annonce($proprietaire);

        $this->actingAs($proprietaire)->delete(route('lost-found.destroy', $annonce->id));

        $this->assertDatabaseMissing('lost_founds', ['id' => $annonce->id]);
    }
}