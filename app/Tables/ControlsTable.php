<?php

namespace App\Tables;

use App\Enum\RoleEnum;
use App\Models\Informe;
use App\Models\Plan;
use App\Models\PlanControl;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use ProtoneMedia\Splade\SpladeTable;
use Spatie\QueryBuilder\QueryBuilder;
use ProtoneMedia\Splade\AbstractTable;
use Spatie\QueryBuilder\AllowedFilter;

class ControlsTable extends AbstractTable
{
    /**
     * Create a new instance.
     *
     * @return void
     */
    public function __construct(protected Request $request)
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
        $globalSearch = AllowedFilter::callback('global', function ($query, $value) {
            $query->where(function ($query) use ($value) {
                Collection::wrap($value)->each(function ($value) use ($query) {
                    $query
                        ->orWhere('p1.name', 'ILIKE', "%{$value}%")
                        ->orWhere('p2.name', 'ILIKE', "%{$value}%")
                        ->orWhere('plan_controls.semana', 'ILIKE', "%{$value}%");
                });
            });
        });

        $query = QueryBuilder::for(PlanControl::class)
            ->select('plan_controls.*')
            ->join('profesors as p1', 'plan_controls.controlador', 'p1.id')
            ->join('profesors as p2', 'plan_controls.controlado', 'p2.id')
            ->allowedFilters([
                $globalSearch,
            ]);


        if ($this->request->routeIs('plan.show')) {
            $query->where('plan_id', $this->request->route('plan')->id);
        } else {
            $plan = Plan::where('periodo_id', null)
                ->where('departament_id', $this->request->user()->departament_id)
                ->first();

            $query->where('plan_id', $plan->id);
        }

        $query->orderBy('controlador', 'asc')
            ->orderBy('controlado', 'asc')
            ->orderBy('semana', 'asc');

        return $query;
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
            ->withGlobalSearch(label: __('Buscar...'));


        $table->column(
            key: 'controlador',
            label: __("Profesor Controlador"),
            as: fn ($row, $control) => $control->profesor_controlador->name
        );

        $table->column(
            key: 'controlado',
            label: __("Profesor Controlado"),
            as: fn ($row, $control) => $control->profesor_controlado->name
        );

        $table->column(
            key: 'semana',
            label: __('Semana')
        );

        $done = [];

        $table->column(
            label: __('Evaluación'),
            as: function ($row, $control) use (&$done) {

                $informe = Informe::where('departament_id', $this->request->user()->departament_id)
                    ->where('state', 3)->where('user_id', $control->controlador)
                    ->whereNotIn('id', $done)
                    ->where('to_user_id', $control->controlado)
                    ->first();


                if ($informe && !in_array($informe->id, $done)) {
                    $done[] = $informe->id;
                    return $informe->evaluation;
                } else {
                    return __('Pendiente');
                }
            }
        );

        // ->searchInput()
        // ->selectFilter()
        // ->withGlobalSearch()

        // ->bulkAction()
        // ->export()
    }
}
