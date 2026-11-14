<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class PhotoUploadTest extends TestCase
{
    use RefreshDatabase;

    private array $filesBefore = [];

    protected function setUp(): void
    {
        parent::setUp();
        $this->filesBefore = glob(public_path('uploads') . '/*') ?: [];
    }

    protected function tearDown(): void
    {
        $after = glob(public_path('uploads') . '/*') ?: [];
        foreach (array_diff($after, $this->filesBefore) as $file) {
            @unlink($file);
        }
        parent::tearDown();
    }

    private function validData(array $override = []): array
    {
        return array_merge([
            'titre' => 'Chat adorable',
            'race' => 'Persan',
            'age' => 2,
            'description' => 'Un chat calme et gentil.',
            'telephone' => '12345678',
        ], $override);
    }

    // CT-10a / RG-06 : image de 2048 Ko acceptee (valeur limite)
    public function test_photo_of_2048_kb_is_accepted(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/animals', $this->validData([
            'photo' => UploadedFile::fake()->image('chat.jpg')->size(2048),
        ]));

        $response->assertSessionDoesntHaveErrors('photo');
        $this->assertDatabaseCount('animals', 1);
    }

    // CT-10b / RG-06 : image de 2049 Ko refusee
    public function test_photo_of_2049_kb_is_rejected(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/animals', $this->validData([
            'photo' => UploadedFile::fake()->image('chat.jpg')->size(2049),
        ]));

        $response->assertSessionHasErrors('photo');
        $this->assertDatabaseCount('animals', 0);
    }

    // CT-11 / RG-06 : un PDF n'est pas une image
    public function test_pdf_is_rejected_as_photo(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/animals', $this->validData([
            'photo' => UploadedFile::fake()->create('document.pdf', 100, 'application/pdf'),
        ]));

        $response->assertSessionHasErrors('photo');
        $this->assertDatabaseCount('animals', 0);
    }
}