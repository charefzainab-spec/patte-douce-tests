<?php

namespace Tests\Unit;

use App\Http\Middleware\AdminMiddleware;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Tests\TestCase;

class AdminMiddlewareTest extends TestCase
{
    private function callMiddleware(): \Symfony\Component\HttpFoundation\Response
    {
        $middleware = new AdminMiddleware();
        $request = Request::create('/admin', 'GET');

        return $middleware->handle($request, fn ($req) => new Response('acces autorise'));
    }

    // TU-01 / RG-13 : un administrateur passe
    public function test_admin_is_allowed_through(): void
    {
        // Arrange
        $this->actingAs(new User(['role' => 'admin']));

        // Act
        $response = $this->callMiddleware();

        // Assert
        $this->assertSame('acces autorise', $response->getContent());
    }

    // TU-02 / RG-13 : tout autre role est redirige vers l'accueil
    /**
     * @dataProvider nonAdminRoles
     */
    public function test_non_admin_roles_are_redirected(string $role): void
    {
        $this->actingAs(new User(['role' => $role]));

        $response = $this->callMiddleware();

        $this->assertTrue($response->isRedirect());
        $this->assertSame(url('/'), $response->headers->get('Location'));
    }

    public static function nonAdminRoles(): array
    {
        return [
            'role user'        => ['user'],
            'role superadmin'  => ['superadmin'],
            'casse differente' => ['Admin'],
            'role vide'        => [''],
        ];
    }

    // TU-03 / RG-13 : un visiteur non connecte est redirige
    public function test_guest_is_redirected(): void
    {
        $response = $this->callMiddleware();

        $this->assertTrue($response->isRedirect());
        $this->assertSame(url('/'), $response->headers->get('Location'));
    }
}