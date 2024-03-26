<?php

namespace App\Http\Controllers;

use App\Enum\RoleEnum;
use App\Models\Role;
use App\Tables\RoleTable;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use ProtoneMedia\Splade\Facades\Toast;

class RoleController extends Controller
{

    public function show()
    {
        return view('roles.show', [
            'roles' => RoleTable::class
        ]);
    }

    public function create()
    {
        return view('roles.create', [
            'header' => __('Añadir rol'),
            'action' => route('role.add'),
        ]);
    }

    public function edit(Role $role)
    {
        return view('roles.create', [
            'header' => __('Editar rol'),
            'action' => route('role.update', $role->id),
            'edit' => true,
            'role' => $role
        ]);
    }

    public function add(Request $request)
    {

        $request->validate([
            'user_id' => ['int', 'required', 'exists:profesors,id'],
            'role_id' => ['int', 'required', Rule::in(array_keys(RoleEnum::ROLES))]
        ]);

        $role = Role::create([
            'user_id' => $request->user_id,
            'role_id' => $request->role_id,
        ]);

        Toast::success(__('Rol registrado correctamente'))
            ->autoDismiss(5)
            ->leftBottom();

        return redirect()->back();
    }

    public function update(Request $request, Role $role)
    {

        $request->validate([
            'user_id' => ['int', 'required', 'exists:profesors,id'],
            'role_id' => ['int', 'required', Rule::in(array_keys(RoleEnum::ROLES))]
        ]);

        $role->update([
            'user_id' => $request->user_id,
            'role_id' => $request->role_id,
        ]);

        Toast::success(__('Rol editado correctamente'))
            ->autoDismiss(5)
            ->leftBottom();

        return redirect()->back();
    }


    public function destroy(Role $role)
    {
        $this->authorize('delete', $role);

        $role->delete();

        Toast::success(__('Rol eliminado correctamente'))
            ->autoDismiss(5)
            ->leftBottom();

        return redirect()->back();
    }
}
