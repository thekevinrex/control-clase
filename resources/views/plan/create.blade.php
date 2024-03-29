<x-app-layout>
    <x-slot name="header">
        <h1 class="text-2xl md:text-4xl font-bold">
            {{ isset($edit) && $edit ? __('Editar plan de control a clases') : __('Crear plan de control a clases') }}
        </h1>
    </x-slot>

    <div class="py-12">

        <x-splade-form :method="isset($edit) && $edit ? 'patch' : 'post'" :default="$plan"
            action="{{ isset($edit) && $edit ? route('plan.update', $plan['id']) : route('plan.add') }}">

            <PlanCreate :form="form" :profesors="{{ ($profesors) }}" />

            <x-splade-submit class="mt-5">{{ isset($edit) && $edit ? __('Editar plan de control a clases') : __('Crear
                plan de control a clases') }}
            </x-splade-submit>
        </x-splade-form>


    </div>

</x-app-layout>