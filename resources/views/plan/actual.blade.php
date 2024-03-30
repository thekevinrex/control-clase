<x-app-layout>
    <x-slot name="header">

        <h1 class="text-2xl md:text-4xl font-bold">
            {{ $own && is_null($plan->periodo_id) ? __('Plan actual') : __('Plan de control a clases') }}
        </h1>

        @if(!is_null($plan->periodo_id))
        <p>
            {{ __('Periodo') }}: {{ $plan->periodo->name }}
        </p>
        @endif

        @if(isset($plan) && $own && is_null($plan->periodo_id) )
        <div class=" flex flex-row gap-5 flex-wrap">

            <Link href="{{ route('plan.edit', $plan->id) }}">
            <x-splade-button>{{ __('Editar plan actual') }}</x-splade-button>
            </Link>

            <x-splade-form method="delete" :confirm="__('Estas seguro que deseas este plan')"
                :confirm-button="__('Eliminar plan')" :action="route('plan.delete', $plan->id)">
                <x-splade-submit danger :label="__('Eliminar plan actual')" />
            </x-splade-form>

        </div>
        @endif

    </x-slot>


    <div class="py-12">


        @isset($plan)
        @include('plan.show', ['plan' => $plan])

        @include('plan.observaciones', ['plan' => $plan])
        @else
        <div class="bg-white flex items-center justify-center w-full">
            <div class="w-full flex justify-center items-center min-h-[300px] flex-col space-y-10">

                <strong class="text-3xl font-bold max-w-prose">{{ __('No has creado un plan de control a clases')
                    }}</strong>

                <Link href="{{ route('plan.create') }}">
                <x-splade-button>{{ __('Crear plan') }}</x-splade-button>
                </Link>
            </div>
        </div>
        @endif
    </div>

</x-app-layout>