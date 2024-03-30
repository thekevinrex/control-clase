<div class="flex flex-col gap-y-5">

    <div class="flex flex-col gap-y-3">
        <h1 class="text-xl font-bold">{{ __('Cantidad de controles a clases') }}</h1>

        <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5">
            <x-table-resumen :label="__('Planificados')" :cant="$stats['controls']['total']" />
            <x-table-resumen :label="__('Realizados')" :cant="$stats['controls']['realizados']"
                :total="$stats['controls']['total']" />
        </div>
    </div>

    <div class="flex flex-col gap-y-3">

        <h1 class="text-xl font-bold">{{ __('Resultados de los controles a clases del periodo') }}</h1>

        <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5">

            <x-table-resumen :label="__('Con 2')" :cant="$stats['results'][2]"
                :total="$stats['controls']['realizados']" />

            <x-table-resumen :label="__('Con 3')" :cant="$stats['results'][3]"
                :total="$stats['controls']['realizados']" />

            <x-table-resumen :label="__('Con 4')" :cant="$stats['results'][4]"
                :total="$stats['controls']['realizados']" />

            <x-table-resumen :label="__('Con 5')" :cant="$stats['results'][5]"
                :total="$stats['controls']['realizados']" />
        </div>
    </div>

    <div class="flex flex-col gap-y-3">

        <h1 class="text-xl font-bold">{{ __('Controles a clase por categoria') }}</h1>

        <div class="flex flex-col gap-y-5">
            <div class="flex flex-col gap-y-3">

                <h2 class="text-lg font-semibold">{{ __('Planificados') }}</h2>

                <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5">
                    @foreach ($stats['per_cates']['cates'] as $category)
                    <x-table-resumen :label="$category->name"
                        :cant="$stats['per_cates']['planificados']['cates'][$category->id] ?? 0"
                        :total="$stats['per_cates']['planificados']['total']" />
                    @endforeach
                </div>
            </div>

            <div class="flex flex-col gap-y-3">

                <h2 class="text-lg font-semibold">{{ __('Realizados') }}</h2>

                <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5">
                    @foreach ($stats['per_cates']['cates'] as $category)
                    <x-table-resumen :label="$category->name"
                        :cant="$stats['per_cates']['realizados']['cates'][$category->id] ?? 0"
                        :total="$stats['per_cates']['realizados']['total']" />
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<div class="my-5 w-full max-w-screen-md space-y-4">

    <hr>

    <h1 class="text-xl font-bold">{{ __('Controles a clases') }}</h1>

    <x-splade-table :for="$controls" />
</div>

<div class="my-5 w-full max-w-screen-md space-y-4">

    <hr>

    <Link
        href="{{ route('informe.show') . '?filter[departament_id]=' . $plan->departament_id . (!is_null($plan->periodo_id) ? '&periodo_id=' . $plan->periodo_id : '') }}"
        class="text-primary-500 hover:text-primary-800 border rounded-lg px-4 py-3 inline-block">
    {{ __('Ver todos los informes de controles a clases') }}
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
        class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-right inline-block">
        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
        <path d="M9 6l6 6l-6 6" />
    </svg>
    </Link>

</div>