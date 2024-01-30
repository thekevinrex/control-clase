<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        \App\Models\Periodo::create([
            'name' => 'Periodo 1 2023-2024',
            'fecha_inicio' => Carbon::now(),
            'fecha_fin' => Carbon::now()->addWeeks(11),
            'semanas' => 11,
        ]);
        /*
                \App\Models\Departament::create(['name' => 'Informatica']);
                \App\Models\Departament::create(['name' => 'Politica']);

                \App\Models\Category::create(['name' => 'Profesor auxiliar']);
                \App\Models\Category::create(['name' => 'Master']);
                \App\Models\Category::create(['name' => 'Recien graduado']);

                \App\Models\Asignature::create(['name' => 'Base de datos']);
                \App\Models\Asignature::create(['name' => 'Programacion']);
                \App\Models\Asignature::create(['name' => 'Ingenieria de software']);
                \App\Models\Asignature::create(['name' => 'Teoria politica']);

                DB::insert('insert into departaments_asignatures (departament_id, asignature_id) 
                    values (1, 1), (1, 3), (1, 2), (2, 4)');

                \App\Models\User::create([
                    'name' => 'Admin Gonzalez Gomez',
                    'password' => Hash::make('admin'),
                    'email' => 'admin@admin.uci.cu',
                    'super_admin' => true,
                ]);

                \App\Models\User::create([
                    'name' => 'Kevin Gonzalez Gomez',
                    'password' => Hash::make('12345678'),
                    'email' => 'kevingg@estudiantes.uci.cu',
                    'departament_id' => 1,
                    'category_id' => 2,
                ]);
        */
    }
}