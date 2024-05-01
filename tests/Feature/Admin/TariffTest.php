<?php

namespace Tests\Feature\Admin;

use App\Models\Tariff;
use App\Models\User;
use Database\Seeders\RoleSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TariffTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Verifica que un usuario con permiso pueda acceder a la lista de tarifas y
     * uno sin permiso no pueda acceder.
     *
     * @return void
     */
    public function test_user_with_permission_can_access_tariff_list(): void
    {
        $this->seed(RoleSeeder::class);

        // Creamos un usuario administrador manualmente
        $admin = User::factory()->create();

        // Asignamos al usuario el permiso para ver la lista de tarifas en la base de datos
        $admin->givePermissionTo('admin.tariffs.index');

        // Autenticamos al usuario administrador en el sistema
        $this->actingAs($admin);

        // Realizamos la solicitud GET a la lista de tarifas
        $response = $this->get(route('admin.tariffs.index'));

        // Verificamos que se pueda acceder a la lista de tarifas correctamente
        $response->assertStatus(200);

        // Creamos un usuario sin el permiso para ver la lista de tarifas
        $userWithoutPermission = User::factory()->create();

        // Autenticamos al usuario sin permiso en el sistema
        $this->actingAs($userWithoutPermission);

        // Realizamos la solicitud GET a la lista de tarifas
        $response = $this->get(route('admin.tariffs.index'));

        // Verificamos que se reciba un código de estado 403 (Acceso prohibido)
        $response->assertStatus(403);
    }

    /**
     * Verifica que un usuario con el permiso adecuado pueda acceder al formulario de creación de tarifas y crear una tarifa.
     *
     * @return void
     */
    public function test_user_with_permission_can_create_tariff(): void
    {
        $this->seed(RoleSeeder::class);

        // Creamos un usuario administrador manualmente
        $admin = User::factory()->create();

        // Asignamos al usuario el permiso para crear tarifas en la base de datos
        $admin->givePermissionTo('admin.tariffs.create');

        // Autenticamos al usuario administrador en el sistema
        $this->actingAs($admin);

        // Realizamos la solicitud GET al formulario de creación de tarifas
        $response = $this->get(route('admin.tariffs.create'));

        // Verificamos que se pueda acceder al formulario de creación de tarifas correctamente
        $response->assertStatus(200);

        // Realizamos la solicitud POST para crear una nueva tarifa
        $response = $this->post(route('admin.tariffs.store'), [
            'name' => 'Tarifa Nueva',
            'price' => number_format(mt_rand(1000, 10000) / 100, 2),
        ]);

        // Verificamos que la tarifa se haya creado correctamente
        $response->assertStatus(302);

        // Comprobamos que la tarifa se ha guardado en la base de datos
        $this->assertDatabaseHas('tariffs', [
            'name' => 'Tarifa Nueva',
        ]);

        // Creamos un usuario sin el permiso para crear tarifas
        $userWithoutPermission = User::factory()->create();

        // Autenticamos al usuario sin permiso en el sistema
        $this->actingAs($userWithoutPermission);

        // Realizamos la solicitud GET al formulario de creación de tarifas
        $response = $this->get(route('admin.tariffs.create'));

        // Verificamos que se reciba un código de estado 403 (Acceso prohibido)
        $response->assertStatus(403);
    }

    /**
     * Verifica que un usuario con el permiso adecuado pueda acceder al formulario de edición de una tarifa y editarla.
     *
     * @return void
     */
    public function test_user_with_permission_can_access_and_edit_tariff(): void
    {
        $this->seed(RoleSeeder::class);

        // Creamos un usuario administrador manualmente
        $admin = User::factory()->create();

        // Creamos una tarifa específica para editar
        $tariff = Tariff::factory()->create([
            'name' => 'Tarifa de Prueba',
            'price' => 10.00,
        ]);

        // Asignamos al usuario el permiso para editar tarifas en la base de datos
        $admin->givePermissionTo('admin.tariffs.edit');

        // Autenticamos al usuario administrador en el sistema
        $this->actingAs($admin);

        // Realizamos la solicitud GET al formulario de edición de la tarifa
        $response = $this->get(route('admin.tariffs.edit', $tariff));

        // Verificamos que se pueda acceder al formulario de edición de la tarifa correctamente
        $response->assertStatus(200);

        // Realizamos la solicitud POST para actualizar los datos de la tarifa
        $response = $this->put(route('admin.tariffs.update', $tariff), [
            'name' => 'Tarifa Editada',
            'price' => number_format(mt_rand(1000, 10000) / 100, 2),
        ]);

        // Verificamos que la actualización se haya realizado correctamente
        $response->assertStatus(302);

        // Comprobamos que los datos de la tarifa se han actualizado en la base de datos
        $this->assertDatabaseHas('tariffs', [
            'id' => $tariff->id,
            'name' => 'Tarifa Editada',
        ]);

        // Creamos un usuario sin el permiso para editar tarifas
        $userWithoutPermission = User::factory()->create();

        // Autenticamos al usuario sin permiso en el sistema
        $this->actingAs($userWithoutPermission);

        // Realizamos la solicitud GET al formulario de edición de la tarifa
        $response = $this->get(route('admin.tariffs.edit', $tariff));

        // Verificamos que se reciba un código de estado 403 (Acceso prohibido)
        $response->assertStatus(403);
    }

    /**
     * Verifica que un usuario con el permiso adecuado pueda eliminar una tarifa existente.
     *
     * @return void
     */
    public function test_user_with_permission_can_delete_tariff(): void
    {
        $this->seed(RoleSeeder::class);

        // Creamos una tarifa existente en la base de datos
        $tariff = Tariff::factory()->create([
            'name' => 'Tarifa de Prueba',
            'price' => 20.00,
        ]);

        // Creamos un usuario manualmente
        $user = User::factory()->create();

        // Asignamos al usuario el permiso para eliminar tarifas en la base de datos
        $user->givePermissionTo('admin.tariffs.destroy');

        // Autenticamos al usuario en el sistema
        $this->actingAs($user);

        // Realizamos la solicitud DELETE para eliminar la tarifa
        $response = $this->delete(route('admin.tariffs.destroy', $tariff));

        // Verificamos que la eliminación se haya realizado correctamente
        $response->assertStatus(302);

        // Verificamos que el registro de la tarifa se haya eliminado de la base de datos
        $this->assertDatabaseMissing('tariffs', ['id' => $tariff->id]);

        // Creamos un usuario sin el permiso para eliminar tarifas
        $userWithoutPermission = User::factory()->create();

        // Autenticamos al usuario sin permiso en el sistema
        $this->actingAs($userWithoutPermission);

        // Intentamos realizar la solicitud DELETE para eliminar la tarifa
        $response = $this->delete(route('admin.tariffs.destroy', $tariff));

        // Verificamos que se reciba un código de estado 403 (Acceso prohibido)
        $response->assertStatus(404);
    }
}
