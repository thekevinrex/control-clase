<?php

namespace App\Tables;

use App\Models\User;
use App\Enum\RoleEnum;
use App\Models\Category;
use App\Models\Departament;
use App\Policies\UserPolicy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use ProtoneMedia\Splade\SpladeTable;
use Spatie\QueryBuilder\QueryBuilder;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\Facades\Toast;
use Spatie\QueryBuilder\AllowedFilter;

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
        $query = QueryBuilder::for(User::class)
            ->where('super_admin', 0)
            ->where('id', '!=', Auth::user()->id)
            ->allowedFilters([
                AllowedFilter::partial('global', 'name'),
                AllowedFilter::exact('category_id', 'category_id', false),
                AllowedFilter::exact('departament_id', 'departament_id', false)
            ]);

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
            ->column('name',  label: __("Nombre"));

        $table->column(
            key: 'departament_id',
            label: __('Departamento'),
            as: fn ($departament_id, User $user) => $user->departament->name ?? '-',
        );

        $table->column(
            key: 'category_id',
            label: __('Categoria docente'),
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
            requirePassword: true,
            after: function () {
                Toast::success(__('Profesores eliminados correctamente.'))
                    ->autoDismiss(5)
                    ->leftBottom();
            }
        );

        $table->selectFilter(
            key: 'category_id',
            label: __('Categoria docente'),
            options: Category::all()->mapWithKeys(fn ($category) => [$category->id => $category->name])->toArray(),
        );

        $table->selectFilter(
            key: 'departament_id',
            label: __('Departamento'),
            options: [
                0 => __('Ninguno'),
                ...Departament::all()->mapWithKeys(fn ($departament) => [$departament->id => $departament->name])->toArray()
            ],
        );

        $table->paginate(10);
    }
}
