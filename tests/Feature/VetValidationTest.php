<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Veterinaire;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class VetValidationTest extends TestCase
{
    use RefreshDatabase;

    private function admin(): User
    {
        return User::factory()->create(['role' => 'admin']);
    }

    // CT-29 / RG-14 : champs obligatoires
    public function test_admin_cannot_create_vet_without_name(): void
    {
        $this->actingAs($this->admin())->post('/admin/veterinaires', [
            'email' => 'dr@test.com',
            'telephone' => '12345678',
            'adresse' => 'Tunis',
        ])->assertSessionHasErrors('nom');
    }

    // CT-30 / AN-11 : format de l'email
    public function test_admin_cannot_create_vet_with_invalid_email(): void
    {
        $this->actingAs($this->admin())->post('/admin/veterinaires', [
            'nom' => 'Dr Test',
            'email' => 'pas-un-email',
            'telephone' => '12345678',
            'adresse' => 'Tunis',
        ])->assertSessionHasErrors('email');
    }

    // CT-31 / AN-11 : update sans validation
    public function test_admin_cannot_update_vet_with_empty_name(): void
    {
        $vet = Veterinaire::forceCreate([
            'nom' => 'Dr Test',
            'email' => 'dr@test.com',
            'telephone' => '12345678',
            'adresse' => 'Tunis',
        ]);

        $this->actingAs($this->admin())->put('/admin/veterinaires/' . $vet->id, [
            'nom' => '',
            'email' => 'dr@test.com',
            'telephone' => '12345678',
            'adresse' => 'Tunis',
        ])->assertSessionHasErrors('nom');
    }
}