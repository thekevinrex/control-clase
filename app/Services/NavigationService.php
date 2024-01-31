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

    public function getNavigaitonMap(bool $header = false)
    {
        return collect([
            _('Administración') => [
                [
                    "name" => __('Profesores'),
                    "link" => route('profesors.show'),
                    'des' => 'Administra la información de los profesores',
                    'can' => $this->request->user()->can('viewAny', \App\Models\User::class),
                    "route" => "profesors.*",
                ],
                [
                    "name" => __('Departamentos'),
                    "link" => route('departament.show'),
                    'des' => 'Administra la información de los departamentos',
                    'can' => $this->request->user()->can('viewAny', \App\Models\Departament::class),
                    "route" => "departament.*",
                ],
                [
                    "name" => __('Roles'),
                    "link" => route('role.show'),
                    "des" => 'Asigna los roles a los profesores',
                    'can' => $this->request->user()->can('viewAny', \App\Models\Role::class),
                    "route" => "role.*",
                ],
                [
                    "name" => __('Categories'),
                    "link" => route('categories.show'),
                    "des" => 'Administra la información de las categories',
                    'can' => $this->request->user()->can('viewAny', \App\Models\Category::class),
                    "route" => "categories.*",
                ],
                [
                    "name" => __('Asignatures'),
                    "link" => route("asignature.show"),
                    "des" => 'Administra la información de las asignaturas',
                    'can' => $this->request->user()->can('viewAny', \App\Models\Asignature::class),
                    "route" => "asignature.*",
                ]
            ],
            __('Plans') => [
                [
                    "name" => __('Actual'),
                    "link" => route('plan.actual'),
                    "des" => ''
                ],
                [
                    "name" => __('Create'),
                    "link" => __('plan.create'),
                    "des" => ''
                ],
                [
                    "name" => __('List'),
                    "link" => '#',
                    "des" => ''
                ]
            ],
            __('User') => [
                [
                    "name" => __('Profile'),
                    "link" => route('profile.edit'),
                    "des" => '',
                    'can' => !$header
                ]
            ],
            __('Informs') => [
                [
                    "name" => __('List'),
                    "link" => '#',
                    "des" => ''
                ],
                [
                    "name" => __('Create'),
                    "link" => '#',
                    "des" => ''
                ]
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
