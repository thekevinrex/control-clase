<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfesorRequest;
use App\Models\User;
use App\Tables\ProfesorTable;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use ProtoneMedia\Splade\Facades\Toast;

class ProfesorController extends Controller
{

    public function show()
    {
        return view('profesors.show', [
            'profesors' => ProfesorTable::class
        ]);
    }

    public function create()
    {
        return view('profesors.create', [
            'header' => __('Añadir profesor'),
            'action' => url('/register'),
            'edit' => false,
        ]);
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user);

        $user->role_id = $user->roles->first()->role_id;

        return view('profesors.create', [
            'profesor' => $user,
            'header' => __('Editar profesor') . ': ' . $user->name,
            'action' => route('profesors.update', $user->id),
            'edit' => true,
        ]);
    }

    public function update(UpdateProfesorRequest $request, User $user)
    {
        $this->authorize('update', $user);

        $request->validate([
            'email' => [Rule::unique('profesors')->ignore($user)],
        ], [
            '*' => 'Existen campos sin rellenar y/o con datos incorrectos'
        ]);

        $data = $request->validated();

        $user->fill([
            'name' => $data['name'],
            'email' => $data['email'],
            'category_id' => $data['category_id'],
            'departament_id' => $data['departament_id'],
        ]);

        $userRole = $user->roles()->first();

        $userRole->update([
            'role_id' => $data['role_id'],
        ]);

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        Toast::success('Profesor editado correctamente')
            ->autoDismiss(5)
            ->leftBottom();

        return redirect()->route('profesors.show');
    }

    public function destroy(Request $request, User $user)
    {
        $this->authorize('delete', $user);

        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user->delete();

        Toast::success('Profesor eliminado correctamente')
            ->autoDismiss(5)
            ->leftBottom();

        return redirect()->back();
    }
}
