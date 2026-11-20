<?php

namespace Tests\Feature;

use App\Models\Animal;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class AnimalOwnershipTest extends TestCase
{
    use RefreshDatabase;

    private function utilisateur(string $role = 'user'): User
    {
        return User::factory()->create(['role' => $role]);
    }

    private function annonce(User $owner): Animal
    {
        return Animal::factory()->create([
            'user_id' => $owner->id,
            'titre' => 'Chat A',
        ]);
    }

    private function donnees(array $extra = []): array
    {
        return array_merge([
            'titre' => 'Titre modifie',
            'race' => 'Persan',
            'age' => 3,
            'description' => 'Description modifiee',
            'tel' => '20111222',
        ], $extra);
    }

    public function test_un_autre_utilisateur_ne_peut_pas_modifier_l_annonce(): void
    {
        $annonce = $this->annonce($this->utilisateur());

        $this->actingAs($this->utilisateur())
            ->put(route('animals.update', $annonce->id), $this->donnees());

        $this->assertDatabaseHas('animals', ['id' => $annonce->id, 'titre' => 'Chat A']);
    }

    public function test_un_autre_utilisateur_ne_peut_pas_supprimer_l_annonce(): void
    {
        $annonce = $this->annonce($this->utilisateur());

        $this->actingAs($this->utilisateur())
            ->delete(route('animals.destroy', $annonce->id));

        $this->assertDatabaseHas('animals', ['id' => $annonce->id]);
    }

    public function test_un_autre_utilisateur_ne_peut_pas_ouvrir_le_formulaire_de_modification(): void
    {
        $annonce = $this->annonce($this->utilisateur());

        $this->actingAs($this->utilisateur())
            ->get(route('animals.edit', $annonce->id))
            ->assertForbidden();
    }

    public function test_un_visiteur_ne_peut_pas_supprimer_une_annonce(): void
    {
        $annonce = $this->annonce($this->utilisateur());

        $this->delete(route('animals.destroy', $annonce->id));

        $this->assertDatabaseHas('animals', ['id' => $annonce->id]);
    }

    public function test_le_proprietaire_peut_modifier_son_annonce(): void
    {
        $proprietaire = $this->utilisateur();
        $annonce = $this->annonce($proprietaire);

        $this->actingAs($proprietaire)
            ->put(route('animals.update', $annonce->id), $this->donnees());

        $this->assertDatabaseHas('animals', ['id' => $annonce->id, 'titre' => 'Titre modifie']);
    }

    public function test_le_proprietaire_peut_supprimer_son_annonce(): void
    {
        $proprietaire = $this->utilisateur();
        $annonce = $this->annonce($proprietaire);

        $this->actingAs($proprietaire)->delete(route('animals.destroy', $annonce->id));

        $this->assertDatabaseMissing('animals', ['id' => $annonce->id]);
    }

    public function test_l_admin_peut_modifier_l_annonce_d_un_autre_pour_moderation(): void
    {
        $annonce = $this->annonce($this->utilisateur());

        $this->actingAs($this->utilisateur('admin'))
            ->put(route('animals.update', $annonce->id), $this->donnees());

        $this->assertDatabaseHas('animals', ['id' => $annonce->id, 'titre' => 'Titre modifie']);
    }

    public function test_une_modification_avec_titre_vide_est_refusee(): void
    {
        $proprietaire = $this->utilisateur();
        $annonce = $this->annonce($proprietaire);

        $response = $this->actingAs($proprietaire)
            ->put(route('animals.update', $annonce->id), $this->donnees(['titre' => '']));

        $response->assertSessionHasErrors('titre');
        $this->assertDatabaseHas('animals', ['id' => $annonce->id, 'titre' => 'Chat A']);
    }

    public function test_une_modification_avec_age_negatif_est_refusee(): void
    {
        $proprietaire = $this->utilisateur();
        $annonce = $this->annonce($proprietaire);

        $response = $this->actingAs($proprietaire)
            ->put(route('animals.update', $annonce->id), $this->donnees(['age' => -1]));

        $response->assertSessionHasErrors('age');
    }

    public function test_une_modification_avec_titre_de_256_caracteres_est_refusee(): void
    {
        $proprietaire = $this->utilisateur();
        $annonce = $this->annonce($proprietaire);

        $response = $this->actingAs($proprietaire)
            ->put(route('animals.update', $annonce->id), $this->donnees([
                'titre' => str_repeat('a', 256),
            ]));

        $response->assertSessionHasErrors('titre');
    }

    public function test_une_modification_avec_un_fichier_php_est_refusee(): void
    {
        $proprietaire = $this->utilisateur();
        $annonce = $this->annonce($proprietaire);

        $response = $this->actingAs($proprietaire)
            ->put(route('animals.update', $annonce->id), $this->donnees([
                'photo' => UploadedFile::fake()->create('shell.php', 10, 'application/x-php'),
            ]));

        $response->assertSessionHasErrors('photo');
    }
}