<?php

namespace App\Http\Controllers;

use App\Models\Departament;
use App\Tables\DepartamentTable;
use Illuminate\Http\Request;

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
            'header' => __('Add departament'),
            'action' => route('departament.add'),
        ]);
    }

    public function edit(Departament $departament)
    {

        $departament->asignatures = $departament->asignature->map(
            fn($asignature) => $asignature->id
        )->toArray();

        return view('departament.create', [
            'header' => __('Edit departament'),
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

        return redirect()->back();
    }


    public function destroy(Departament $departament)
    {
        $departament->delete();

        return redirect()->back();
    }

}
