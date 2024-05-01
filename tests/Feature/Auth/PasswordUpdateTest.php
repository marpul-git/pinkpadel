<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class PasswordUpdateTest extends TestCase
{
    // Utiliza el trait RefreshDatabase para migrar la base de datos en cada prueba
    use RefreshDatabase;

    // Prueba que la contraseña pueda ser actualizada correctamente
    public function test_password_can_be_updated(): void
    {
        // Crea un usuario
        $user = User::factory()->create();

        // Realiza una solicitud PUT a la ruta '/password' para actualizar la contraseña
        $response = $this
            ->actingAs($user)
            ->from('/profile')
            ->put('/password', [
                'current_password' => 'password',
                'password' => 'new-password',
                'password_confirmation' => 'new-password',
            ]);

        // Verifica que no haya errores en la sesión y que la redirección sea a '/profile'
        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect('/profile');

        // Verifica que la contraseña del usuario se haya actualizado correctamente
        $this->assertTrue(Hash::check('new-password', $user->refresh()->password));
    }

    // Prueba que se debe proporcionar la contraseña correcta para actualizar la contraseña
    public function test_correct_password_must_be_provided_to_update_password(): void
    {
        // Crea un usuario
        $user = User::factory()->create();

        // Realiza una solicitud PUT a la ruta '/password' con una contraseña incorrecta
        $response = $this
            ->actingAs($user)
            ->from('/profile')
            ->put('/password', [
                'current_password' => 'wrong-password',
                'password' => 'new-password',
                'password_confirmation' => 'new-password',
            ]);

        // Verifica que haya errores en la sesión para el campo 'current_password' y que la redirección sea a '/profile'
        $response
            ->assertSessionHasErrorsIn('updatePassword', 'current_password')
            ->assertRedirect('/profile');
    }
}
