<?php

namespace Tests\Unit;

use App\Enum\RoleEnum as EnumRoleEnum;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Informe;
use App\Models\User;
use App\Models\Plan;
use App\Models\Notification;
use App\Enums\RoleEnum;
use App\Models\Role;
use App\Policies\InformePolicy;

class InformeControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testShow_informe()
    {

        $user = User::factory()->create([
            'super_admin' => 1,
        ]);

        $this->actingAs($user);

        $response = $this->get(route('informe.show'));

        $response->assertStatus(200)
            ->assertViewIs('root')
            ->assertViewHas('informes');
    }

    public function testView_informe()
    {

        $user = User::factory()->create([
            'super_admin' => 1,
        ]);

        $this->actingAs($user);

        $controlador = User::factory()->create();
        $controlado = User::factory()->create();

        $informe = Informe::factory()->create(['user_id' => $controlador->id, 'to_user_id' => $controlado->id]);

        $response = $this->get(route('informe.view', $informe->id));

        $response->assertStatus(200)
            ->assertViewIs('root')
            ->assertViewHas('informe', $informe)
            ->assertViewHas('own', $user->id == $informe->user_id);
    }

    public function testCreate()
    {
        $user = User::factory()->create([]);
        $controlador = User::factory()->create(['departament_id' => $user->departament_id]);
        $jefe = User::factory()->create(['departament_id' => $user->departament_id]);

        $role = Role::create([
            'user_id' => $controlador->id,
            'role_id' => EnumRoleEnum::PROFESOR
        ]);

        $plan = Plan::factory()->create(['departament_id' => $user->departament_id, 'user_id' => $jefe->id]);

        $control = $plan->controls()->create([
            'controlador' => $controlador->id,
            'controlado' => $user->id,
            'semana' => 4
        ]);

        $this->actingAs($controlador);

        $response = $this->get(route('informe.create'));

        $response->assertStatus(200)
            ->assertViewIs('root')
            ->assertViewHas('profesors')
            ->assertViewHas('asignatures');
    }

    public function testEdit_informe()
    {
        $user = User::factory()->create();
        $to_user = User::factory(['departament_id' => $user->departament_id])->create();

        $this->actingAs($user);

        $role = Role::create([
            'user_id' => $user->id,
            'role_id' => EnumRoleEnum::PROFESOR
        ]);

        $plan = Plan::factory()->create(['departament_id' => $user->departament_id, 'user_id' => $user->id]);

        $control = $plan->controls()->create([
            'controlador' => $user->id,
            'controlado' => $to_user->id,
            'semana' => 4
        ]);

        $informe = Informe::factory()->create(['user_id' => $user->id, 'to_user_id' => $to_user->id]);

        $response = $this->get(route('informe.edit', $informe->id));

        $response->assertStatus(200)
            ->assertViewIs('root')
            ->assertViewHas('profesors')
            ->assertViewHas('asignatures')
            ->assertViewHas('informe', $informe);
    }

    public function testAdd()
    {
        $user = User::factory()->create();
        $to_user = User::factory(['departament_id' => $user->departament_id])->create();

        $this->actingAs($user);

        $role = Role::create([
            'user_id' => $user->id,
            'role_id' => EnumRoleEnum::PROFESOR
        ]);

        $plan = Plan::factory()->create(['departament_id' => $user->departament_id, 'user_id' => $user->id]);

        $control = $plan->controls()->create([
            'controlador' => $user->id,
            'controlado' => $to_user->id,
            'semana' => 4
        ]);

        $informeData = Informe::factory()->make(['user_id' => $user->id, 'to_user_id' => $to_user->id, 'departament_id' => $user->departament_id])->toArray();

        $response = $this->post(route('informe.start'), $informeData);

        $response->assertRedirect();

        $response->assertSessionHas('splade.flashToasts', function ($value) {
            $toast = array_shift($value);

            if ($toast instanceof \ProtoneMedia\Splade\SpladeToast) {
                return $toast->toArray()['message'] === 'Informe registrado correctamente';
            }

            return false;
        });

        $this->assertDatabaseHas('informes', $informeData);
    }

    public function testUpdate_informe()
    {
        $user = User::factory()->create();

        $role = Role::create([
            'user_id' => $user->id,
            'role_id' => EnumRoleEnum::PROFESOR
        ]);

        $response = $this->actingAs($user)
            ->patch(route('informe.update', -4), []);

        $response->assertStatus(404);
    }

    public function testDelete()
    {
        $user = User::factory()->create([
            'super_admin' => 1,
        ]);

        $this->actingAs($user);

        $controlador = User::factory()->create();
        $controlado = User::factory()->create();

        $informe = Informe::factory()->create(['user_id' => $controlador->id, 'to_user_id' => $controlado->id]);

        $response = $this->delete(route('informe.delete', $informe->id));

        $response->assertRedirect();

        $response->assertSessionHas('splade.flashToasts', function ($value) {
            $toast = array_shift($value);

            if ($toast instanceof \ProtoneMedia\Splade\SpladeToast) {
                return $toast->toArray()['message'] === 'Informe eliminado correctamente';
            }

            return false;
        });

        $this->assertDatabaseMissing('informes', ['id' => $informe->id]);
        $this->assertDatabaseMissing('notifiactions', ['aditional_id' => $informe->id]);
    }
}
