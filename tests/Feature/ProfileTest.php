<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProfileTest extends TestCase
{
    // Utiliza el trait RefreshDatabase para migrar la base de datos en cada prueba
    use RefreshDatabase;

    // Prueba que la página de perfil se pueda mostrar correctamente
    public function test_profile_page_is_displayed(): void
    {
        // Crea un usuario
        $user = User::factory()->create();

        // Realiza una solicitud GET a la ruta '/profile' actuando como el usuario autenticado
        $response = $this
            ->actingAs($user)
            ->get('/profile');

        // Verifica que la respuesta tenga un estado HTTP 200 (OK)
        $response->assertOk();
    }

    // Prueba que la información del perfil se pueda actualizar correctamente
    public function test_profile_information_can_be_updated(): void
    {
        // Crea un usuario
        $user = User::factory()->create();

        // Realiza una solicitud PATCH a la ruta '/profile' para actualizar la información del perfil
        $response = $this
            ->actingAs($user)
            ->patch('/profile', [
                'name' => 'Test User',
                'email' => 'test@example.com',
            ]);

        // Verifica que no haya errores en la sesión y que la redirección sea a '/profile'
        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect('/profile');

        // Actualiza la instancia del usuario desde la base de datos
        $user->refresh();

        // Verifica que la información del perfil se haya actualizado correctamente
        $this->assertSame('Test User', $user->name);
        $this->assertSame('test@example.com', $user->email);
        $this->assertNull($user->email_verified_at);
    }

    // Prueba que el estado de verificación de correo electrónico no cambie cuando la dirección de correo electrónico no cambia
    public function test_email_verification_status_is_unchanged_when_the_email_address_is_unchanged(): void
    {
        // Crea un usuario
        $user = User::factory()->create();

        // Realiza una solicitud PATCH a la ruta '/profile' con la misma dirección de correo electrónico
        $response = $this
            ->actingAs($user)
            ->patch('/profile', [
                'name' => 'Test User',
                'email' => $user->email,
            ]);

        // Verifica que no haya errores en la sesión y que la redirección sea a '/profile'
        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect('/profile');

        // Actualiza la instancia del usuario desde la base de datos
        $this->assertNotNull($user->refresh()->email_verified_at);
    }

    // Prueba que el usuario pueda eliminar su cuenta correctamente
    public function test_user_can_delete_their_account(): void
    {
        // Crea un usuario
        $user = User::factory()->create();

        // Realiza una solicitud DELETE a la ruta '/profile' para eliminar la cuenta
        $response = $this
            ->actingAs($user)
            ->delete('/profile', [
                'password' => 'password',
            ]);

        // Verifica que no haya errores en la sesión y que la redirección sea a '/'
        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect('/');

        // Verifica que el usuario no esté autenticado y que el usuario no exista en la base de datos
        $this->assertGuest();
        $this->assertNull($user->fresh());
    }

    // Prueba que se debe proporcionar la contraseña correcta para eliminar la cuenta
    public function test_correct_password_must_be_provided_to_delete_account(): void
    {
        // Crea un usuario
        $user = User::factory()->create();

        // Realiza una solicitud DELETE a la ruta '/profile' con una contraseña incorrecta
        $response = $this
            ->actingAs($user)
            ->from('/profile')
            ->delete('/profile', [
                'password' => 'wrong-password',
            ]);

        // Verifica que haya errores en la sesión para el campo 'password' y que la redirección sea a '/profile'
        $response
            ->assertSessionHasErrorsIn('userDeletion', 'password')
            ->assertRedirect('/profile');

        // Verifica que el usuario todavía exista en la base de datos
        $this->assertNotNull($user->fresh());
    }
}
