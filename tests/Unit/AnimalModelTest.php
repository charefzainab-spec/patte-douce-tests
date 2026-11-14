<?php

namespace Tests\Unit;

use App\Models\Animal;
use Database\Factories\AnimalFactory;
use Tests\TestCase;

class AnimalModelTest extends TestCase
{
    // TU-09 / RG-07 : tous les champs d'une annonce s'affectent en masse
    public function test_animal_fields_are_mass_assignable(): void
    {
        $animal = new Animal([
            'titre' => 'Chat adorable',
            'race' => 'Persan',
            'age' => 2,
            'description' => 'Un chat calme.',
            'statut' => 'adoption',
            'tel' => '12345678',
            'user_id' => 1,
        ]);

        $this->assertSame('Chat adorable', $animal->titre);
        $this->assertSame('Persan', $animal->race);
        $this->assertSame(2, $animal->age);
        $this->assertSame('adoption', $animal->statut);
        $this->assertSame('12345678', $animal->tel);
        $this->assertSame(1, $animal->user_id);
    }

    // TU-10 / RG-03 : les donnees de test generees respectent les regles de l'age
    public function test_factory_generates_valid_ages_and_status(): void
    {
        $factory = new AnimalFactory();

        for ($i = 0; $i < 50; $i++) {
            $data = $factory->definition();

            $this->assertGreaterThanOrEqual(0, $data['age']);
            $this->assertLessThanOrEqual(15, $data['age']);
            $this->assertSame('adoption', $data['statut']);
        }
    }
}