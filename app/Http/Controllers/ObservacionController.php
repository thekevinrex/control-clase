<?php

namespace App\Http\Controllers;

use App\Models\Observacion;
use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use ProtoneMedia\Splade\Facades\Toast;

class ObservacionController extends Controller
{

    public function add(Request $request, Plan $plan)
    {

        $request->validate([
            'observacion' => 'required',
        ], [
            '*' => 'Existen campos sin rellenar y/o con datos incorrectos',
        ]);

        if (is_null($plan)) {
            abort(404, 'El plan es requerido');
        }

        $plan->observaciones()->create([
            'user_id' => Auth::user()->id,
            'observacion' => $request->observacion
        ]);

        Toast::success('Observación añadida correctamente')
            ->leftBottom()
            ->autoDismiss(5);

        return redirect()->route('plan.actual');
    }

    public function update(Request $request, Observacion $observacion)
    {

        $request->validate([
            'observacion' => 'required',
        ], [
            '*' => 'Existen campos sin rellenar y/o con datos incorrectos',
        ]);

        $observacion->update([
            'observacion' => $request->observacion
        ]);

        Toast::success('Observación editada correctamente')
            ->leftBottom()
            ->autoDismiss(5);

        return redirect()->back();
    }

    public function delete(Request $request, Observacion $observacion)
    {

        $observacion->delete();

        Toast::success('Observación eliminada correctamente')
            ->leftBottom()
            ->autoDismiss(5);

        return redirect()->back();
    }
}
