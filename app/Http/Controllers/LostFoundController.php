<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Veterinaire;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class VetSearchTest extends TestCase
{
    use RefreshDatabase;

    private function twoVets(): void
    {
        Veterinaire::forceCreate(['nom' => 'Dr Dupont', 'email' => 'dupont@test.com', 'telephone' => '11111111', 'adresse' => 'Tunis']);
        Veterinaire::forceCreate(['nom' => 'Dr Martin', 'email' => 'martin@test.com', 'telephone' => '22222222', 'adresse' => 'Sfax']);
    }

    // CT-79 : recherche cote utilisateur
    public function test_user_can_search_vets(): void
    {
        $user = User::factory()->create();
        $this->twoVets();

        $this->actingAs($user)->get('/veterinaires?search=Dupont')
            ->assertOk()
            ->assertViewHas('vets', fn ($vets) => $vets->count() === 1 && $vets->first()->nom === 'Dr Dupont');
    }

    // CT-80 : liste d'administration triee et filtree
    public function test_admin_vet_list_is_sorted_and_searchable(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $this->twoVets();

        $this->actingAs($admin)->get('/admin/veterinaires')
            ->assertOk()
            ->assertViewHas('vets', fn ($vets) => $vets->pluck('nom')->all() === ['Dr Dupont', 'Dr Martin']);

        $this->actingAs($admin)->get('/admin/veterinaires?search=Sfax')
            ->assertOk()
            ->assertViewHas('vets', fn ($vets) => $vets->count() === 1 && $vets->first()->nom === 'Dr Martin');
    }
}