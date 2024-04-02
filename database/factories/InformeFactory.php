<?php

namespace Database\Factories;

use App\Enum\ClassTypeEnum;
use App\Models\User;
use App\Models\Asignature;
use App\Models\Departament;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Informe>
 */
class InformeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $departament = Departament::create([
            'name' => 'Test Departament'
        ]);

        $asignature = Asignature::create([
            'name' => 'Test Asignature'
        ]);

        $departament->asignature()->attach($asignature);

        return [
            'asignature_id' => $asignature->id,

            'periodo_id' => null,

            'departament_id' => $departament->id,

            'titulo' => fake()->sentence(),
            'grupo' => fake()->numberBetween(1000, 7000) . '',
            'tipo_clase' => fake()->randomElement(array_keys(ClassTypeEnum::TYPES)),

            'logros' => fake()->sentence(),
            'deficiencias' => fake()->sentence(),
            'recomendaciones' => fake()->sentence(),
            'evaluation' => fake()->numberBetween(2, 5),

            'state' => 3,
        ];
    }
}
