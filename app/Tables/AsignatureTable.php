<?php

namespace App\Tables;

use App\Models\Asignature;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\SpladeTable;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\Facades\Toast;

class AsignatureTable extends AbstractTable
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
        return $request->user()->can("viewAny", Asignature::class);
    }

    /**
     * The resource or query builder.
     *
     * @return mixed
     */
    public function for()
    {
        return Asignature::query();
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
            ->withGlobalSearch(columns: ['name'], label: __('Buscar...'))
            ->column('name', label: __('Nombre'))
            ->column('actions', label: __('Acciones'));

        $table->bulkAction(
            label: __('Eliminar asignaturas'),
            each: function (Asignature $asignature) {
                $asignature->delete();
            },
            confirm: true,
            after: function () {
                Toast::success('Asignaturas eliminadas correctamente')
                    ->autoDismiss(5)
                    ->leftBottom();
            }
        );

        $table->paginate(10);
    }
}
