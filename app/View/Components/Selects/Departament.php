<?php

namespace App\View\Components\Selects;

use App\Enum\RoleEnum;
use App\Models\Departament as ModelDepartament;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class Departament extends Component
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

        $departaments = [];

        $user = Auth::user();
        $userRoles = $user->roles;

        $query = ModelDepartament::query();

        if (!$userRoles->contains(fn($role) => in_array($role->role_id, [RoleEnum::ADMIN, RoleEnum::DECANA])) && !$user->isAdmin()) {
            $query->where('id', $user->departament_id);
        }

        foreach ($query->get() as $departament) {
            $departaments[] = [$departament->id, $departament->name];
        }

        return view('components.selects.departament')->with(compact('departaments'));
    }
}
