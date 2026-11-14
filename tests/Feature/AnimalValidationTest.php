<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AnimalValidationTest extends TestCase
{
    use RefreshDatabase;

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

    public static function boundaryCases(): array
    {
        return [
            'CT-02 titre vide'       => ['titre', '', false],
            'CT-03 titre 255 car.'   => ['titre', str_repeat('a', 255), true],
            'CT-04 titre 256 car.'   => ['titre', str_repeat('a', 256), false],
            'CT-05 age -1'           => ['age', -1, false],
            'CT-06 age 0'            => ['age', 0, true],
            'CT-07a age decimal'     => ['age', 1.5, false],
            'CT-07b age texte'       => ['age', 'abc', false],
            'CT-08a tel 20 car.'     => ['telephone', str_repeat('1', 20), true],
            'CT-08b tel 21 car.'     => ['telephone', str_repeat('1', 21), false],
            'CT-09 description vide' => ['description', '', false],
        ];
    }

    /**
     * @dataProvider boundaryCases
     */
    public function test_store_validation_boundaries(string $field, $value, bool $valid): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/animals', $this->validData([$field => $value]));

        if ($valid) {
            $response->assertSessionDoesntHaveErrors($field);
            $this->assertDatabaseCount('animals', 1);
        } else {
            $response->assertSessionHasErrors($field);
            $this->assertDatabaseCount('animals', 0);
        }
    }
}