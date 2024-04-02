<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Asignature;
use App\Models\Departament;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $category = Category::create(['name' => 'Test Category']);

        $departament = Departament::first();

        if (is_null($departament)) {
            $departament = Departament::create([
                'name' => 'Test Departament'
            ]);

            $asignature = Asignature::create([
                'name' => 'Test Asignature'
            ]);

            $departament->asignature()->attach($asignature);
        }

        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'category_id' => $category->id,

            'departament_id' => $departament->id,
            'super_admin' => false,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
