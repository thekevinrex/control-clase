<?php

namespace App\View\Components\Selects;

use App\Models\User;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class Profesor extends Component
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

        $profesors = User::where('super_admin', 0)
            ->get()
            ->map(fn($user) => [$user->id, $user->name]);


        return view('components.selects.profesor')->with(compact('profesors'));
    }
}
