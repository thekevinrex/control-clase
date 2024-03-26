<x-app-layout>

    <x-slot name="header">
        <h1 class="text-2xl md:text-4xl font-bold capitalize">
            {{ __('Departamentos') }}
        </h1>

        <Link slideover href="{{ route('departament.create') }}">
        <x-splade-button>{{ __('Añadir departamento') }}</x-splade-button>
        </Link>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl">

            <x-splade-table :for="$departaments">

                <x-splade-cell name as="$departament">
                    <span class="capitalize">{{ $departament->name }}</span>
                </x-splade-cell>

                <x-splade-cell actions as="$departament">
                    @include('departament.actions')
                </x-splade-cell>
            </x-splade-table>
        </div>
    </div>

</x-app-layout>