<?php

namespace App\View\Components\Selects;

use App\Models\Asignature;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class asignatures extends Component
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

        $asignatures = Asignature::all()->map(fn($asignature) => [$asignature->id, $asignature->name]);

        return view('components.selects.asignatures', [
            'asignatures' => $asignatures,
        ]);
    }
}
