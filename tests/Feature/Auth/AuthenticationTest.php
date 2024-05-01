<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    // Utiliza el trait RefreshDatabase para migrar la base de datos en cada prueba
    use RefreshDatabase;

    // Prueba que la pantalla de inicio de sesión se pueda renderizar correctamente
    public function test_login_screen_can_be_rendered(): void
    {
         // Realiza una solicitud GET a la ruta '/login'
        $response = $this->get('/login');
        // Verifica que la respuesta tenga un estado HTTP 200 (OK)
        $response->assertStatus(200);
    }
    // Prueba que los usuarios puedan autenticarse utilizando la pantalla de inicio de sesión
    public function test_users_can_authenticate_using_the_login_screen(): void
    {
        // Crea un usuario utilizando el modelo de factory User
        $user = User::factory()->create();
         // Realiza una solicitud POST a la ruta '/logout' actuando como el usuario autenticado
        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);
        // Verifica que el usuario esté autenticado
        $this->assertAuthenticated();
        // Verifica que la respuesta redirija al usuario a la ruta RouteServiceProvider::HOME
        $response->assertRedirect(RouteServiceProvider::HOME);
    }
     // Prueba que los usuarios no puedan autenticarse con una contraseña incorrecta
    public function test_users_can_not_authenticate_with_invalid_password(): void
    {
          // Crea un usuario utilizando el modelo de fábrica User
        $user = User::factory()->create();
         // Realiza una solicitud POST a la ruta '/login' con una contraseña incorrecta
        $this->post('/login', [
            'email' => $user->email,
            'password' => 'wrong-password',
        ]);
         // Verifica que el usuario no esté autenticado
        $this->assertGuest();
    }

     // Prueba que los usuarios puedan cerrar sesión correctamente
    public function test_users_can_logout(): void
    {
        // Crea un usuario utilizando el modelo User
        $user = User::factory()->create();
         // Realiza una solicitud POST a la ruta '/logout' actuando como el usuario autenticado
        $response = $this->actingAs($user)->post('/logout');
         // Verifica que el usuario no esté autenticado después de cerrar sesión
        $this->assertGuest();
         // Verifica que la respuesta redirija al usuario a la página de inicio '/'
        $response->assertRedirect('/');
    }
}
