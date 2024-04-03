<?php

namespace App\Http\Controllers;

use App\Models\Departament;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Tables\DepartamentTable;
use ProtoneMedia\Splade\Facades\Toast;

class DepartamentController extends Controller
{



    public function show()
    {
        return view('departament.show', [
            'departaments' => DepartamentTable::class
        ]);
    }

    public function create()
    {
        return view('departament.create', [
            'header' => __('Añadir departamento'),
            'action' => route('departament.add'),
        ]);
    }

    public function edit(Departament $departament)
    {

        $departament->asignatures = $departament->asignature->map(
            fn ($asignature) => $asignature->id
        )->toArray();

        return view('departament.create', [
            'header' => __('Editar departamento'),
            'action' => route('departament.update', $departament->id),
            'edit' => true,
            'departament' => $departament
        ]);
    }

    public function add(Request $request)
    {

        $request->validate([
            'name' => ['alpha', 'required', 'unique:departaments,name'],
            'asignatures.*' => ['int', 'required', 'exists:asignatures,id'],
        ], [
            '*' => 'Existen campos sin rellenar y/o con datos incorrectos'
        ]);


        $departament = Departament::create([
            'name' => $request->name,
        ]);

        $departament->asignature()->attach($request->asignatures);

        Toast::success('Departamento registrado correctamente')
            ->autoDismiss(5)
            ->leftBottom();

        return redirect()->back();
    }

    public function update(Request $request, Departament $departament)
    {

        $request->validate([
            'name' => ['alpha', 'required', Rule::unique(Departament::class)->ignore($departament->id)],
            'asignatures.*' => ['int', 'required', 'exists:asignatures,id'],
        ], [
            '*' => 'Existen campos sin rellenar y/o con datos incorrectos'
        ]);

        $departament->update([
            'name' => $request->name,
        ]);

        $departament->asignature()->sync($request->asignatures);

        Toast::success('Departamento editado correctamente')
            ->autoDismiss(5)
            ->leftBottom();

        return redirect()->back();
    }


    public function destroy(Departament $departament)
    {
        $departament->delete();


        Toast::success('Departamento eliminado correctamente')
            ->autoDismiss(5)
            ->leftBottom();

        return redirect()->back();
    }
}
