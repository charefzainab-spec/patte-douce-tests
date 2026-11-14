<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Veterinaire;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RoleAccessTest extends TestCase
{
    use RefreshDatabase;

    private function vet(): Veterinaire
    {
        return Veterinaire::forceCreate([
            'nom' => 'Dr Test',
            'email' => 'dr@test.com',
            'telephone' => '12345678',
            'adresse' => 'Tunis',
        ]);
    }

    // CT-17 / RG-09
    public function test_guest_cannot_access_admin_dashboard(): void
    {
        $this->get('/admin')->assertRedirect('/login');
    }

    // CT-18 / RG-13
    public function test_simple_user_cannot_access_admin_dashboard(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)->get('/admin')->assertRedirect('/');
    }

    // CT-19 / RG-09
    public function test_admin_can_access_admin_dashboard(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);

        $this->actingAs($admin)->get('/admin')->assertOk();
    }

    // CT-20 / AN-05 : un simple utilisateur ne doit pas supprimer un veterinaire
    public function test_simple_user_cannot_delete_vet(): void
    {
        $user = User::factory()->create();
        $vet = $this->vet();

        $this->actingAs($user)->delete('/vet/' . $vet->id);

        $this->assertDatabaseHas('veterinaires', ['id' => $vet->id]);
    }

    // CT-21 / AN-05 : un simple utilisateur ne doit pas creer un veterinaire
    public function test_simple_user_cannot_create_vet(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)->post('/vet', [
            'nom' => 'Dr Pirate',
            'email' => 'pirate@test.com',
            'telephone' => '00000000',
            'adresse' => 'Nulle part',
        ]);

        $this->assertDatabaseCount('veterinaires', 0);
    }

    // CT-22 / AN-05 : un simple utilisateur ne doit pas modifier un veterinaire
    public function test_simple_user_cannot_update_vet(): void
    {
        $user = User::factory()->create();
        $vet = $this->vet();

        $this->actingAs($user)->put('/vet/' . $vet->id, [
            'nom' => 'Nom pirate',
            'email' => 'x@test.com',
            'telephone' => '1',
            'adresse' => 'X',
        ]);

        $this->assertDatabaseHas('veterinaires', ['id' => $vet->id, 'nom' => 'Dr Test']);
    }

    // CT-23 / AN-07 : la fiche d'un veterinaire doit s'afficher
    public function test_vet_show_page_is_displayed(): void
    {
        $user = User::factory()->create();
        $vet = $this->vet();

        $this->actingAs($user)->get('/vet/' . $vet->id)->assertOk();
    }
}