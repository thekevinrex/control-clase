<?php

namespace App\View\Components;

use Closure;
use App\Enum\RoleEnum;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Observacion as ModelsObservacion;

class Observacion extends Component
{

    public $own = false;

    /**
     * Create a new component instance.
     */
    public function __construct(public ModelsObservacion $observacion)
    {

        if (Auth::user()->id == $observacion->user_id  || (Auth::user()->roles->contains(fn ($value) => in_array($value->role_id, [RoleEnum::JEFE])) && $observacion->plan->departament_id == Auth::user()->departament_id) || Auth::user()->isAdmin()) {
            $this->own = true;
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.observacion');
    }
}
