<?php

namespace App\Http\Controllers;

use App\Enum\RoleEnum;
use App\Models\Plan;
use App\Models\User;
use App\Models\Informe;
use App\Models\Category;
use App\Tables\ControlsTable;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use ProtoneMedia\Splade\Facades\Toast;

class PlanController extends Controller
{

    public function actual()
    {
        $this->authorize('actual', Plan::class);

        $departament_id = Auth::user()?->departament_id;

        if (Auth::user()->roles->contains(fn ($value) => in_array($value->role_id, [RoleEnum::DECANA, RoleEnum::ADMIN])) || Auth::user()->isAdmin()) {
            return $this->actualDecana();
        }

        if (is_null($departament_id)) {
            abort(404, 'El periodo actual debe ser visto solo por el jefe de departamento');
        }

        $plan = Plan::whereNull('periodo_id')
            ->where('departament_id', $departament_id)
            ->first();

        if (!$plan) {
            return redirect()->route('plan.create');
        }

        return $this->show($plan);
    }

    public function actualDecana()
    {
        $plans = Plan::whereNull('periodo_id')->get();

        return view('plan.actual-decana', [
            'planes' => array_map(
                function ($plan) {
                    return [
                        'departament' => $plan->departament->name,
                        'controls' => $plan->controls->count(),
                        'realizados' => Informe::where('departament_id', $plan->departament_id)->where('periodo_id', null)->where('state', 3)->count(),
                        'id' => $plan->id,
                    ];
                },
                $plans->all()
            ),
        ]);
    }

    public function show(Plan $plan)
    {
        $departament_id = $plan->departament_id;

        $informes = Informe::where('departament_id', $departament_id)->where('periodo_id', null)->where('state', 3);

        $stats = [
            'controls' => [
                'total' => $plan->controls->count(),
                'realizados' => $informes->count(),
            ],
            'results' => [
                2 => 0,
                3 => 0,
                4 => 0,
                5 => 0
            ],
            'per_cates' => [
                'cates' => Category::all(),
                'planificados' => [
                    'cates' => [],
                    'total' => 0,
                ],
                'realizados' => [
                    'cates' => [],
                    'total' => 0
                ]
            ]
        ];

        foreach ($plan->controls as $control) {

            $cate = $control->profesor_controlado->category->id;

            if (in_array($cate, array_keys($stats['per_cates']['planificados']['cates']))) {
                $stats['per_cates']['planificados']['cates'][$cate]++;
            } else {
                $stats['per_cates']['planificados']['cates'][$cate] = 1;
            }

            $stats['per_cates']['planificados']['total']++;
        }

        foreach ($informes->get() as $informe) {

            $stats['results'][$informe->evaluation]++;

            $cate = $informe->controlado->category->id;

            if (in_array($cate, array_keys($stats['per_cates']['realizados']['cates']))) {
                $stats['per_cates']['realizados']['cates'][$cate]++;
            } else {
                $stats['per_cates']['realizados']['cates'][$cate] = 1;
            }

            $stats['per_cates']['realizados']['total']++;
        }

        return view('plan.actual', [
            'plan' => $plan,
            'stats' => $stats,
            'controls' => ControlsTable::class,
            'own' => Auth::user()->departament_id === $departament_id && Auth::user()->roles->contains(fn ($value) => in_array($value->role_id, [RoleEnum::JEFE])),
        ]);
    }

    public function create()
    {
        $departament_id = Auth::user()?->departament_id;

        if (is_null($departament_id)) {
            abort(404, 'El periodo actual debe ser visto solo por el jefe de departamento');
        }

        if (Plan::whereNull('periodo_id')->where('departament_id', $departament_id)->first() !== null) {
            return redirect()->route('plan.actual');
        }

        $profesors = User::where('departament_id', $departament_id)
            ->where('super_admin', false)
            ->get();

        $plan = [
            'controls' => [],
        ];

        return view('plan.create', [
            'profesors' => $profesors,
            'plan' => $plan
        ]);
    }

    public function edit(Plan $plan)
    {
        $this->authorize('update', $plan);

        $profesors = User::where('departament_id', $plan->departament_id)
            ->where('super_admin', false)
            ->get();

        $data = [
            'controls' => $plan->controls->map(fn ($control) => [
                'profesor' => $control->controlador,
                'to_profesor' => $control->controlado,
                'semana' => $control->semana,
                'key' => Str::uuid(),
            ]),
            'id' => $plan->id,
        ];

        return view('plan.create', [
            'profesors' => $profesors,
            'plan' => $data,
            'edit' => true
        ]);
    }

    public function add(Request $request)
    {

        $request->validate([
            'controls' => 'required',
            'controls.*.profesor' => ['required', 'integer', 'exists:profesors,id'],
            'controls.*.to_profesor' => ['required', 'integer', 'exists:profesors,id'],
            'controls.*.semana' => ['required', 'integer', 'min:1'],
        ], [
            'controls.*.semana' => 'La semana debe ser mayor o igual a uno',
            'controls.*.profesor' => 'El profesor seleccionado es incorrecto',
            'controls.*.to_profesor' => 'El profesor seleccionado es incorrecto',
        ]);

        $plan = Plan::create([
            'user_id' => Auth::user()->id,
            'departament_id' => Auth::user()->departament_id,
        ]);

        foreach (array_map(
            fn ($control) => [
                'controlador' => $control['profesor'],
                'controlado' => $control['to_profesor'],
                'semana' => $control['semana']
            ],
            $request->controls
        ) as $control) {
            $plan->controls()->create($control);
        }

        Toast::success('Plan de control a clases registrado correctamente')
            ->leftBottom()
            ->autoDismiss(5);

        return redirect()->route('plan.actual');
    }

    public function update(Request $request, Plan $plan)
    {
        $request->validate([
            'controls' => 'required',
            'controls.*.profesor' => ['required', 'integer', 'exists:profesors,id'],
            'controls.*.to_profesor' => ['required', 'integer', 'exists:profesors,id'],
            'controls.*.semana' => ['required', 'integer', 'min:1'],
        ], [
            'controls.*.semana' => 'La semana debe ser mayor o igual a uno',
            'controls.*.profesor' => 'El profesor seleccionado es incorrecto',
            'controls.*.to_profesor' => 'El profesor seleccionado es incorrecto',
        ]);

        $plan->controls()->delete([]);

        foreach (array_map(
            fn ($control) => [
                'controlador' => $control['profesor'],
                'controlado' => $control['to_profesor'],
                'semana' => $control['semana']
            ],
            $request->controls
        ) as $control) {
            $plan->controls()->create($control);
        }

        Toast::success('Plan de control a clases editado correctamente')
            ->leftBottom()
            ->autoDismiss(5);

        return redirect()->route('plan.actual');
    }

    public function delete(Request $request, Plan $plan)
    {
        $this->authorize('delete', [Plan::class, $plan]);

        $plan->delete();

        Toast::success('Plan de control a clases eliminado correctamente')
            ->leftBottom()
            ->autoDismiss(5);

        return redirect()->back();
    }
}
