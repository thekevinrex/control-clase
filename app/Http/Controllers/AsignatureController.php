<?php

namespace App\Http\Controllers;

use App\Models\Asignature;
use Illuminate\Http\Request;
use App\Tables\AsignatureTable;
use Illuminate\Validation\Rule;
use ProtoneMedia\Splade\Facades\Toast;

class AsignatureController extends Controller
{

    public function show()
    {
        return view('asignature.show', [
            'asignatures' => AsignatureTable::class
        ]);
    }

    public function create()
    {
        return view('asignature.create', [
            'header' => __('Añadir asignatura'),
            'action' => route('asignature.add'),
        ]);
    }

    public function edit(Asignature $asignature)
    {
        return view('asignature.create', [
            'header' => __('Editar asignatura'),
            'action' => route('asignature.update', $asignature->id),
            'edit' => true,
            'asignature' => $asignature
        ]);
    }

    public function add(Request $request)
    {

        $request->validate([
            'name' => ['alpha', 'required', 'unique:asignatures,name']
        ], [
            '*' => 'Existen campos sin rellenar y/o con datos incorrectos'
        ]);

        $asignature = Asignature::create([
            'name' => $request->name,
        ]);

        Toast::success('Asignatura registrada correctamente')
            ->autoDismiss(5)
            ->leftBottom();

        return redirect()->back();
    }

    public function update(Request $request, Asignature $asignature)
    {

        $request->validate([
            'name' => ['alpha', 'required', Rule::unique(Asignature::class)->ignore($asignature->id)]
        ], [
            '*' => 'Existen campos sin rellenar y/o con datos incorrectos'
        ]);


        $asignature->update([
            'name' => $request->name,
        ]);

        Toast::success('Asignatura editada correctamente')
            ->autoDismiss(5)
            ->leftBottom();

        return redirect()->back();
    }


    public function destroy(Asignature $asignature)
    {
        $asignature->delete();

        Toast::success('Asignatura eliminada correctamente')
            ->autoDismiss(5)
            ->leftBottom();

        return redirect()->back();
    }
}
