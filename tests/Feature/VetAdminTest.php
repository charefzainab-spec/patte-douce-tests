<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Veterinaire;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class VetAdminTest extends TestCase
{
    use RefreshDatabase;

    private function admin(): User
    {
        return User::factory()->create(['role' => 'admin']);
    }

    private function vet(): Veterinaire
    {
        return Veterinaire::forceCreate([
            'nom' => 'Dr Test',
            'email' => 'dr@test.com',
            'telephone' => '12345678',
            'adresse' => 'Tunis',
        ]);
    }

    // CT-63 : l'administrateur peut creer un veterinaire
    public function test_admin_can_create_vet(): void
    {
        $response = $this->actingAs($this->admin())->post('/admin/veterinaires', [
            'nom' => 'Dr Admin',
            'email' => 'admin-vet@test.com',
            'telephone' => '12345678',
            'adresse' => 'Tunis',
        ]);

        $response->assertRedirect(route('admin.vets'));
        $this->assertDatabaseHas('veterinaires', ['nom' => 'Dr Admin']);
    }

    // CT-64 : l'administrateur peut modifier un veterinaire
    public function test_admin_can_update_vet(): void
    {
        $vet = $this->vet();

        $this->actingAs($this->admin())->put('/admin/veterinaires/' . $vet->id, [
            'nom' => 'Nom modifie',
            'email' => 'dr@test.com',
            'telephone' => '12345678',
            'adresse' => 'Tunis',
        ]);

        $this->assertDatabaseHas('veterinaires', ['id' => $vet->id, 'nom' => 'Nom modifie']);
    }

    // CT-65 : l'administrateur peut supprimer un veterinaire
    public function test_admin_can_delete_vet(): void
    {
        $vet = $this->vet();

        $this->actingAs($this->admin())->delete('/admin/veterinaires/' . $vet->id);

        $this->assertDatabaseMissing('veterinaires', ['id' => $vet->id]);
    }

    // CT-66 : un utilisateur simple peut toujours consulter la liste et une fiche
    public function test_simple_user_can_still_view_vets(): void
    {
        $user = User::factory()->create();
        $vet = $this->vet();

        $this->actingAs($user)->get('/veterinaires')->assertOk();
        $this->actingAs($user)->get('/vet/' . $vet->id)->assertOk();
    }
}