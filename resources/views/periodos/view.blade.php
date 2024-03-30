<x-app-layout>
    <x-slot name="header">

        <h1 class="text-2xl md:text-4xl font-bold">
            {{ $periodo->name }}
        </h1>

    </x-slot>

    <div class="py-12">

        @if (count($planes) > 0)
        <div class="flex flex-col gap-5">
            @foreach ($planes as $plan)

            <div class="flex flex-col gap-3 pb-5 border-b">
                <h1>
                    <Link href="{{ route('plan.show', $plan['id']) }}" class="text-lg md:text-xl font-bold">
                    {{ __('Plan de control a clases del departamento') . ' - ' . $plan['departament'] }}
                    </Link>
                </h1>

                <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-5">
                    <x-table-resumen :label="__('Controles Planificados')" :cant="$plan['controls']" />
                    <x-table-resumen :label="__('Controles Realizados')" :cant="$plan['realizados']"
                        :total="$plan['controls']" />
                </div>
            </div>

            @endforeach
        </div>
        @else
        <div class="text-center">
            <p class="text-lg">No hay planes</p>
        </div>
        @endif
    </div>

</x-app-layout>