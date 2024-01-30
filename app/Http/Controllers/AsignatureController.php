<?php

namespace App\Http\Controllers;

use App\Models\Asignature;
use App\Tables\AsignatureTable;
use Illuminate\Http\Request;

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
            'header' => __('Add asignature'),
            'action' => route('asignature.add'),
        ]);
    }

    public function edit(Asignature $asignature)
    {
        return view('asignature.create', [
            'header' => __('Edit asignature'),
            'action' => route('asignature.update', $asignature->id),
            'edit' => true,
            'asignature' => $asignature
        ]);
    }

    public function add(Request $request)
    {

        $request->validate([
            'name' => ['string', 'required']
        ]);

        $asignature = Asignature::create([
            'name' => $request->name,
        ]);

        return redirect()->back();
    }

    public function update(Request $request, Asignature $asignature)
    {

        $request->validate([
            'name' => ['string', 'required']
        ]);


        $asignature->update([
            'name' => $request->name,
        ]);

        return redirect()->back();
    }


    public function destroy(Asignature $asignature)
    {
        $asignature->delete();

        return redirect()->back();
    }
}
