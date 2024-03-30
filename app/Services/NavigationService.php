<?php

namespace App\Services;

use Illuminate\Http\Request;

class NavigationService
{

    public Request $request;

    public function __construct()
    {
        $this->request = request();
    }

    public function getNavigaitonMap(bool $header = false, bool $footer = false)
    {

        $user = $this->request->user();

        return collect([
            _('Administración') => [
                [
                    "name" => __('Profesores'),
                    "link" => route('profesors.show'),
                    'des' => 'Administra la información de los profesores',
                    'can' => $user->can('viewAny', \App\Models\User::class),
                    "route" => "profesors.*",
                ],
                [
                    "name" => __('Departamentos'),
                    "link" => route('departament.show'),
                    'des' => 'Administra la información de los departamentos',
                    'can' => $user->can('viewAny', \App\Models\Departament::class),
                    "route" => "departament.*",
                ],
                [
                    "name" => __('Roles'),
                    "link" => route('role.show'),
                    "des" => 'Asigna los roles a los profesores',
                    'can' => $user->can('viewAny', \App\Models\Role::class),
                    "route" => "role.*",
                ],
                [
                    "name" => __('Categories'),
                    "link" => route('categories.show'),
                    "des" => 'Administra la información de las categories',
                    'can' => $user->can('viewAny', \App\Models\Category::class),
                    "route" => "categories.*",
                ],
                [
                    "name" => __('Asignatures'),
                    "link" => route("asignature.show"),
                    "des" => 'Administra la información de las asignaturas',
                    'can' => $user->can('viewAny', \App\Models\Asignature::class),
                    "route" => "asignature.*",
                ]
            ],
            __('Planes') => [
                [
                    "name" => __('Plan Actual'),
                    "link" => route('plan.actual'),
                    "des" => '',
                    'can' => $user->can('actual', \App\Models\Plan::class)
                ],
                [
                    "name" => __('Crear plan'),
                    "link" => route('plan.create'),
                    "des" => '',
                    'can' => $user->can('create', \App\Models\Plan::class)
                ],
            ],
            __('Usuario') => [
                [
                    "name" => __('Perfil'),
                    "link" => route('profile.edit'),
                    "des" => '',
                    'can' => !$header && !$footer
                ]
            ],
            __('Informes') => [
                [
                    "name" => __('Informes'),
                    "link" => route('informe.show'),
                    "des" => '',
                    'can' => $user->can('viewAny', \App\Models\Informe::class)
                ],
                [
                    "name" => __('Crear informe'),
                    "link" => route('informe.create'),
                    "des" => '',
                    'can' => $user->can('create', \App\Models\Informe::class)
                ]
            ],
            __('Archivo') => [
                [
                    "name" => __('Informes de control archivados'),
                    "link" => route('periodos.show'),
                    "des" => '',
                    'can' => $user->can('viewAny', \App\Models\Periodo::class)
                ],
            ]
        ])
            ->mapWithKeys(function ($item, $key) {

                return [$key => collect($item)->reject(function ($item) {
                    return isset($item['can']) ? !$item['can'] : false;
                })];
            })
            ->reject(function ($item) {
                return $item->isEmpty();
            });
    }
}
