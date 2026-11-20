<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Veterinaire;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class VeterinaireSecurityTest extends TestCase
{
    use RefreshDatabase;

    private function simple(): User
    {
        return User::factory()->create(['role' => 'user']);
    }

    private function admin(): User
    {
        return User::factory()->create(['role' => 'admin']);
    }

    private function donnees(array $extra = []): array
    {
        return array_merge([
            'nom' => 'Dr Test',
            'email' => 'dr@test.local',
            'telephone' => '20111222',
            'adresse' => 'Gabès',
        ], $extra);
    }

    private function vet(): Veterinaire
    {
        return Veterinaire::create($this->donnees());
    }

    public function test_un_utilisateur_simple_ne_peut_pas_creer_un_veterinaire_via_vet(): void
    {
        $this->actingAs($this->simple())->post('/vet', $this->donnees());

        $this->assertDatabaseCount('veterinaires', 0);
    }

    public function test_un_utilisateur_simple_ne_peut_pas_modifier_un_veterinaire_via_vet(): void
    {
        $vet = $this->vet();

        $this->actingAs($this->simple())->put('/vet/'.$vet->id, $this->donnees(['nom' => 'Pirate']));

        $this->assertDatabaseHas('veterinaires', ['id' => $vet->id, 'nom' => 'Dr Test']);
    }

    public function test_un_utilisateur_simple_ne_peut_pas_supprimer_un_veterinaire_via_vet(): void
    {
        $vet = $this->vet();

        $this->actingAs($this->simple())->delete('/vet/'.$vet->id);

        $this->assertDatabaseHas('veterinaires', ['id' => $vet->id]);
    }

    public function test_un_utilisateur_simple_ne_peut_pas_creer_un_veterinaire_via_admin(): void
    {
        $this->actingAs($this->simple())->post(route('admin.vets.store'), $this->donnees());

        $this->assertDatabaseCount('veterinaires', 0);
    }

    public function test_un_utilisateur_simple_ne_peut_pas_voir_la_liste_admin(): void
    {
        $response = $this->actingAs($this->simple())->get(route('admin.vets'));

        $this->assertNotEquals(200, $response->getStatusCode());
    }

    public function test_un_visiteur_ne_peut_pas_supprimer_un_veterinaire(): void
    {
        $vet = $this->vet();

        $this->delete('/vet/'.$vet->id);

        $this->assertDatabaseHas('veterinaires', ['id' => $vet->id]);
    }

    public function test_l_admin_peut_creer_un_veterinaire(): void
    {
        $this->actingAs($this->admin())->post(route('admin.vets.store'), $this->donnees());

        $this->assertDatabaseHas('veterinaires', ['email' => 'dr@test.local']);
    }

    public function test_l_admin_peut_supprimer_un_veterinaire(): void
    {
        $vet = $this->vet();

        $this->actingAs($this->admin())->delete(route('admin.vets.destroy', $vet->id));

        $this->assertDatabaseMissing('veterinaires', ['id' => $vet->id]);
    }

    public function test_un_email_invalide_est_refuse(): void
    {
        $response = $this->actingAs($this->admin())->post(
            route('admin.vets.store'),
            $this->donnees(['email' => 'abc'])
        );

        $response->assertSessionHasErrors('email');
        $this->assertDatabaseCount('veterinaires', 0);
    }

    public function test_une_modification_avec_nom_vide_est_refusee(): void
    {
        $vet = $this->vet();

        $response = $this->actingAs($this->admin())->put(
            route('admin.vets.update', $vet->id),
            $this->donnees(['nom' => ''])
        );

        $response->assertSessionHasErrors('nom');
        $this->assertDatabaseHas('veterinaires', ['id' => $vet->id, 'nom' => 'Dr Test']);
    }
}