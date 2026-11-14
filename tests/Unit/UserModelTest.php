<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UserModelTest extends TestCase
{
    // TU-04 / RG-18 : le mot de passe est hache a l'affectation
    public function test_password_is_hashed_and_verifiable(): void
    {
        $user = new User();

        $user->password = 'motdepasse123';

        $this->assertNotSame('motdepasse123', $user->password);
        $this->assertTrue(Hash::check('motdepasse123', $user->password));
    }

    // TU-05 : un mot de passe deja hache n'est pas hache une seconde fois
    public function test_already_hashed_password_is_not_hashed_again(): void
    {
        $hash = Hash::make('motdepasse123');
        $user = new User();

        $user->password = $hash;

        $this->assertSame($hash, $user->password);
    }

    // TU-06 : le mot de passe n'apparait jamais dans la serialisation
    public function test_password_is_hidden_in_serialization(): void
    {
        $user = new User([
            'name' => 'Test',
            'email' => 'test@test.com',
            'password' => 'motdepasse123',
        ]);

        $array = $user->toArray();

        $this->assertArrayNotHasKey('password', $array);
        $this->assertArrayNotHasKey('remember_token', $array);
        $this->assertArrayHasKey('email', $array);
    }

    // TU-07 : les relations vers les annonces
    public function test_user_has_many_animals_and_lostfound(): void
    {
        $user = new User();

        $this->assertInstanceOf(HasMany::class, $user->animals());
        $this->assertInstanceOf(HasMany::class, $user->lostFound());
    }

    // TU-08 / RG-17 : le role peut etre affecte en masse (point d'attention securite)
    public function test_role_is_mass_assignable(): void
    {
        $user = new User(['role' => 'admin']);

        $this->assertSame('admin', $user->role);
    }
}