<?php

namespace App\Tables;

use App\Models\Periodo;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\SpladeTable;

class PeriodosTable extends AbstractTable
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
        return true;
    }

    /**
     * The resource or query builder.
     *
     * @return mixed
     */
    public function for()
    {
        return Periodo::query();
    }

    /**
     * Configure the given SpladeTable.
     *
     * @param \ProtoneMedia\Splade\SpladeTable $table
     * @return void
     */
    public function configure(SpladeTable $table)
    {
        // $table
        //     ->withGlobalSearch(columns: ['id']);

        $table->column(
            key: 'name',
            label: __('Nombre')
        );

        $table->column(
            key: 'fecha_inicio',
            label: __('Fecha de inicio'),
        );

        $table->column(
            key: 'fecha_fin',
            label: __('Fecha de fin'),
            as: fn ($fecha_fin) => $fecha_fin ? $fecha_fin : __('No finalizado')
        );

        $table->column(
            key: 'semanas',
            label: __('Semanas'),
        );

        $table->column(
            key: 'actions',
            label: __('Acciones'),
        );
    }
}
