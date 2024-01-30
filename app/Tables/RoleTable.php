<?php

namespace App\Tables;

use App\Enum\RoleEnum;
use App\Models\Role;
use App\Models\User;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\SpladeTable;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

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
    public function for ()
    {
        return QueryBuilder::for(User::class)
            ->join('roles', 'roles.user_id', 'profesors.id')
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
            ->withGlobalSearch()
            ->column('id')
            ->column(
                key: 'role_id',
                label: 'Role',
                as: fn($role_id) => RoleEnum::ROLES[$role_id] ?? 'Undefined',
            )
            ->column(
                key: 'name',
                label: 'Profesor',
            )
            ->column('actions');

        $table->selectFilter('role_id', RoleEnum::ROLES);

        $table->bulkAction(
            label: 'Delete roles',
            each: function (Role $role) {
                $role->delete();
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
