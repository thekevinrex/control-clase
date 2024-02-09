<?php

namespace App\Http\Controllers;

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
            'observacion' => 'La observación es requerida',
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
}
