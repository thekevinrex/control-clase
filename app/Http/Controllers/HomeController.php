<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Enum\RoleEnum;
use App\Models\Informe;
use App\Models\Periodo;
use App\Models\PlanControl;
use Illuminate\Http\Request;
use App\Services\NavigationService;

class HomeController extends Controller
{

    public function dashboard()
    {

        $user = auth()->user();

        if ($user->roles->contains(fn ($value) => in_array($value->role_id, [
            RoleEnum::ADMIN,
            RoleEnum::DECANA,
        ]))) {
            return $this->decanaDashboard($user);
        }

        if ($user->roles->contains(fn ($value) => in_array($value->role_id, [
            RoleEnum::JEFE,
        ])) && $user->departament) {
            return $this->jefeDashboard($user);
        }

        $role = 'profesor';

        $next = null;

        if (!is_null($user->departament_id) && $to_control = PlanControl::where('controlador', $user->id)->get()) {
            if ($to_control->count() > 0) {
                foreach ($to_control as $control) {
                    if (is_null($control->plan->periodo_id) && !Informe::where('user_id', $control->controlador)
                        ->where('to_user_id', $control->controlado)
                        ->whereNull('periodo_id')->exists()) {
                        $next = $control;
                        break;
                    }
                }
            }
        }

        return view('dashboard')->with(compact('role', 'next'));
    }

    public function decanaDashboard($user)
    {

        $role = 'decana';

        if ($user->roles->contains(fn ($value) => in_array($value->role_id, [
            RoleEnum::ADMIN,
        ]))) {
            $role = 'admin';
        }

        // actual
        $periodo = Periodo::whereNull('fecha_fin')->first();
        $controles = 0;
        $informes = 0;

        $planes = Plan::whereNull('periodo_id')->get();
        $controles = $planes->map(
            fn ($plan) => $plan->controls->count()
        )->sum();
        $informes = Informe::whereNull('periodo_id')->count();

        $next = null;

        if (!is_null($user->departament_id) && $to_control = PlanControl::where('controlador', $user->id)->get()) {
            if ($to_control->count() > 0) {
                foreach ($to_control as $control) {
                    if (is_null($control->plan->periodo_id) && !Informe::where('user_id', $control->controlador)
                        ->where('to_user_id', $control->controlado)
                        ->whereNull('periodo_id')->exists()) {
                        $next = $control;
                        break;
                    }
                }
            }
        }

        // Chart
        $stats = Periodo::all()->map(
            function ($periodo) {
                return [
                    'periodo' => $periodo->name,
                    'planes' => $periodo->planes->count(),

                    'controles' => $periodo->planes->map(
                        fn ($plan) => $plan->controls->count()
                    )->sum(),

                    'informes' => $periodo->informes->count(),
                ];
            }
        );

        $chartData = [
            'labels' => $stats->pluck('periodo'),
            'datasets' => [
                [
                    'label' => 'Planes',
                    'data' => $stats->pluck('planes'),
                    'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                ],
                [
                    'label' => 'Controles',
                    'data' => $stats->pluck('controles'),
                    'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                ],
                [
                    'label' => 'Informes',
                    'data' => $stats->pluck('informes'),
                    'backgroundColor' => 'rgba(255, 206, 86, 0.2)',
                ],
            ]
        ];


        return view('dashboard', compact('periodo', 'planes', 'chartData', 'controles', 'informes', 'role', 'next'));
    }

    public function jefeDashboard($user)
    {

        $departament_id = $user->departament_id;
        $role = 'jefe';

        // Chart
        $stats = Periodo::all()->map(
            function ($periodo) use ($departament_id) {
                return [
                    'periodo' => $periodo->name,
                    'controles' => $periodo->planes()->where('departament_id', $departament_id)->get()->map(
                        fn ($plan) => $plan->controls->count()
                    )->sum(),
                    'informes' => $periodo->informes()->where('departament_id', $departament_id)->count(),
                ];
            }
        );

        $chartData = [
            'labels' => $stats->pluck('periodo'),
            'datasets' => [
                [
                    'label' => 'Controles',
                    'data' => $stats->pluck('controles'),
                    'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                ],
                [
                    'label' => 'Informes',
                    'data' => $stats->pluck('informes'),
                    'backgroundColor' => 'rgba(255, 206, 86, 0.2)',
                ],
            ]
        ];

        $plan = Plan::whereNull('periodo_id')->where('departament_id', $departament_id)->first();

        $controles = $plan->controls->count();
        $informes = Informe::whereNull('periodo_id')->where('departament_id', $departament_id)->count();

        $next = null;

        if (!is_null($user->departament_id) && $to_control = PlanControl::where('controlador', $user->id)->get()) {
            if ($to_control->count() > 0) {
                foreach ($to_control as $control) {
                    if (is_null($control->plan->periodo_id) && !Informe::where('user_id', $control->controlador)
                        ->where('to_user_id', $control->controlado)
                        ->whereNull('periodo_id')->exists()) {
                        $next = $control;
                        break;
                    }
                }
            }
        }

        return view('dashboard', compact('chartData', 'controles', 'informes', 'role', 'next', 'plan'));
    }

    public function Navigation()
    {
        $navigationMap = (new NavigationService)->getNavigaitonMap();

        return view('sitemap', compact("navigationMap"));
    }
}
