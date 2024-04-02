<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use App\Models\Asignature;
use App\Models\Departament;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DepartamentControllerTest extends TestCase
{
    use RefreshDatabase;


    public function testShow_departament()
    {

        $user = User::factory()->create([
            'super_admin' => 1,
        ]);

        $this->actingAs($user);

        $response = $this->get(route('departament.show'));

        $response->assertStatus(200);
        $response->assertViewIs('root');
        $response->assertViewHas('departaments');
    }

    public function testCreate_departament()
    {
        $user = User::factory()->create([
            'super_admin' => 1,
        ]);

        $this->actingAs($user);

        $response = $this->get(route('departament.create'));

        $response->assertStatus(200);
        $response->assertViewIs('root');
        $response->assertViewHas('header', __('Añadir departamento'));
        $response->assertViewHas('action', route('departament.add'));
    }

    public function testEdit_departament()
    {

        $user = User::factory()->create([
            'super_admin' => 1,
        ]);

        $this->actingAs($user);

        $departament = Departament::create(['name' => 'Test Departament']);
        $asignature = Asignature::create(['name' => 'Test Asignature']);

        $departament->asignature()->attach($asignature);

        $response = $this->get(route('departament.edit', $departament));

        $response->assertStatus(200);
        $response->assertViewIs('root');
        $response->assertViewHas('header', __('Editar departamento'));
        $response->assertViewHas('action', route('departament.update', $departament->id));
        $response->assertViewHas('edit', true);
        $response->assertViewHas('departament', $departament);
    }

    public function testAdd_departament()
    {

        $user = User::factory()->create([
            'super_admin' => 1,
        ]);

        $this->actingAs($user);

        $asignature = Asignature::create(['name' => 'Test Asignature']);

        $data = [
            'name' => 'Test Departament',
            'asignatures' => [$asignature->id],
        ];

        $response = $this->post(route('departament.add'), $data);

        $response->assertRedirect();

        $response->assertSessionHas('splade.flashToasts', function ($value) {
            $toast = array_shift($value);

            if ($toast instanceof \ProtoneMedia\Splade\SpladeToast) {
                return $toast->toArray()['message'] === 'Departamento registrado correctamente';
            }

            return false;
        });

        $this->assertDatabaseHas('departaments', [
            'name' => 'Test Departament',
        ]);

        $this->assertDatabaseHas('departaments_asignatures', [
            'departament_id' => Departament::latest()->first()->id,
            'asignature_id' => $asignature->id,
        ]);
    }

    public function testUpdate_departament()
    {

        $user = User::factory()->create([
            'super_admin' => 1,
        ]);

        $this->actingAs($user);

        $departament = Departament::create(['name' => 'Test Departament']);
        $asignature = Asignature::create(['name' => 'Test Asignature']);

        $departament->asignature()->attach($asignature);

        $data = [
            'name' => 'Updated Departament',
            'asignatures' => [$asignature->id],
        ];

        $response = $this->patch(route('departament.update', $departament->id), $data);

        $response->assertRedirect();

        $response->assertSessionHas('splade.flashToasts', function ($value) {
            $toast = array_shift($value);

            if ($toast instanceof \ProtoneMedia\Splade\SpladeToast) {
                return $toast->toArray()['message'] === 'Departamento editado correctamente';
            }

            return false;
        });

        $this->assertDatabaseHas('departaments', [
            'id' => $departament->id,
            'name' => 'Updated Departament',
        ]);

        $this->assertDatabaseHas('departaments_asignatures', [
            'departament_id' => $departament->id,
            'asignature_id' => $asignature->id,
        ]);
    }

    public function testDestroy_departament()
    {

        $user = User::factory()->create([
            'super_admin' => 1,
        ]);

        $this->actingAs($user);

        $departament = Departament::create(['name' => 'Test Departament']);

        $response = $this->delete(route('departament.delete', $departament->id));

        $response->assertRedirect();

        $response->assertSessionHas('splade.flashToasts', function ($value) {
            $toast = array_shift($value);

            if ($toast instanceof \ProtoneMedia\Splade\SpladeToast) {
                return $toast->toArray()['message'] === 'Departamento eliminado correctamente';
            }

            return false;
        });

        $this->assertDatabaseMissing('departaments', [
            'id' => $departament->id,
        ]);
    }
}
