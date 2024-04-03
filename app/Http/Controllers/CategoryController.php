<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Tables\CategoryTable;
use Illuminate\Validation\Rule;
use ProtoneMedia\Splade\Facades\Toast;

class CategoryController extends Controller
{


    public function show()
    {
        return view('categories.show', [
            'categories' => CategoryTable::class
        ]);
    }

    public function create()
    {
        return view('categories.create', [
            'header' => __('Añadir categoria docente'),
            'action' => route('categories.add'),
        ]);
    }

    public function edit(Category $category)
    {
        return view('categories.create', [
            'header' => __('Editar categoria docente'),
            'action' => route('categories.update', $category->id),
            'edit' => true,
            'category' => $category
        ]);
    }

    public function add(Request $request)
    {

        $request->validate([
            'name' => ['alpha', 'required', 'unique:categories,name']
        ], [
            '*' => 'Existen campos sin rellenar y/o con datos incorrectos'
        ]);

        $category = Category::create([
            'name' => $request->name,
        ]);

        Toast::success(__('Categoria docente registrada correctamente'))
            ->autoDismiss(5)
            ->leftBottom();

        return redirect()->back();
    }

    public function update(Request $request, Category $category)
    {

        $request->validate([
            'name' => ['alpha', 'required', Rule::unique(Category::class)->ignore($category->id)]
        ], [
            '*' => 'Existen campos sin rellenar y/o con datos incorrectos'
        ]);


        $category->update([
            'name' => $request->name,
        ]);

        Toast::success(__('Categoria docente editada correctamente'))
            ->autoDismiss(5)
            ->leftBottom();

        return redirect()->back();
    }


    public function destroy(Category $category)
    {
        $category->delete();

        Toast::success(__('Categoria docente eliminada correctamente'))
            ->autoDismiss(5)
            ->leftBottom();

        return redirect()->back();
    }
}
