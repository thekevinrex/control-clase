<x-app-layout>

    <x-slot name="header">
        <h1 class="text-2xl md:text-4xl font-bold">
            {{ __('Asignaturas') }}
        </h1>

        <Link slideover href="{{ route('asignature.create') }}">
        <x-splade-button>{{ __('Añadir asignatura') }}</x-splade-button>
        </Link>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl">

            <x-splade-table :for="$asignatures">

                <x-splade-cell actions as="$asignature">
                    @include('asignature.actions')
                </x-splade-cell>
            </x-splade-table>

        </div>
    </div>

</x-app-layout>