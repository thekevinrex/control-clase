<?php

namespace App\Tables;

use App\Enum\ClassTypeEnum;
use App\Enum\RoleEnum;
use App\Models\Asignature;
use App\Models\Departament;
use App\Models\Informe;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use ProtoneMedia\Splade\SpladeTable;
use Spatie\QueryBuilder\QueryBuilder;
use ProtoneMedia\Splade\AbstractTable;
use Spatie\QueryBuilder\AllowedFilter;

class InformesTable extends AbstractTable
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
                        ->orWhere('p2.name', 'ILIKE', "%{$value}%");
                });
            });
        });

        $query = QueryBuilder::for(Informe::class)
            ->select('informes.*')
            ->join('profesors as p1', 'informes.user_id', 'p1.id')
            ->join('profesors as p2', 'informes.to_user_id', 'p2.id')
            ->allowedFilters([
                $globalSearch,
                AllowedFilter::exact('asignature_id', 'asignature_id', false),
                AllowedFilter::exact('tipo_clase', 'tipo_clase', false),
                AllowedFilter::exact('evaluation', 'evaluation', false),
                AllowedFilter::exact('departament_id', 'departament_id', false),
            ]);

        if (
            $this->request->user()->isAdmin() ||
            $this->request->user()->roles->contains(fn ($value) => in_array($value->role_id, [RoleEnum::ADMIN, RoleEnum::DECANA]))
        ) {
            return $query;
        }

        $query->where('informes.departament_id', $this->request->user()->departament_id);

        if (!$this->request->user()->roles->contains(fn ($value) => in_array($value->role_id, [RoleEnum::JEFE]))) {
            $id = $this->request->user()->id;

            $query->where(function ($query) use ($id) {
                $query->where('user_id', $id)
                    ->orWhere('to_user_id', $id);
            });
        }

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

        $table->withGlobalSearch(label: __('Buscar...'), columns: ['user_id', 'to_user_id']);

        $table->column(
            key: 'periodo_id',
            label: __('Periodo'),
            as: fn ($periodo_id, Informe $informe) => is_null($periodo_id) ? __('Actual') : $periodo_id,
        );

        if (
            $this->request->user()->isAdmin() ||
            $this->request->user()->roles->contains(fn ($value) => in_array($value->role_id, [RoleEnum::ADMIN, RoleEnum::DECANA]))
        ) {
            $table->column(
                key: 'departament_id',
                label: __('Departamento'),
                as: fn ($departament_id, Informe $informe) => $informe->departamento->name
            );

            $table->selectFilter(
                key: 'departament_id',
                label: __('Departamento'),
                options: Departament::all()->mapWithKeys(fn ($departament) => [$departament->id => $departament->name])->toArray(),
            );
        }

        $table->column(
            key: 'user_id',
            label: __('Profesor controlador'),
            as: fn ($user_id, Informe $informe) => $informe->controlador->name,
        );

        $table->column(
            key: 'to_user_id',
            label: __('Profesor controlado'),
            as: fn ($to_user_id, Informe $informe) => $informe->controlado->name,
        );

        $table->column(
            key: 'evaluation',
            label: __('Evaluación')
        );

        $table->column(
            key: 'created_at',
            label: __('Creado el'),
        );

        $table->column(
            key: 'actions',
            label: __('Acciones'),
        );

        $table->selectFilter(
            key: 'asignature_id',
            label: __('Asignatura'),
            options: Asignature::all()->mapWithKeys(fn ($asignature) => [$asignature->id => $asignature->name])->toArray(),
        );

        $table->selectFilter(
            key: 'tipo_clase',
            label: __('Tipo Clase'),
            options: ClassTypeEnum::TYPES,
        );

        $table->selectFilter(
            key: 'evaluation',
            label: __('Evaluación'),
            options: [2 => 2, 3 => 3, 4 => 4, 5 => 5],
        );

        $table->paginate(10);
    }
}
