<?php

namespace App\Tables;

use App\Models\Asignature;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\SpladeTable;

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
    public function for ()
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
            ->withGlobalSearch(columns: ['name'])
            ->column('name')
            ->column('actions');

        $table->bulkAction(
            label: 'Delete asignatures',
            each: function (Asignature $asignature) {
                $asignature->delete();
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
