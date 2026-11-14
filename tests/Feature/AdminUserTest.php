<?php

namespace Tests\Feature;

use App\Models\Animal;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AdminUserTest extends TestCase
{
    use RefreshDatabase;

    private function admin(): User
    {
        return User::factory()->create(['role' => 'admin']);
    }

    private function validData(array $override = []): array
    {
        return array_merge([
            'name' => 'Nouvel Utilisateur',
            'email' => 'nouveau@test.com',
            'password' => 'motdepasse123',
            'role' => 'user',
        ], $override);
    }

    // CT-40 / RG-09 : un utilisateur simple ne voit pas la liste des utilisateurs
    public function test_simple_user_cannot_list_users(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)->get('/users')->assertRedirect('/');
    }

    // CT-41 / RG-18 : creation valide, mot de passe utilisable
    public function test_admin_can_create_user_with_working_password(): void
    {
        $response = $this->actingAs($this->admin())->post('/users', $this->validData());

        $response->assertRedirect(route('users.index'));
        $this->assertDatabaseHas('users', ['email' => 'nouveau@test.com', 'role' => 'user']);

        $created = User::where('email', 'nouveau@test.com')->first();
        $this->assertTrue(Hash::check('motdepasse123', $created->password));
    }

    // CT-42 / AN-12 : formulaire vide
    public function test_admin_cannot_create_user_with_empty_form(): void
    {
        $before = User::count();

        $response = $this->actingAs($this->admin())->post('/users', []);

        $this->assertDatabaseCount('users', $before);
        $response->assertSessionHasErrors(['name', 'email', 'password']);
    }

    // CT-43 / AN-13 : role invalide
    public function test_admin_cannot_create_user_with_invalid_role(): void
    {
        $response = $this->actingAs($this->admin())->post('/users', $this->validData([
            'role' => 'superadmin',
        ]));

        $this->assertDatabaseMissing('users', ['role' => 'superadmin']);
        $response->assertSessionHasErrors('role');
    }

    // CT-44 / RG-19 : email deja utilise a la creation
    public function test_admin_cannot_create_user_with_duplicate_email(): void
    {
        User::factory()->create(['email' => 'deja@test.com']);
        $admin = $this->admin();
        $before = User::count();

        $response = $this->actingAs($admin)->post('/users', $this->validData([
            'email' => 'deja@test.com',
        ]));

        $response->assertRedirect();
        $this->assertDatabaseCount('users', $before);
    }

    // CT-45 / AN-14 : email deja utilise a la modification
    public function test_admin_cannot_update_user_with_duplicate_email(): void
    {
        $a = User::factory()->create(['email' => 'a@test.com']);
        $b = User::factory()->create(['email' => 'b@test.com']);

        $response = $this->actingAs($this->admin())->put('/users/' . $b->id, [
            'name' => 'B',
            'email' => $a->email,
            'role' => 'user',
        ]);

        $response->assertSessionHasErrors('email');
    }

    // CT-46 / RG-20 : modification valide
    public function test_admin_can_update_user(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($this->admin())->put('/users/' . $user->id, [
            'name' => 'Nom modifie',
            'email' => $user->email,
            'role' => 'user',
        ]);

        $response->assertRedirect(route('users.index'));
        $this->assertDatabaseHas('users', ['id' => $user->id, 'name' => 'Nom modifie']);
    }

    // CT-47 / RG-20 : suppression
    public function test_admin_can_delete_user(): void
    {
        $user = User::factory()->create();

        $this->actingAs($this->admin())->delete('/users/' . $user->id);

        $this->assertDatabaseMissing('users', ['id' => $user->id]);
    }

    // CT-48 / RG-09 : un utilisateur simple ne peut pas creer un utilisateur
    public function test_simple_user_cannot_create_user(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/users', $this->validData());

        $this->assertDatabaseMissing('users', ['email' => 'nouveau@test.com']);
        $response->assertRedirect('/');
    }

    // CT-49 / RG-09 : un utilisateur simple ne peut pas supprimer un utilisateur
    public function test_simple_user_cannot_delete_user(): void
    {
        $user = User::factory()->create();
        $other = User::factory()->create();

        $this->actingAs($user)->delete('/users/' . $other->id);

        $this->assertDatabaseHas('users', ['id' => $other->id]);
    }

    // CT-50 : l'inscription publique ne permet pas de se donner le role admin
    public function test_registration_cannot_set_admin_role(): void
    {
        $this->post('/register', [
            'name' => 'Pirate',
            'email' => 'pirate@test.com',
            'password' => 'motdepasse123',
            'password_confirmation' => 'motdepasse123',
            'role' => 'admin',
        ]);

        $this->assertDatabaseHas('users', ['email' => 'pirate@test.com', 'role' => 'user']);
    }

    // CT-51 / RG-21 : integrite, la suppression d'un utilisateur supprime ses annonces
    public function test_deleting_user_deletes_their_animals(): void
    {
        $user = User::factory()->create();
        $animal = Animal::factory()->create(['user_id' => $user->id]);

        $this->actingAs($this->admin())->delete('/users/' . $user->id);

        $this->assertDatabaseMissing('users', ['id' => $user->id]);
        $this->assertDatabaseMissing('animals', ['id' => $animal->id]);
    }
}
