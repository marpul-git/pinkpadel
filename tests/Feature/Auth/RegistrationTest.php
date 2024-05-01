<?php

namespace Tests\Feature\Auth;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    // Utiliza el trait RefreshDatabase para migrar la base de datos en cada prueba
    use RefreshDatabase;

    // Prueba que la pantalla de registro se pueda renderizar correctamente
    public function test_registration_screen_can_be_rendered(): void
    {
        // Realiza una solicitud GET a la ruta '/register'
        $response = $this->get('/register');

        // Verifica que la respuesta tenga un estado HTTP 200 (OK)
        $response->assertStatus(200);
    }

    // Prueba que los nuevos usuarios puedan registrarse correctamente
    public function test_new_users_can_register(): void
    {
        // Realiza una solicitud POST a la ruta '/register' con datos de usuario válidos
        $response = $this->post('/register', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        // Verifica que el usuario esté autenticado después del registro
        $this->assertAuthenticated();

        // Verifica que la respuesta redirija al usuario a la ruta RouteServiceProvider::HOME
        $response->assertRedirect(RouteServiceProvider::HOME);
    }
}
