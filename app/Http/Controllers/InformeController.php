<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\User;
use App\Enum\RoleEnum;
use App\Models\Informe;
use App\Models\Notifiaction;
use Illuminate\Http\Request;
use App\Tables\InformesTable;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\InformeRequest;
use ProtoneMedia\Splade\Facades\Toast;

use Barryvdh\DomPDF\Facade\Pdf;


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

        foreach (User::where('departament_id', $user->departament_id)->get() as $profesor) {

            if (!$profesor->roles->contains(fn ($value) => in_array($value->role_id, [RoleEnum::JEFE]))) {
                continue;
            }

            Notifiaction::create([
                'user_id' => $user->id,
                'to_user_id' => $profesor->id,
                'message' => __('El profesor :controlador ha realizado un informe de control a clases al profesor :controlado', [
                    'controlador' => $user->name,
                    'controlado' => $informe->controlado->name,
                ]),
                'type' => 'informe',
                'aditional_id' => $informe->id,
            ]);
        }

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

        Notifiaction::where('aditional_id', $informe->id)
            ->where('type', 'informe')
            ->delete();

        $informe->delete();

        Toast::success('Informe eliminado correctamente')
            ->autoDismiss(5)
            ->leftBottom();

        return redirect()->back();
    }

    public function download(Informe $informe)
    {
        $data = [
            'informe' => $informe,
            'own' => Auth::user()->id == $informe->user_id
        ];

        $titulo = $informe->titulo ?? 'Informe de control a clase';

        $pdf = PDF::loadView('informes.pdf', $data);
        // download PDF file with download method
        return $pdf->download("{$titulo}.pdf");
    }
}
