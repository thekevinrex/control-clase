<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Enum\RoleEnum;
use App\Models\Informe;
use App\Models\Periodo;
use Illuminate\Http\Request;
use App\Tables\PeriodosTable;
use ProtoneMedia\Splade\Facades\Toast;

class PeriodosController extends Controller
{


    public function show()
    {

        $periodo = Periodo::whereNull('fecha_fin')->first();

        $admin = auth()->user()->isAdmin() || auth()->user()->roles->contains(fn ($value) => in_array($value->role_id, [
            RoleEnum::ADMIN,
        ]));

        return view('periodos.show', [
            'periodo' => $periodo,
            'admin' => $admin,
            'periodos' => PeriodosTable::class
        ]);
    }

    public function view(Periodo $periodo)
    {

        $admin = auth()->user()->isAdmin() || auth()->user()->roles->contains(fn ($value) => in_array($value->role_id, [
            RoleEnum::ADMIN,
        ]));

        $planes = $periodo->planes();

        if (auth()->user()->roles->contains(fn ($value) => in_array($value->role_id, [
            RoleEnum::JEFE,
        ]))) {
            $planes->where('departament_id', auth()->user()->departament_id);
        }

        return view('periodos.view', [
            'periodo' => $periodo,
            'admin' => $admin,
            'planes' => $planes->get()->map(fn ($plan) => [
                'departament' => $plan->departament->name,
                'controls' => $plan->controls->count(),
                'realizados' => Informe::where('departament_id', $plan->departament_id)->where('periodo_id', $plan->periodo_id)->where('state', 3)->count(),
                'id' => $plan->id,
            ]),
        ]);
    }

    public function create(Request $request)
    {

        $periodo = Periodo::create([
            'name' => 'Periodo - ' . now()->format('Y'),
            'fecha_inicio' => now(),
            'fecha_fin' => null,
            'semanas' => 11
        ]);

        Toast::success(__('Periodo iniciado correctamente'))
            ->autoDismiss(5)
            ->leftBottom();

        return redirect()->back();
    }

    public function archivar(Request $request)
    {
        $periodo = Periodo::whereNull('fecha_fin')->first();

        $periodo->fecha_fin = now();
        $periodo->save();

        Plan::whereNull('periodo_id')
            ->update(['periodo_id' => $periodo->id]);

        foreach (Informe::whereNull('periodo_id')->cursor() as $informe) {

            $informe->periodo_id = $periodo->id;

            $informe->departament_name = $informe->departamento->name;
            $informe->asignature_name = $informe->asignatura->name;

            $informe->save();
        }

        Toast::success(__('Periodo archivado correctamente'))
            ->autoDismiss(5)
            ->leftBottom();

        return redirect()->back();
    }

    public function delete(Request $request, Periodo $periodo)
    {

        $periodo->delete();

        Toast::success(__('Periodo eliminado correctamente'))
            ->autoDismiss(5)
            ->leftBottom();

        return redirect()->back();
    }
}
