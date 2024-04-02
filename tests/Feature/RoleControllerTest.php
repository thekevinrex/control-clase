<?php

namespace Tests\Feature;

use App\Enum\RoleEnum;
use Tests\TestCase;
use App\Models\Role;
use App\Models\User;
use App\Tables\RoleTable;
use Illuminate\Http\Request;
use App\Http\Controllers\RoleController;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RoleControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testShow_roles()
    {

        $user = User::factory()->create([
            'super_admin' => 1,
        ]);

        $this->actingAs($user);

        $response = $this->get(route('role.show'));

        $response->assertStatus(200)
            ->assertViewIs('root')
            ->assertViewHas('roles', RoleTable::class);
    }

    public function testCreate_roles()
    {

        $user = User::factory()->create([
            'super_admin' => 1,
        ]);

        $this->actingAs($user);

        $response = $this->get(route('role.create'));

        $response->assertStatus(200)
            ->assertViewIs('root')
            ->assertViewHas('header', __('Añadir rol'))
            ->assertViewHas('action', route('role.add'));
    }

    public function testEdit_roles()
    {
        $user = User::factory()->create([
            'super_admin' => 1,
        ]);

        $this->actingAs($user);

        $role = Role::create([
            'user_id' => $user->id,
            'role_id' => RoleEnum::JEFE,
        ]);

        $response = $this->get(route('role.edit', $role->id));

        $response->assertStatus(200)
            ->assertViewIs('root')
            ->assertViewHas('header', __('Editar rol'))
            ->assertViewHas('action', route('role.update', $role->id))
            ->assertViewHas('edit', true)
            ->assertViewHas('role', $role);
    }

    public function testAdd_roles()
    {

        $user = User::factory()->create([
            'super_admin' => 1,
        ]);

        $this->actingAs($user);

        $data = [
            'user_id' => $user->id,
            'role_id' => RoleEnum::DECANA,
        ];

        $response = $this->post(route('role.add'), $data);

        $response->assertRedirect();

        $response->assertSessionHas('splade.flashToasts', function ($value) {
            $toast = array_shift($value);

            if ($toast instanceof \ProtoneMedia\Splade\SpladeToast) {
                return $toast->toArray()['message'] === __('Rol registrado correctamente');
            }

            return false;
        });

        $this->assertDatabaseHas('roles', [
            'user_id' => $user->id,
            'role_id' => RoleEnum::DECANA,
        ]);
    }

    public function testUpdate_roles()
    {
        $user = User::factory()->create([
            'super_admin' => 1,
        ]);

        $this->actingAs($user);

        $role = Role::create([
            'user_id' => $user->id,
            'role_id' => RoleEnum::JEFE,
        ]);

        $data = [
            'user_id' => $user->id,
            'role_id' => RoleEnum::PROFESOR,
        ];

        $response = $this->patch(route('role.update', $role->id), $data);

        $response->assertRedirect();

        $response->assertSessionHas('splade.flashToasts', function ($value) {
            $toast = array_shift($value);

            if ($toast instanceof \ProtoneMedia\Splade\SpladeToast) {
                return $toast->toArray()['message'] === __('Rol editado correctamente');
            }

            return false;
        });

        $this->assertDatabaseHas('roles', [
            'id' => $role->id,
            'user_id' => $user->id,
            'role_id' => RoleEnum::PROFESOR,
        ]);
    }

    public function testDestroy_roles()
    {
        $user = User::factory()->create([
            'super_admin' => 1,
        ]);

        $this->actingAs($user);

        $role = Role::create([
            'user_id' => $user->id,
            'role_id' => RoleEnum::JEFE,
        ]);

        $response = $this->delete(route('role.delete', $role->id));

        $response->assertRedirect();

        $response->assertSessionHas('splade.flashToasts', function ($value) {
            $toast = array_shift($value);

            if ($toast instanceof \ProtoneMedia\Splade\SpladeToast) {
                return $toast->toArray()['message'] === __('Rol eliminado correctamente');
            }

            return false;
        });


        $this->assertDatabaseMissing('roles', [
            'id' => $role->id,
        ]);
    }
}
