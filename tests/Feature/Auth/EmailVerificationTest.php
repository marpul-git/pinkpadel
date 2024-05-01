<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\URL;
use Tests\TestCase;

class EmailVerificationTest extends TestCase
{
    // Utiliza el trait RefreshDatabase para migrar la base de datos en cada prueba
    use RefreshDatabase;

    // Prueba que la pantalla de verificación de correo electrónico se pueda renderizar correctamente
    public function test_email_verification_screen_can_be_rendered(): void
    {
        // Crea un usuario sin verificar el correo electrónico
        $user = User::factory()->create([
            'email_verified_at' => null,
        ]);

        // Realiza una solicitud GET a la ruta '/verify-email' actuando como el usuario autenticado
        $response = $this->actingAs($user)->get('/verify-email');

        // Verifica que la respuesta tenga un estado HTTP 200 (OK)
        $response->assertStatus(200);
    }

    // Prueba que el correo electrónico pueda ser verificado correctamente
    public function test_email_can_be_verified(): void
    {
        // Crea un usuario sin verificar el correo electrónico
        $user = User::factory()->create([
            'email_verified_at' => null,
        ]);

        // Finge la emisión de eventos
        Event::fake();

        // Genera una URL de verificación temporal firmada
        $verificationUrl = URL::temporarySignedRoute(
            'verification.verify',
            now()->addMinutes(60),
            ['id' => $user->id, 'hash' => sha1($user->email)]
        );

        // Realiza una solicitud GET a la URL de verificación actuando como el usuario autenticado
        $response = $this->actingAs($user)->get($verificationUrl);

        // Verifica que se haya despachado el evento Verified
        Event::assertDispatched(Verified::class);

        // Verifica que el correo electrónico del usuario esté verificado
        $this->assertTrue($user->fresh()->hasVerifiedEmail());

        // Verifica que la respuesta redirija al usuario a la ruta RouteServiceProvider::HOME con un parámetro 'verified=1'
        $response->assertRedirect(RouteServiceProvider::HOME.'?verified=1');
    }

    // Prueba que el correo electrónico no sea verificado con un hash inválido
    public function test_email_is_not_verified_with_invalid_hash(): void
    {
        // Crea un usuario sin verificar el correo electrónico
        $user = User::factory()->create([
            'email_verified_at' => null,
        ]);

        // Genera una URL de verificación temporal firmada con un hash incorrecto
        $verificationUrl = URL::temporarySignedRoute(
            'verification.verify',
            now()->addMinutes(60),
            ['id' => $user->id, 'hash' => sha1('wrong-email')]
        );

        // Realiza una solicitud GET a la URL de verificación actuando como el usuario autenticado
        $this->actingAs($user)->get($verificationUrl);

        // Verifica que el correo electrónico del usuario no esté verificado
        $this->assertFalse($user->fresh()->hasVerifiedEmail());
    }
}

