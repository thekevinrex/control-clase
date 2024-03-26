<x-app-layout>
    <x-slot name="header">
        <h1 class="text-2xl md:text-4xl font-bold capitalize">
            {{ __('Profesores') }}
        </h1>

        <Link slideover href="{{ route('profesors.create') }}">
        <x-splade-button>{{ __('Añadir profesor') }}</x-splade-button>
        </Link>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl">
            <x-splade-table :for="$profesors">

                <x-splade-cell actions as="$profesor">
                    @include('profesors.actions')

                </x-splade-cell>
            </x-splade-table>
        </div>
    </div>
</x-app-layout>