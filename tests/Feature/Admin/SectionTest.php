<?php

namespace Tests\Feature\Admin;

use App\Models\Section;
use App\Models\User;
use Database\Seeders\RoleSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SectionTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Verifica que un usuario con permiso pueda acceder a la lista de secciones horarias y
     * uno sin permiso no pueda acceder.
     *
     * @return void
     */
    public function test_user_with_permission_can_access_section_list(): void
    {
        $this->seed(RoleSeeder::class);

        // Creamos un usuario administrador manualmente
        $admin = User::factory()->create();

        // Asignamos al usuario el permiso para ver la lista de secciones en la base de datos
        $admin->givePermissionTo('admin.sections.index');

        // Autenticamos al usuario administrador en el sistema
        $this->actingAs($admin);

        // Realizamos la solicitud GET a la lista de secciones
        $response = $this->get(route('admin.sections.index'));

        // Verificamos que se pueda acceder a la lista de secciones correctamente
        $response->assertStatus(200);

        // Creamos un usuario sin el permiso para ver la lista de secciones
        $userWithoutPermission = User::factory()->create();

        // Autenticamos al usuario sin permiso en el sistema
        $this->actingAs($userWithoutPermission);

        // Realizamos la solicitud GET a la lista de secciones
        $response = $this->get(route('admin.sections.index'));

        // Verificamos que se reciba un código de estado 403 (Acceso prohibido)
        $response->assertStatus(403);
    }

    /**
     * Verifica que un usuario con el permiso adecuado pueda acceder al formulario de creación de secciones y crear una nueva sección.
     *
     * @return void
     */
    public function test_user_with_permission_can_create_section(): void
    {
        $this->seed(RoleSeeder::class);

        // Creamos un usuario administrador manualmente
        $admin = User::factory()->create();

        // Asignamos al usuario el permiso para crear secciones en la base de datos
        $admin->givePermissionTo('admin.sections.create');

        // Autenticamos al usuario administrador en el sistema
        $this->actingAs($admin);

        // Realizamos la solicitud GET al formulario de creación de sección
        $response = $this->get(route('admin.sections.create'));

        // Verificamos que se pueda acceder al formulario de creación de sección correctamente
        $response->assertStatus(200);

        // Realizamos la solicitud POST para crear una nueva sección
        $response = $this->post(route('admin.sections.store'), [
            'start_time' => '09:00:00',
            'end_time' => '09:30:00',
        ]);

        // Verificamos que la sección se haya creado correctamente
        $response->assertStatus(302);

        // Comprobamos que la sección se ha guardado en la base de datos
        $this->assertDatabaseHas('sections', [
            'start_time' => '09:00:00',
            'end_time' => '09:30:00',
        ]);
    }

    /**
     * Verifica que un usuario con el permiso adecuado pueda acceder al formulario de edición de una sección y editarla.
     *
     * @return void
     */
    public function test_user_with_permission_can_access_and_edit_section(): void
    {
        $this->seed(RoleSeeder::class);

        // Creamos un usuario administrador manualmente
        $admin = User::factory()->create();

        // Creamos una sección específica para editar
        $section = Section::factory()->create([
            'start_time' => '09:00:00',
            'end_time' => '09:30:00',
        ]);

        // Asignamos al usuario el permiso para editar secciones en la base de datos
        $admin->givePermissionTo('admin.sections.edit');

        // Autenticamos al usuario administrador en el sistema
        $this->actingAs($admin);

        // Realizamos la solicitud GET al formulario de edición de la sección
        $response = $this->get(route('admin.sections.edit', $section));

        // Verificamos que se pueda acceder al formulario de edición de la sección correctamente
        $response->assertStatus(200);

        // Realizamos la solicitud POST para actualizar los datos de la sección
        $response = $this->put(route('admin.sections.update', $section), [
            'start_time' => '10:00:00',
            'end_time' => '10:30:00',
        ]);

        // Verificamos que la actualización se haya realizado correctamente
        $response->assertStatus(302);

        // Comprobamos que los datos de la sección se han actualizado en la base de datos
        $this->assertDatabaseHas('sections', [
            'id' => $section->id,
            'start_time' => '10:00:00',
            'end_time' => '10:30:00',
        ]);
    }

    /**
     * Verifica que un usuario con el permiso adecuado pueda eliminar una sección existente.
     *
     * @return void
     */
    public function test_user_with_permission_can_delete_section(): void
    {
        $this->seed(RoleSeeder::class);

        // Creamos una sección existente en la base de datos
        $section = Section::factory()->create([
            'start_time' => '09:00:00',
            'end_time' => '09:30:00',
        ]);

        // Creamos un usuario manualmente
        $user = User::factory()->create();

        // Asignamos al usuario el permiso para eliminar secciones en la base de datos
        $user->givePermissionTo('admin.sections.destroy');

        // Autenticamos al usuario en el sistema
        $this->actingAs($user);

        // Realizamos la solicitud DELETE para eliminar la sección
        $response = $this->delete(route('admin.sections.destroy', $section));

        // Verificamos que la eliminación se haya realizado correctamente
        $response->assertStatus(302);
        
        // Verificamos que el registro de la sección se haya eliminado de la base de datos
        $this->assertDatabaseMissing('sections', ['id' => $section->id]);

        // Creamos un usuario sin el permiso para eliminar secciones
        $userWithoutPermission = User::factory()->create();

        // Autenticamos al usuario sin permiso en el sistema
        $this->actingAs($userWithoutPermission);

        // Intentamos realizar la solicitud DELETE para eliminar la sección
        $response = $this->delete(route('admin.sections.destroy', $section));

        // Verificamos que se reciba un código de estado 404 (Acceso prohibido)
        $response->assertStatus(404);
    }
}
