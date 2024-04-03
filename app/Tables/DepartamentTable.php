<?php

namespace App\Tables;

use App\Models\Asignature;
use App\Models\Departament;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\SpladeTable;
use Spatie\QueryBuilder\QueryBuilder;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\Facades\Toast;
use Spatie\QueryBuilder\AllowedFilter;

class DepartamentTable extends AbstractTable
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
        return $request->user()->can("viewAny", Departament::class);
    }

    /**
     * The resource or query builder.
     *
     * @return mixed
     */
    public function for()
    {
        return QueryBuilder::for(Departament::class)
            ->select('departaments.*')
            ->distinct()
            ->leftJoin('departaments_asignatures', 'departaments_asignatures.departament_id', 'departaments.id')
            ->allowedIncludes('asignature')
            ->allowedFilters([
                AllowedFilter::partial('global', 'departaments.name'),
                AllowedFilter::exact('asignature_id', 'departaments_asignatures.asignature_id', false)
            ]);
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
            ->withGlobalSearch(
                label: __('Buscar por nombre...'),
                columns: ['name']
            )
            ->column('name', label: __("Nombre"))
            ->column(
                key: null,
                label: __('Asignaturas'),
                as: fn ($asignature, $departament) => implode(
                    ', ',
                    $departament->asignature->map(
                        fn ($asignature) => $asignature->name
                    )->toArray()
                )
            )
            ->column('actions', label: 'Acciones');

        $table->bulkAction(
            label: 'Eliminar departamentos',
            each: function (Departament $departament) {
                $departament->delete();
            },
            confirm: true,
            confirmText: __('¿Está seguro de que desea eliminar los departamentos?'),
            after: function () {
                Toast::success('Departamentos eliminados correctamente')
                    ->autoDismiss(5)
                    ->leftBottom();
            }
        );

        $table->selectFilter(
            key: 'asignature_id',
            label: __('Asignatura'),
            options: Asignature::all()->mapWithKeys(fn ($asignature) => [$asignature['id'] => $asignature['name']])->toArray(),

        );

        $table->paginate(10);
    }
}
