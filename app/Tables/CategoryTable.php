<?php

namespace App\Tables;

use App\Models\CategoriesTable;
use App\Models\Category;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\Facades\Toast;
use ProtoneMedia\Splade\SpladeTable;

class CategoryTable extends AbstractTable
{
    /**
     * Create a new instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the user is authorized to perform bulk actions and exports.
     *
     * @return bool
     */
    public function authorize(Request $request)
    {
        return $request->user()->can("viewAny", Category::class);
    }

    /**
     * The resource or query builder.
     *
     * @return mixed
     */
    public function for()
    {
        return Category::query();
    }

    /**
     * Configure the given SpladeTable.
     *
     * @param \ProtoneMedia\Splade\SpladeTable $table
     * @return void
     */
    public function configure(SpladeTable $table)
    {
        $table
            ->withGlobalSearch(columns: ['name'], label: __('Buscar'))
            ->column('name', label: __('Nombre'))
            ->column('actions', label: __('Acciones'));

        $table->bulkAction(
            label: __('Eliminar categorias docentes'),
            each: function (Category $category) {
                $category->delete();
            },
            confirm: true,
            after: function () {
                Toast::success('Categorias docentes elimadas correctamente')
                    ->leftBottom()
                    ->autoDismiss(5);
            }
        );

        $table->paginate(10);
    }
}
