<?php

namespace App\Tables;

use App\Enum\RoleEnum;
use App\Models\User;
use App\Policies\UserPolicy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\SpladeTable;

class ProfesorTable extends AbstractTable
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
        return $request->user()->can('viewAny', 'App\Models\User');
    }

    /**
     * The resource or query builder.
     *
     * @return mixed
     */
    public function for()
    {
        $query = User::query()
            ->where('super_admin', false)
            ->where('id', '!=', Auth::user()->id);

        if (
            $this->request->user()->isAdmin() ||
            $this->request->user()->roles->contains(fn ($value) => in_array($value->role_id, [RoleEnum::ADMIN, RoleEnum::DECANA]))
        ) {
            return $query;
        }

        $query->where('departament_id', $this->request->user()->departament_id);

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
            ->withGlobalSearch(columns: ['name', 'email'], label: __('Buscar...'))
            ->column('name',  label: "Nombre");

        $table->column(
            key: 'departament_id',
            label: __('Departamento'),
            as: fn ($departament_id, User $user) => $user->departament->name ?? '-',
        );

        $table->column(
            key: 'category_id',
            label: __('Categoria'),
            as: fn ($category_id, User $user) => $user->category->name ?? '-',
        );

        $table->column(
            key: 'actions',
            label: __('Acciones'),
        );

        $table->bulkAction(
            label: __('Eliminar profesores'),
            each: function (User $user) {
                if ($this->request->user()->can('delete', $user)) {
                    $user->delete();
                }
            },
            confirm: true,
            requirePassword: true
        );

        $table->paginate(10);
    }
}
