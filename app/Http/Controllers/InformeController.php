<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\User;
use App\Models\Informe;
use Illuminate\Http\Request;
use App\Tables\InformesTable;
use App\Http\Requests\InformeRequest;
use Illuminate\Support\Facades\Auth;
use ProtoneMedia\Splade\Facades\Toast;

class InformeController extends Controller
{

    public function show()
    {
        return view('informes.show', [
            'informes' => InformesTable::class
        ]);
    }

    public function view(Informe $informe)
    {
        return view('informes.view', [
            'informe' => $informe,
            'own' => Auth::user()->id == $informe->user_id
        ]);
    }

    public function create(Request $request)
    {
        $user = $request->user();
        $departament_id = $user->departament_id;

        $plan = Plan::where('periodo_id', null)
            ->where('departament_id', $departament_id)
            ->first();

        $profesors = $plan->controls()
            ->where('controlador', $user->id)
            ->get()
            ->mapWithKeys(fn ($control) => [$control->controlado => $control->profesor_controlado->name]);


        $asignatures = $user->departament->asignature;

        return view('informes.create')
            ->with(
                compact('profesors', 'asignatures')
            );
    }

    public function edit(Request $request, Informe $informe)
    {
        $user = $request->user();
        $departament_id = $user->departament_id;

        $plan = Plan::where('periodo_id', null)
            ->where('departament_id', $departament_id)
            ->first();

        $profesors = $plan->controls()
            ->where('controlador', $user->id)
            ->get()
            ->mapWithKeys(fn ($control) => [$control->controlado => $control->profesor_controlado->name]);


        $asignatures = $user->departament->asignature;

        return view('informes.edit')
            ->with(
                compact('profesors', 'asignatures', 'informe')
            );
    }

    public function add(InformeRequest $request)
    {
        $user = $request->user();

        $validated = $request->validated();

        $data = [
            'periodo_id' => null,
            'departament_id' => $user->departament_id,

            'user_id' => $user->id,
            'to_user_id' => $validated['to_user_id'],

            'asignature_id' => $validated['asignature_id'],

            'titulo' => $validated['titulo'],
            'grupo' => $validated['grupo'],
            'tipo_clase' => $validated['tipo_clase'],

            'logros' => $validated['logros'],
            'deficiencias' => $validated['deficiencias'],
            'recomendaciones' => $validated['recomendaciones'],
            'evaluation' => $validated['evaluation'],

            'state' => 3,
        ];

        $informe = Informe::create($data);

        Toast::success('Informe registrado correctamente')
            ->autoDismiss(5)
            ->leftBottom();

        return redirect()->route('informe.show');
    }

    public function update(InformeRequest $request, Informe $informe)
    {
        $user = $request->user();

        $validated = $request->validated();

        $data = [
            'to_user_id' => $validated['to_user_id'],

            'asignature_id' => $validated['asignature_id'],

            'titulo' => $validated['titulo'],
            'grupo' => $validated['grupo'],
            'tipo_clase' => $validated['tipo_clase'],

            'logros' => $validated['logros'],
            'deficiencias' => $validated['deficiencias'],
            'recomendaciones' => $validated['recomendaciones'],
            'evaluation' => $validated['evaluation'],
        ];

        $informe->update($data);

        Toast::success('Informe editado correctamente')
            ->autoDismiss(5)
            ->leftBottom();

        return redirect()->route('informe.show');
    }

    public function delete(Informe $informe)
    {
        $informe->delete();

        Toast::success('Informe eliminado correctamente')
            ->autoDismiss(5)
            ->leftBottom();

        return redirect()->back();
    }
}
