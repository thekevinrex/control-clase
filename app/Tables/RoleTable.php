<?php

namespace App\Tables;

use App\Models\Role;
use App\Models\User;
use App\Enum\RoleEnum;

use Illuminate\Http\Request;
use ProtoneMedia\Splade\SpladeTable;
use Spatie\QueryBuilder\QueryBuilder;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\Facades\Toast;
use Spatie\QueryBuilder\AllowedFilter;
use Illuminate\Database\Eloquent\Builder;

class RoleTable extends AbstractTable
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
        return $request->user()->can("viewAny", Role::class);
    }

    /**
     * The resource or query builder.
     *
     * @return mixed
     */
    public function for()
    {
        return QueryBuilder::for(Role::class)
            ->distinct()
            ->select('roles.*', 'profesors.name')
            ->join('profesors', 'roles.user_id', 'profesors.id')
            ->allowedFields(['roles.id', 'roles.user_id', 'roles.role_id'])
            ->allowedFilters([
                AllowedFilter::partial('global', 'profesors.name'),
                AllowedFilter::exact('role_id', 'roles.role_id', false)
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
                label: __('Buscar'),
            )
            ->column(
                key: 'role_id',
                label: 'Role',
                as: fn ($role_id) => RoleEnum::ROLES[$role_id] ?? 'Undefined',
            )
            ->column(
                key: 'name',
                label: __('Profesor'),
            )
            ->column('actions', label: __('Acciones'));

        $table->selectFilter('role_id', RoleEnum::ROLES, label: __('Rol'));

        $table->bulkAction(
            label: __('Eliminar roles'),
            each: function (Role $role) {
                $role->delete();
            },
            confirm: true,
            after: function () {
                Toast::success('Roles eliminados correctamente.')
                    ->autoDismiss(5)
                    ->leftBottom();
            }
        );

        $table->paginate(10);
    }
}
