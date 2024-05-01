<?php

namespace Tests\Feature\Admin;

use Tests\TestCase;
use App\Models\User;
use App\Models\Court;
use Database\Seeders\RoleSeeder;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourtTest extends TestCase
{
    use RefreshDatabase;

    /**  LISTAS PISTAS
     * Verifica que un usuario con permiso pueda acceder a la lista de pistas y
     * uno sin permiso no pueda acceder.
     *
     * @return void
     */
    public function test_user_with_permission_can_access_court_list(): void
    {
        $this->seed(RoleSeeder::class);

        // Creamos un usuario administrador manualmente
        $admin = User::factory()->create();

        // Asignamos al usuario el permiso para ver la lista de pistas en la base de datos
        $admin->givePermissionTo('admin.courts.index');

        // Autenticamos al usuario administrador en el sistema
        $this->actingAs($admin);

        // Realizamos la solicitud GET a la lista de pistas
        $response = $this->get(route('admin.courts.index'));

        // Verificamos que se pueda acceder a la lista de pistas correctamente
        $response->assertStatus(200);

        // Creamos un usuario sin el permiso para ver la lista de pistas
        $userWithoutPermission = User::factory()->create();

        // Autenticamos al usuario sin permiso en el sistema
        $this->actingAs($userWithoutPermission);

        // Realizamos la solicitud GET a la lista de pistas
        $response = $this->get(route('admin.courts.index'));

        // Verificamos que se reciba un código de estado 403 (Acceso prohibido)
        $response->assertStatus(403);
    }


    /** CREAR PISTAS
     * Verifica que el usuario tenga el permiso específico admin.courts.create necesario para acceder al formulario de creación de pistas.
     * y crear la pista
     * @return void
     */
    public function test_user_with_permission_can_access_court_creation(): void
    {
        $this->seed(RoleSeeder::class);
        // Creamos un usuario administrador manualmente
        $admin = User::factory()->create();

        // Asignamos al usuario  el permiso para crear pistas en la base de datos

        $admin->givePermissionTo('admin.courts.create');

        // Autenticamos al usuario administrador en el sistema
        $this->actingAs($admin);

        // Realizamos la solicitud GET al formulario de creación de pista
        $response = $this->get(route('admin.courts.create'));

        // Verificamos que se pueda renderizar el formulario correctamente
        $response->assertStatus(200);

        // Realizamos la solicitud POST para crear una nueva pista
        $response = $this->post(route('admin.courts.store'), [
            'name' => 'Nueva Pista',
            'type' => 'Tenis',
        ]);

        // Verificamos que la pista se haya creado correctamente
        $response->assertStatus(302);

        // Comprobamos que la pista se ha guardado en la base de datos
        $this->assertDatabaseHas('courts', [
            'name' => 'Nueva Pista',
            'type' => 'Tenis',
        ]);

        // Creamos un usuario sin el permiso para crear pistas
        $userWithoutPermission = User::factory()->create();

        // Autenticamos al usuario sin permiso en el sistema
        $this->actingAs($userWithoutPermission);

        // Realizamos la solicitud GET al formulario de creación de pista
        $response = $this->get(route('admin.courts.create'));

        // Verificamos que se reciba un código de estado 403 (Acceso prohibido)
        $response->assertStatus(403);
    }
    

    /**  EDITAR PISTAS
 * Verifica que un usuario con el permiso adecuado pueda acceder al formulario de edición de una pista y editarla.
 *
 * @return void
 */
public function test_user_with_permission_can_access_and_edit_court(): void
{
    // Preparamos el entorno sembrando roles y permisos
    $this->seed(RoleSeeder::class);

    // Creamos un usuario administrador manualmente
    $admin = User::factory()->create();

    // Creamos una pista específica para editar
    $court = Court::factory()->create([
        'name' => 'Pista de Prueba',
        'type' => 'Tenis',
    ]);

    // Asignamos al usuario el permiso para editar pistas en la base de datos
    $admin->givePermissionTo('admin.courts.edit');

    // Autenticamos al usuario administrador en el sistema
    $this->actingAs($admin);

    // Realizamos la solicitud GET al formulario de edición de la pista
    $response = $this->get(route('admin.courts.edit', $court));

    // Verificamos que se pueda acceder al formulario de edición de la pista correctamente
    $response->assertStatus(200);

    // Realizamos la solicitud POST para actualizar los datos de la pista
    $response = $this->put(route('admin.courts.update', $court), [
        'name' => 'Pista Editada',
        'type' => 'Padel',
    ]);

    // Verificamos que la actualización se haya realizado correctamente
    $response->assertStatus(302);

    // Comprobamos que los datos de la pista se han actualizado en la base de datos
    $this->assertDatabaseHas('courts', [
        'id' => $court->id,
        'name' => 'Pista Editada',
        'type' => 'Padel',
    ]);

    // Creamos un usuario sin el permiso para editar pistas
    $userWithoutPermission = User::factory()->create();

    // Autenticamos al usuario sin permiso en el sistema
    $this->actingAs($userWithoutPermission);

    // Realizamos la solicitud GET al formulario de edición de la pista
    $response = $this->get(route('admin.courts.edit', $court));

    // Verificamos que se reciba un código de estado 403 (Acceso prohibido)
    $response->assertStatus(403);
}

/** ELIMINAR PISTA
 * Verifica que un usuario con el permiso adecuado pueda eliminar una pista existente.
 *
 * @return void
 */
public function test_user_with_permission_can_delete_court(): void
{
    // Preparamos el entorno sembrando roles y permisos
    $this->seed(RoleSeeder::class);

    // Creamos una pista existente en la base de datos
    $court = Court::factory()->create([
        'name' => 'Pista de Prueba',
        'type' => 'PADEL',
    ]);

    // Creamos un usuario manualmente
    $user = User::factory()->create();

    // Asignamos al usuario el permiso para eliminar pistas en la base de datos
    $user->givePermissionTo('admin.courts.destroy');

    // Autenticamos al usuario en el sistema
    $this->actingAs($user);

    // Realizamos la solicitud DELETE para eliminar la pista
    $response = $this->delete(route('admin.courts.destroy', $court));

    // Verificamos que la eliminación se haya realizado correctamente
    $response->assertStatus(302);
    
   // Verificamos que el registro de la pista se haya eliminado de la base de datos
$this->assertDatabaseMissing('courts', ['id' => $court->id]);

    // Creamos un usuario sin el permiso para eliminar pistas
    $userWithoutPermission = User::factory()->create();

    // Autenticamos al usuario sin permiso en el sistema
    $this->actingAs($userWithoutPermission);

    // Intentamos realizar la solicitud DELETE para eliminar la pista
    $response = $this->delete(route('admin.courts.destroy', $court));

    // Verificamos que se reciba un código de estado 404 (Acceso prohibido)
    $response->assertStatus(404);
}


}
