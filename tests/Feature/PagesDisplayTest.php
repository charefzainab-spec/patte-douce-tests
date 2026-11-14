<?php

namespace Tests\Feature;

use App\Models\Animal;
use App\Models\LostFound;
use App\Models\User;
use App\Models\Veterinaire;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PagesDisplayTest extends TestCase
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

    private function vet(): Veterinaire
    {
        return Veterinaire::forceCreate([
            'nom' => 'Dr Test',
            'email' => 'dr@test.com',
            'telephone' => '12345678',
            'adresse' => 'Tunis',
        ]);
    }

    // CT-32 : pages accessibles a un utilisateur connecte
    public function test_user_pages_are_displayed(): void
    {
        $user = User::factory()->create();
        $animal = Animal::factory()->create(['user_id' => $user->id]);
        $lost = $this->lost($user);
        $this->vet();

        $pages = [
            '/animals',
            '/animals/create',
            '/animals/' . $animal->id,
            '/animals/' . $animal->id . '/edit',
            '/my-animals',
            '/lost-found',
            '/lost-found/create',
            '/lost-found/' . $lost->id,
            '/lost-found/' . $lost->id . '/edit',
            '/my-lostfound',
            '/veterinaires',
        ];

        foreach ($pages as $page) {
            $status = $this->actingAs($user)->get($page)->getStatusCode();
            $this->assertSame(200, $status, "La page $page a repondu $status");
        }
    }

    // CT-33 : pages de l'espace administrateur
    public function test_admin_pages_are_displayed(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $vet = $this->vet();
        Animal::factory()->create(['user_id' => $admin->id]);
        $this->lost($admin);

        $pages = [
            '/admin',
            '/admin/animals',
            '/admin/lost-found',
            '/admin/veterinaires',
            '/admin/veterinaires/create',
            '/admin/veterinaires/' . $vet->id . '/edit',
            '/users',
        ];

        foreach ($pages as $page) {
            $status = $this->actingAs($admin)->get($page)->getStatusCode();
            $this->assertSame(200, $status, "La page $page a repondu $status");
        }
    }

    // CT-34 : recherche d'animaux par titre
    public function test_animal_search_by_title(): void
    {
        $user = User::factory()->create();
        Animal::factory()->create(['user_id' => $user->id, 'titre' => 'Rex le berger']);
        Animal::factory()->create(['user_id' => $user->id, 'titre' => 'Minou le chat']);

        $response = $this->actingAs($user)->get('/animals?search=Rex');

        $response->assertOk();
        $response->assertSee('Rex le berger');
        $response->assertDontSee('Minou le chat');
    }

    // CT-35 : filtre senior
    public function test_senior_filter_excludes_young_animals(): void
    {
        $user = User::factory()->create();
        Animal::factory()->create(['user_id' => $user->id, 'titre' => 'Vieux Medor', 'age' => 12]);
        Animal::factory()->create(['user_id' => $user->id, 'titre' => 'Petit Chiot', 'age' => 0]);

        $response = $this->actingAs($user)->get('/animals?age_filter=senior');

        $response->assertOk();
        $response->assertSee('Vieux Medor');
        $response->assertDontSee('Petit Chiot');
    }

    // CT-36 : filtre de type Lost & Found (sans recherche texte)
    public function test_lostfound_type_filter(): void
    {
        $user = User::factory()->create();
        $this->lost($user);
        LostFound::forceCreate([
            'type' => 'trouve',
            'description' => 'Chien blanc trouve',
            'localisation' => 'Sfax',
            'contact' => '87654321',
            'user_id' => $user->id,
        ]);

        $response = $this->actingAs($user)->get('/lost-found?type=trouve');

        $response->assertOk();
        $response->assertSee('Chien blanc trouve');
        $response->assertDontSee('Chat noir perdu');
    }
}