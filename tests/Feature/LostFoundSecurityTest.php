<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class LostFoundUploadTest extends TestCase
{
    use RefreshDatabase;

    private function donnees(array $extra = []): array
    {
        return array_merge([
            'type' => 'perdu',
            'description' => 'Chat noir',
            'localisation' => 'Gabès',
            'contact' => '20123456',
        ], $extra);
    }

    public function test_un_fichier_php_est_refuse(): void
    {
        Storage::fake('uploads');
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route('lost-found.store'), $this->donnees([
            'photo' => UploadedFile::fake()->create('shell.php', 10, 'application/x-php'),
        ]));

        $response->assertSessionHasErrors('photo');
        $this->assertDatabaseCount('lost_founds', 0);
        $this->assertEmpty(Storage::disk('uploads')->allFiles());
    }

    public function test_un_fichier_trop_lourd_est_refuse(): void
    {
        Storage::fake('uploads');
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route('lost-found.store'), $this->donnees([
            'photo' => UploadedFile::fake()->create('grosse.jpg', 3000, 'image/jpeg'),
        ]));

        $response->assertSessionHasErrors('photo');
        $this->assertDatabaseCount('lost_founds', 0);
    }

    public function test_une_image_valide_est_acceptee(): void
    {
        Storage::fake('uploads');
        $user = User::factory()->create();

        $this->actingAs($user)->post(route('lost-found.store'), $this->donnees([
            'photo' => UploadedFile::fake()->image('chat.jpg'),
        ]));

        $this->assertDatabaseCount('lost_founds', 1);
        $this->assertCount(1, Storage::disk('uploads')->allFiles());
    }
}