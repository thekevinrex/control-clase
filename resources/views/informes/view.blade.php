<x-app-layout>
    <x-slot name="header">
        <h1 class="text-2xl md:text-4xl font-bold">
            {{ __('Informe de control a clase') }}
        </h1>

        <div class="flex gap-2">
            <a href="{{ route('informe.download', $informe->id) }}">
                <x-splade-button>{{ __('Descargar') }}</x-splade-button>
            </a>

            @if ($own)
            <x-splade-form method="delete"
                :confirm="__('Estas seguro que deseas eliminar este informe de control a clase?')"
                :confirm-button="__('Eliminar informe de control a clase')"
                :action="route('informe.delete', $informe->id)">
                <x-splade-submit danger :label="__('Eliminar')" />
            </x-splade-form>
            @endif
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl">

            <div class="flex flex-col gap-y-5">

                <div class="flex justify-between items-center">
                    <div class="flex flex-col gap-1">
                        <span class="text-sm text-slate-700">{{ __('Profesor controlado') }}</span>
                        <span class="text-lg font-semibold">{{ $informe->controlado->name }}</span>
                    </div>

                    <div class="flex flex-col gap-1">
                        <span class="text-sm text-slate-700">{{ __('Categoria docente') }}</span>
                        <span class="text-lg font-semibold">{{ $informe->controlado->category->name }}</span>
                    </div>
                </div>

                <div class="flex justify-between items-center">
                    <div class="flex flex-col gap-1">
                        <span class="text-sm text-slate-700">{{ __('Asignatura') }}</span>
                        <span class="text-lg font-semibold">{{ $informe->asignatura->name }}</span>
                    </div>

                    <div class="flex flex-col gap-1">
                        <span class="text-sm text-slate-700">{{ __('Grupo') }}</span>
                        <span class="text-lg font-semibold">{{ $informe->grupo }}</span>
                    </div>
                </div>

                <div class="flex flex-col gap-1">
                    <span class="text-sm text-slate-700">{{ __('Titulo de la clase') }}</span>
                    <span class="text-lg font-semibold">{{ $informe->titulo }}</span>
                </div>

                <div class="flex justify-between items-center">
                    <div class="flex flex-col gap-1">
                        <span class="text-sm text-slate-700">{{ __('Profesor controlador') }}</span>
                        <span class="text-lg font-semibold">{{ $informe->controlador->name }}</span>
                    </div>

                    <div class="flex flex-col gap-1">
                        <span class="text-sm text-slate-700">{{ __('Categoria docente') }}</span>
                        <span class="text-lg font-semibold">{{ $informe->controlador->category->name }}</span>
                    </div>
                </div>

                <div class="flex flex-col gap-1">
                    <span class="text-sm text-slate-700">{{ __('Tipo de clase') }}</span>
                    <span class="text-lg font-semibold">
                        {{ \App\Enum\ClassTypeEnum::TYPES[$informe->tipo_clase] }}
                    </span>
                </div>

            </div>

            <hr class="my-5">

            <div class="flex flex-col gap-y-5">

                <div class="flex flex-col gap-1">
                    <span class="text-sm text-slate-700">{{ __('Logros') }}</span>
                    <span class="text-lg font-semibold">
                        {{ $informe->logros }}
                    </span>
                </div>

                <div class="flex flex-col gap-1">
                    <span class="text-sm text-slate-700">{{ __('Deficiencias') }}</span>
                    <span class="text-lg font-semibold">
                        {{ $informe->deficiencias }}
                    </span>
                </div>

                <div class="flex flex-col gap-1">
                    <span class="text-sm text-slate-700">{{ __('Recomendaciones') }}</span>
                    <span class="text-lg font-semibold">
                        {{ $informe->recomendaciones }}
                    </span>
                </div>

                <div class="flex flex-col gap-1">
                    <span class="text-sm text-slate-700">{{ __('Evaluación') }}</span>
                    <span class="text-xl font-semibold">
                        {{ $informe->evaluation }}
                    </span>
                </div>

                <div class="flex flex-col gap-1">
                    <span class="text-sm text-slate-700">{{ __('Fecha de evaluación') }}</span>
                    <span class="text-xl font-semibold">
                        {{ $informe->created_at }}
                    </span>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>