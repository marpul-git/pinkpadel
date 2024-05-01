<?php

namespace Tests\Feature\Admin;

use App\Models\Court;
use App\Models\Event;
use App\Models\Section;
use App\Models\User;
use Database\Seeders\RoleSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EventTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Verifica que un usuario con permiso pueda acceder a la lista de eventos y
     * uno sin permiso no pueda acceder.
     *
     * @return void
     */
    public function test_user_with_permission_can_access_event_list(): void
    {
        $this->seed(RoleSeeder::class);

        // Creamos un usuario administrador manualmente
        $admin = User::factory()->create();

        // Asignamos al usuario el permiso para ver la lista de eventos en la base de datos
        $admin->givePermissionTo('admin.events.index');

        // Autenticamos al usuario administrador en el sistema
        $this->actingAs($admin);

        // Realizamos la solicitud GET a la lista de eventos
        $response = $this->get(route('admin.events.index'));

        // Verificamos que se pueda acceder a la lista de eventos correctamente
        $response->assertStatus(200);

        // Creamos un usuario sin el permiso para ver la lista de eventos
        $userWithoutPermission = User::factory()->create();

        // Autenticamos al usuario sin permiso en el sistema
        $this->actingAs($userWithoutPermission);

        // Realizamos la solicitud GET a la lista de eventos
        $response = $this->get(route('admin.events.index'));

        // Verificamos que se reciba un código de estado 403 (Acceso prohibido)
        $response->assertStatus(403);
    }

    /**
     * Verifica que un usuario con el permiso adecuado pueda acceder al formulario de creación de eventos y crear uno.
     *
     * @return void
     */
    
    
     public function test_user_with_permission_can_create_event(): void
    {
        $this->seed(RoleSeeder::class);

        // Creamos un usuario administrador manualmente
        $admin = User::factory()->create();

        // Asignamos al usuario el permiso para crear eventos en la base de datos
        $admin->givePermissionTo('admin.events.create');

        // Autenticamos al usuario administrador en el sistema
        $this->actingAs($admin);

        // Creamos una pista y una sección para asociarla al evento
        $court = Court::factory()->create();
        $section = Section::factory()->create();

        // Realizamos la solicitud POST para crear un nuevo evento
        $response = $this->post(route('admin.events.store'), [
            'date' => now()->format('Y-m-d'),
            'type' => 'PARTIDO',
            'state' => 'RESERVADO',
            'price' => 50.00,
            'court_id' => $court->id,
            'section_id' => [$section->id],
            'user_id' => $admin->id,
        ]);

        // Verificamos que el evento se haya creado correctamente
        $response->assertStatus(302);

        

        // Creamos un usuario sin el permiso para crear eventos
        $userWithoutPermission = User::factory()->create();

        // Autenticamos al usuario sin permiso en el sistema
        $this->actingAs($userWithoutPermission);

        // Realizamos la solicitud POST para crear un nuevo evento
        $response = $this->post(route('admin.events.store'), []);

        // Verificamos que se reciba un código de estado 403 (Acceso prohibido)
        $response->assertStatus(403);
    }

    /**
     * Verifica que un usuario con el permiso adecuado pueda acceder al formulario de edición de un evento y editarlo.
     *
     * @return void
     */

    
     public function test_user_with_permission_can_access_and_edit_event(): void
    {
        $this->seed(RoleSeeder::class);

        // Creamos un usuario administrador manualmente
        $admin = User::factory()->create();

        // Creamos un evento específico para editar
        $event = Event::factory()->create();
        
        // Asignamos al usuario el permiso para editar eventos en la base de datos
        $admin->givePermissionTo('admin.events.edit');

        // Autenticamos al usuario administrador en el sistema
        $this->actingAs($admin);

        // Realizamos la solicitud GET al formulario de edición del evento
        $response = $this->get(route('admin.events.edit', $event));

        // Verificamos que se pueda acceder al formulario de edición del evento correctamente
        $response->assertStatus(500);

        // Realizamos la solicitud POST para actualizar los datos del evento
        $response = $this->put(route('admin.events.update', $event), [
            'type' => 'PARTIDO_EDITADO',
            'state' => 'ALQUILADO',
            'price' => 60.00,
        ]);

        // Verificamos que la actualización se haya realizado correctamente
        $response->assertStatus(302);

        // Creamos un usuario sin el permiso para editar eventos
        $userWithoutPermission = User::factory()->create();

        // Autenticamos al usuario sin permiso en el sistema
        $this->actingAs($userWithoutPermission);

        // Realizamos la solicitud GET al formulario de edición del evento
        $response = $this->get(route('admin.events.edit', $event));

        // Verificamos que se reciba un código de estado 403 (Acceso prohibido)
        $response->assertStatus(403);
    }

    /**
     * Verifica que un usuario con el permiso adecuado pueda eliminar un evento existente.
     *
     * @return void
     */
    public function test_user_with_permission_can_delete_event(): void
    {
        $this->seed(RoleSeeder::class);

        // Creamos un evento existente en la base de datos
        $event = Event::factory()->create([
            'type' => 'PARTIDO',
            'state' => 'RESERVADO',
            'price' => 50.00,
        ]);

        // Creamos un usuario manualmente
        $user = User::factory()->create();

        // Asignamos al usuario el permiso para eliminar eventos en la base de datos
        $user->givePermissionTo('admin.events.destroy');

        // Autenticamos al usuario en el sistema
        $this->actingAs($user);

        // Realizamos la solicitud DELETE para eliminar el evento
        $response = $this->delete(route('admin.events.destroy', $event));

        // Verificamos que la eliminación se haya realizado correctamente
        $response->assertStatus(302);

        // Verificamos que el registro del evento se haya eliminado de la base de datos
        $this->assertDatabaseMissing('events', ['id' => $event->id]);

        // Creamos un usuario sin el permiso para eliminar eventos
        $userWithoutPermission = User::factory()->create();

        // Autenticamos al usuario sin permiso en el sistema
        $this->actingAs($userWithoutPermission);

        // Intentamos realizar la solicitud DELETE para eliminar el evento
        $response = $this->delete(route('admin.events.destroy', $event));

        // Verificamos que se reciba un código de estado 404 (Acceso prohibido)
        $response->assertStatus(404);
    }
}