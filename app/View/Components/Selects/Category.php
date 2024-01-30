<?php

namespace App\View\Components\Selects;

use App\Models\Category as ModelCategory;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Category extends Component
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

        return view('components.selects.category', [
            'categories' => ModelCategory::all()->map(fn($category) => [$category->id, $category->name]),
        ]);
    }
}
