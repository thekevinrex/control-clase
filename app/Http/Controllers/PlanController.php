<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Plan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use ProtoneMedia\Splade\Facades\Toast;

class PlanController extends Controller
{

    public function actual()
    {
        $this->authorize('actual', Plan::class);

        $departament_id = Auth::user()?->departament_id;

        if (is_null($departament_id)) {
            abort(404, 'El periodo actual debe ser visto solo por el jefe de departamento');
        }

        $plan = Plan::whereNull('periodo_id')
            ->where('departament_id', $departament_id)
            ->first();

        return view('plan.actual', [
            'plan' => $plan,
        ]);
    }

    public function create()
    {
        $departament_id = Auth::user()?->departament_id;

        if (is_null($departament_id)) {
            abort(404, 'El periodo actual debe ser visto solo por el jefe de departamento');
        }

        $profesors = User::where('departament_id', $departament_id)
            ->where('super_admin', false)
            ->get();

        $categories = Category::all();

        $plan = [
            'categories' => $categories->mapWithKeys(fn($category) => [$category->id => ['total' => 0, 'id' => $category->id]]),
            'profesors' => [],
        ];

        return view('plan.create', [
            'categories' => $categories,
            'profesors' => $profesors,
            'plan' => $plan
        ]);
    }

    public function edit(Plan $plan)
    {
        $this->authorize('update', $plan);

        $profesors = User::where('departament_id', $plan->departament_id)
            ->where('super_admin', false)
            ->get();

        $categories = Category::all();

        $plan = [
            'categories' => $plan->categories->mapWithKeys(
                fn($category) => [$category->id => ['total' => $category->pivot->total, 'id' => $category->id]]
            ),
            'profesors' => $plan->profesors->map(fn($profesor) => [
                'profesor' => $profesor->id,
                'semana' => $profesor->pivot->semana,
                'key' => Str::uuid(),
            ]),
            'id' => $plan->id,
        ];

        return view('plan.create', [
            'categories' => $categories,
            'profesors' => $profesors,
            'plan' => $plan,
            'edit' => true
        ]);
    }

    public function add(Request $request)
    {

        $request->validate([
            'profesors' => 'required',
            'profesors.*.profesor' => ['required', 'integer', 'exists:profesors,id'],
            'profesors.*.semana' => ['required', 'integer', 'min:1'],

            'categories.*.id' => ['required', 'integer', 'exists:categories,id'],
            'categories.*.total' => ['required', 'numeric', 'min:0']
        ], [
            'profesors.*.semana' => 'La semana debe ser mayor o igual a uno',
            'profesors.*.profesor' => 'El profesor seleccionado es incorrecto',
            'categories.*.total' => 'La cantidad de controles por categoria debe ser mayor a 1',
        ]);

        $plan = Plan::create([
            'user_id' => Auth::user()->id,
            'departament_id' => Auth::user()->departament_id,
        ]);

        $plan->profesors()->attach(
            array_map(
                fn($profesor) => [
                    'user_id' => $profesor['profesor'],
                    'semana' => $profesor['semana']
                ],
                $request->profesors
            )
        );

        $plan->categories()->attach(
            array_map(
                fn($category) => [
                    'category_id' => $category['id'],
                    'total' => $category['total'],
                ],
                $request->categories
            )
        );

        Toast::success('Plan created successfully')
            ->leftBottom()
            ->autoDismiss(5);

        return redirect()->route('plan.actual');
    }

    public function update(Request $request, Plan $plan)
    {
        $request->validate([
            'profesors' => 'required',
            'profesors.*.profesor' => ['required', 'integer', 'exists:profesors,id'],
            'profesors.*.semana' => ['required', 'integer', 'min:1'],

            'categories.*.id' => ['required', 'integer', 'exists:categories,id'],
            'categories.*.total' => ['required', 'numeric', 'min:0']
        ], [
            'profesors.*.semana' => 'La semana debe ser mayor o igual a uno',
            'profesors.*.profesor' => 'El profesor seleccionado es incorrecto',
            'categories.*.total' => 'La cantidad de controles por categoria debe ser mayor a 1',
        ]);

        $plan->profesors()->sync(
            array_map(
                fn($profesor) => [
                    'user_id' => $profesor['profesor'],
                    'semana' => $profesor['semana']
                ],
                $request->profesors
            )
        );

        $plan->categories()->sync(
            array_map(
                fn($category) => [
                    'category_id' => $category['id'],
                    'total' => $category['total'],
                ],
                $request->categories
            )
        );

        Toast::success('Plan updated successfully')
            ->leftBottom()
            ->autoDismiss(5);

        return redirect()->route('plan.actual');
    }

    public function delete(Request $request, Plan $plan)
    {
        $this->authorize('delete', [Plan::class, $plan]);

        $plan->delete();

        Toast::success('Plan deleted successfully')
            ->leftBottom()
            ->autoDismiss(5);

        return redirect()->back();
    }
}
