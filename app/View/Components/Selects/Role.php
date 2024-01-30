<?php

namespace App\View\Components\Selects;

use App\Enum\RoleEnum;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class Role extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $roles = [];
        $user = Auth::user();
        $userRoles = $user->roles;

        foreach (RoleEnum::ROLES as $role => $name) {

            if (
                in_array($role, [RoleEnum::ADMIN, RoleEnum::DECANA]) &&
                !$user->isAdmin() && !$userRoles->contains('role_id', RoleEnum::ADMIN)
            ) {
                continue;
            }

            if (
                in_array($role, [RoleEnum::JEFE, RoleEnum::JEFE_ASIGNATURE]) &&
                !$user->isAdmin() && !$userRoles->contains(fn($role) => in_array($role->role_id, [RoleEnum::ADMIN, RoleEnum::DECANA]))
            ) {
                continue;
            }

            $roles[] = [$role, $name];
        }

        return view('components.selects.role')->with(compact('roles'));
    }
}
