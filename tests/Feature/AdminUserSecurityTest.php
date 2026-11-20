<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminUserSecurityTest extends TestCase
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
            'name' => 'Nouvel Utilisateur',
            'email' => 'nouveau@test.local',
            'password' => 'Password123!',
            'role' => 'user',
        ], $extra);
    }

    public function test_un_utilisateur_simple_ne_peut_pas_acceder_a_la_gestion_des_utilisateurs(): void
    {
        $response = $this->actingAs($this->simple())->get('/users');

        $this->assertNotEquals(200, $response->getStatusCode());
    }

    public function test_un_utilisateur_simple_ne_peut_pas_creer_un_utilisateur(): void
    {
        $this->actingAs($this->simple())->post('/users', $this->donnees());

        $this->assertDatabaseMissing('users', ['email' => 'nouveau@test.local']);
    }

    public function test_un_utilisateur_simple_ne_peut_pas_se_promouvoir_admin(): void
    {
        $simple = $this->simple();

        $this->actingAs($simple)->put('/users/'.$simple->id, [
            'name' => $simple->name,
            'email' => $simple->email,
            'role' => 'admin',
        ]);

        $this->assertDatabaseHas('users', ['id' => $simple->id, 'role' => 'user']);
    }

    public function test_un_visiteur_ne_peut_pas_supprimer_un_utilisateur(): void
    {
        $cible = $this->simple();

        $this->delete('/users/'.$cible->id);

        $this->assertDatabaseHas('users', ['id' => $cible->id]);
    }

    public function test_l_admin_peut_creer_un_utilisateur(): void
    {
        $this->actingAs($this->admin())->post('/users', $this->donnees());

        $this->assertDatabaseHas('users', [
            'email' => 'nouveau@test.local',
            'role' => 'user',
        ]);
    }

    public function test_un_role_invalide_est_refuse_a_la_creation(): void
    {
        $response = $this->actingAs($this->admin())->post(
            '/users',
            $this->donnees(['role' => 'superadmin'])
        );

        $response->assertSessionHasErrors('role');
        $this->assertDatabaseMissing('users', ['email' => 'nouveau@test.local']);
    }

    public function test_un_email_deja_utilise_est_refuse(): void
    {
        $existant = $this->simple();

        $response = $this->actingAs($this->admin())->post(
            '/users',
            $this->donnees(['email' => $existant->email])
        );

        $response->assertSessionHasErrors('email');
    }

    public function test_un_nom_vide_est_refuse_a_la_creation(): void
    {
        $response = $this->actingAs($this->admin())->post(
            '/users',
            $this->donnees(['name' => ''])
        );

        $response->assertSessionHasErrors('name');
        $this->assertDatabaseMissing('users', ['email' => 'nouveau@test.local']);
    }

    public function test_un_role_invalide_est_refuse_a_la_modification(): void
    {
        $cible = $this->simple();

        $response = $this->actingAs($this->admin())->put('/users/'.$cible->id, [
            'name' => $cible->name,
            'email' => $cible->email,
            'role' => 'superadmin',
        ]);

        $response->assertSessionHasErrors('role');
        $this->assertDatabaseHas('users', ['id' => $cible->id, 'role' => 'user']);
    }

    public function test_une_modification_avec_un_email_deja_utilise_est_refusee(): void
    {
        $premier = User::factory()->create(['email' => 'premier@test.local', 'role' => 'user']);
        $second = User::factory()->create(['email' => 'second@test.local', 'role' => 'user']);

        $response = $this->actingAs($this->admin())->put('/users/'.$second->id, [
            'name' => $second->name,
            'email' => $premier->email,
            'role' => 'user',
        ]);

        $response->assertSessionHasErrors('email');
        $this->assertDatabaseHas('users', ['id' => $second->id, 'email' => 'second@test.local']);
    }
}