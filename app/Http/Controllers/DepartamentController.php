<?php

namespace App\Http\Controllers;

use App\Models\Departament;
use Illuminate\Http\Request;
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
            'name' => ['string', 'required'],
            'asignatures.*' => ['int', 'required', 'exists:asignatures,id'],
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
            'name' => ['string', 'required'],
            'asignatures.*' => ['int', 'required', 'exists:asignatures,id'],
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
