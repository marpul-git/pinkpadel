<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PasswordConfirmationTest extends TestCase
{
    // Utiliza el trait RefreshDatabase para migrar la base de datos en cada prueba
    use RefreshDatabase;

    // Prueba que la pantalla de confirmación de contraseña se pueda renderizar correctamente
    public function test_confirm_password_screen_can_be_rendered(): void
    {
        // Crea un usuario
        $user = User::factory()->create();

        // Realiza una solicitud GET a la ruta '/confirm-password' actuando como el usuario autenticado
        $response = $this->actingAs($user)->get('/confirm-password');

        // Verifica que la respuesta tenga un estado HTTP 200 (OK)
        $response->assertStatus(200);
    }

    // Prueba que la contraseña pueda ser confirmada correctamente
    public function test_password_can_be_confirmed(): void
    {
        // Crea un usuario
        $user = User::factory()->create();

        // Realiza una solicitud POST a la ruta '/confirm-password' con la contraseña del usuario
        $response = $this->actingAs($user)->post('/confirm-password', [
            'password' => 'password',
        ]);

        // Verifica que la respuesta redirija a una URL indefinida
        $response->assertRedirect();

        // Verifica que no haya errores en la sesión
        $response->assertSessionHasNoErrors();
    }

    // Prueba que la contraseña no sea confirmada con una contraseña incorrecta
    public function test_password_is_not_confirmed_with_invalid_password(): void
    {
        // Crea un usuario
        $user = User::factory()->create();

        // Realiza una solicitud POST a la ruta '/confirm-password' con una contraseña incorrecta
        $response = $this->actingAs($user)->post('/confirm-password', [
            'password' => 'wrong-password',
        ]);

        // Verifica que haya errores en la sesión
        $response->assertSessionHasErrors();
    }
}
