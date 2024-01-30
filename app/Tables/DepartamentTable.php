<?php

namespace App\Tables;

use App\Models\Departament;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\SpladeTable;

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
    public function for ()
    {
        return Departament::query();
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
                label: __('Search by name...'),
                columns: ['name']
            )
            ->column('name')
            ->column(
                key: null,
                label: __('Asignatures'),
                as: fn($asignature, $departament) => implode(
                    ', ',
                    $departament->asignature->map(
                        fn($asignature) => $asignature->name
                    )->toArray()
                )
            )
            ->column('actions');

        $table->bulkAction(
            label: 'Delete asignatures',
            each: function (Departament $departament) {
                $departament->delete();
            },
            confirm: true
        );

        // ->searchInput()
        // ->selectFilter()
        // ->withGlobalSearch()

        // ->bulkAction()
        // ->export()
    }
}
