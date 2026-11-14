<?php

namespace Tests\Feature;

use App\Models\Animal;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AnimalBugsTest extends TestCase
{
    use RefreshDatabase;

    // CT-37 / AN-02 : update() sans validation
    public function test_update_rejects_empty_title(): void
    {
        $user = User::factory()->create();
        $animal = Animal::factory()->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)->put('/animals/' . $animal->id, [
            'titre' => '',
            'race' => 'Siamois',
            'age' => 3,
            'description' => 'Description',
            'tel' => '12345678',
        ]);

        $response->assertSessionHasErrors('titre');
    }

    // CT-38 / AN-04 : un age limite ne doit apparaitre que dans une categorie
    public function test_age_one_appears_in_only_one_filter(): void
    {
        $user = User::factory()->create();
        Animal::factory()->create([
            'user_id' => $user->id,
            'titre' => 'Chiot unique',
            'age' => 1,
        ]);

        $baby = $this->actingAs($user)->get('/animals?age_filter=baby');
        $young = $this->actingAs($user)->get('/animals?age_filter=young');

        $inBaby = str_contains($baby->getContent(), 'Chiot unique');
        $inYoung = str_contains($young->getContent(), 'Chiot unique');

        $this->assertFalse($inBaby && $inYoung, 'Age 1 apparait dans bebe ET jeune');
    }
}