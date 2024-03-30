@props (['periodo'])

@if (isset($periodo) && !is_null($periodo))

<div class="w-full border rounded-md shadow-md mb-5">
    <div class="flex flex-col p-5 w-full gap-y-5">

        <h1 class="font-bold text-2xl">{{ $periodo->name }}</h1>

        <p>{{ __('Fecha de inicio') }}: {{ $periodo->fecha_inicio }}</p>

        <x-splade-form action="{{ route('periodos.archivar') }}">
            <x-splade-submit :label="__('Archivar periodo')" />
        </x-splade-form>
    </div>
</div>

@else

<div class="w-full border rounded-md shadow-md mb-5">
    <div class="flex flex-col p-5 w-full gap-y-5">

        <h1 class="font-bold text-2xl">{{ __('Aun no has iniciado el periodo actual') }}</h1>

        <x-splade-form action="{{ route('periodos.create') }}">
            <x-splade-submit :label="__('Iniciar periodo')" />
        </x-splade-form>
    </div>
</div>

@endif