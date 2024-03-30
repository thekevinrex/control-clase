<x-app-layout>
    <x-slot name="header">
        <h1 class="text-2xl md:text-4xl font-bold">
            {{ __('Dashboard') }}
        </h1>
    </x-slot>

    <div class="py-12 pt-8">
        <div class="max-w-7xl flex flex-col gap-y-5">

            {{-- Informacion usuario --}}

            <x-user-info />

            {{-- Estado del periodo --}}
            @if (in_array($role, ['admin']))
            <x-periodo :periodo="$periodo" />
            @endif

            {{-- Controles a realizar --}}

            @if(isset($next) && !is_null($next))
            <div
                class="flex flex-col py-4 border border-cyan-500 max-w-prose rounded-md p-5 shadow-md bg-cyan-200 gap-y-3">
                <h1 class="text-xl font-semibold">
                    {{ __('Tienes un control planificado') }}
                </h1>

                <p>
                    {{ __('El control está programado para la semana') }}
                    <span class="font-bold">{{ $next->semana }}</span>
                </p>

                <p>
                    {{ __('Tienes que controlar al profesor ')}}
                    <span class="font-bold">{{ $next->profesor_controlado->name }}</span>
                </p>
            </div>
            @endif

            {{--
            Resumen del periodo (Admin) - Total de planes, total de controles, total de informes
            Resumen del plan (Jefe) - Controles realizados, controles pendientes, controles atrasados
            Resumen del profesor (Profesor) - Controles realizados
            --}}

            @if (in_array($role, ['decana']) && isset($planes))
            <div class="flex flex-col gap-3 pb-5 border-b">
                <h1>
                    <Link href="{{ route('plan.actual') }}" class="text-lg md:text-xl font-bold">
                    {{ __('Periodo actual') }}
                    </Link>
                </h1>

                <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-5">
                    <x-table-resumen :label="__('Total de planes control')" :cant="$planes->count()" />

                    @isset($controles)
                    <x-table-resumen :label="__('Controles Planificados')" :cant="$controles" />

                    @isset($informes)
                    <x-table-resumen :label="__('Controles Realizados')" :cant="$informes" :total="$controles" />
                    @endif
                    @endif
                </div>
            </div>
            @endif

            @if (in_array($role, ['jefe']) && isset($plan))
            <div class="flex flex-col gap-3 pb-5 border-b">
                <h1>
                    <Link href="{{ route('plan.actual') }}" class="text-lg md:text-xl font-bold">
                    {{ __('Plan actual') }}
                    </Link>
                </h1>

                <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-5">
                    @isset($controles)
                    <x-table-resumen :label="__('Controles Planificados')" :cant="$controles" />

                    @isset($informes)
                    <x-table-resumen :label="__('Controles Realizados')" :cant="$informes" :total="$controles" />
                    @endif
                    @endif
                </div>
            </div>
            @endif

            @if (isset ($chartData))
            <div class="flex flex-col gap-y-4 items-start">
                <h1 class="text-2xl font-bold">{{ __('Informes de cumplimientos de controles a clases') }}</h1>

                <div class="flex h-[300px] w-full">
                    <Chart :chartData="@js($chartData)" />
                </div>

                <Link href="{{ route('periodos.show') }}"
                    class="text-primary-500 hover:text-primary-800 border rounded-lg px-4 py-3 inline-block">{{
                __('Ver toda la información archivada') }} <svg xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-right inline-block">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M9 6l6 6l-6 6" />
                </svg></Link>
            </div>
            @endif


        </div>
    </div>
</x-app-layout>