<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use App\Models\Category;
use App\Http\Controllers\CategoryController;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testShow()
    {

        $user = User::factory()->create([
            'super_admin' => 1,
        ]);

        $this->actingAs($user);


        $response = $this->get(route('categories.show'));

        $response->assertStatus(200);
        $response->assertViewIs('root');
        $response->assertViewHas('categories');
    }

    public function testCreate()
    {

        $user = User::factory()->create([
            'super_admin' => 1,
        ]);

        $this->actingAs($user);

        $response = $this->get(route('categories.create'));

        $response->assertStatus(200);
        $response->assertViewIs('root');
        $response->assertViewHas('header', __('Añadir categoria docente'));
        $response->assertViewHas('action', route('categories.add'));
    }

    public function testEdit()
    {
        $user = User::factory()->create([
            'super_admin' => 1,
        ]);

        $this->actingAs($user);

        $category = Category::create(['name' => 'Test Category']);

        $response = $this->get(route('categories.edit', $category->id));

        $response->assertStatus(200);
        $response->assertViewIs('root');
        $response->assertViewHas('header', __('Editar categoria docente'));
        $response->assertViewHas('action', route('categories.update', $category->id));
        $response->assertViewHas('edit', true);
        $response->assertViewHas('category', $category);
    }

    public function testAdd_category()
    {

        $user = User::factory()->create([
            'super_admin' => 1,
        ]);

        $this->actingAs($user);

        $data = [
            'name' => 'Test Category',
        ];

        $response = $this->post(route('categories.add'), $data);

        $response->assertRedirect();

        $response->assertSessionHas('splade.flashToasts', function ($value) {
            $toast = array_shift($value);

            if ($toast instanceof \ProtoneMedia\Splade\SpladeToast) {
                return $toast->toArray()['message'] === __('Categoria docente registrada correctamente');
            }

            return false;
        });

        $this->assertDatabaseHas('categories', $data);
    }

    public function testUpdate()
    {
        $user = User::factory()->create([
            'super_admin' => 1,
        ]);

        $this->actingAs($user);

        $category = Category::create(['name' => 'Test Category']);

        $data = [
            'name' => 'Updated Category',
        ];

        $response = $this->patch(route('categories.update', $category->id), $data);

        $response->assertRedirect();

        $response->assertSessionHas('splade.flashToasts', function ($value) {
            $toast = array_shift($value);

            if ($toast instanceof \ProtoneMedia\Splade\SpladeToast) {
                return $toast->toArray()['message'] === __('Categoria docente editada correctamente');
            }

            return false;
        });

        $this->assertDatabaseHas('categories', $data);
    }

    public function testDestroy()
    {

        $user = User::factory()->create([
            'super_admin' => 1,
        ]);

        $this->actingAs($user);

        $category = Category::create(['name' => 'Test Category']);

        $response = $this->delete(route('categories.delete', $category->id));

        $response->assertRedirect();

        $response->assertSessionHas('splade.flashToasts', function ($value) {
            $toast = array_shift($value);

            if ($toast instanceof \ProtoneMedia\Splade\SpladeToast) {
                return $toast->toArray()['message'] === __('Categoria docente eliminada correctamente');
            }

            return false;
        });

        $this->assertDatabaseMissing('categories', ['id' => $category->id]);
    }
}
