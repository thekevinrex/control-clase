<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Tables\CategoryTable;
use Illuminate\Http\Request;
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
            'header' => __('Add category'),
            'action' => route('categories.add'),
        ]);
    }

    public function edit(Category $category)
    {
        return view('categories.create', [
            'header' => __('Edit category'),
            'action' => route('categories.update', $category->id),
            'edit' => true,
            'category' => $category
        ]);
    }

    public function add(Request $request)
    {

        $request->validate([
            'name' => ['string', 'required']
        ]);

        $category = Category::create([
            'name' => $request->name,
        ]);

        Toast::success(__('Category added successfully'))
            ->autoDismiss(5)
            ->leftBottom();

        return redirect()->back();
    }

    public function update(Request $request, Category $category)
    {

        $request->validate([
            'name' => ['string', 'required']
        ]);


        $category->update([
            'name' => $request->name,
        ]);

        Toast::success(__('Category updated successfully'))
            ->autoDismiss(5)
            ->leftBottom();

        return redirect()->back();
    }


    public function destroy(Category $category)
    {
        $category->delete();

        Toast::success(__('Category deleted successfully'))
            ->autoDismiss(5)
            ->leftBottom();

        return redirect()->back();
    }
}
