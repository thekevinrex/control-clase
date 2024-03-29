@props(['plan'])

<div class="grid md:grid-cols-2  lg:grid-cols-3  gap-y-7 mt-10">


    <h2 class="text-2xl font-semibold col-span-full">
        {{ __('Observaciones del plan') }}
    </h2>

    <div class="lg:col-span-2 flex flex-col gap-y-5">

        @if(count($plan->observaciones) === 0)
        <div class="flex items-center justify-center text-xl font-semibold min-h-[200px]">
            {{ __('Aun no se han añadido ninguna observación') }}
        </div>
        @else
        @foreach ($plan->observaciones as $observacion)
        <x-observacion :observacion="$observacion" />
        @endforeach
        @endif

    </div>

    @if (is_null($plan->periodo_id))
    <x-splade-form preserve-scroll :action="route('observacion.add', ['plan' => $plan->id])">
        <div class="max-w-xl p-5 border rounded-md shadow-sm flex flex-col gap-y-5">

            <h3 class="text-lg font-semibold">
                {{__('Añadir observación')}}
            </h3>

            <x-splade-textarea name="observacion" :placeholder="__('Observación')" />

            <x-splade-submit :label="__('Añadir observación')" />
        </div>
    </x-splade-form>
    @endif
</div>