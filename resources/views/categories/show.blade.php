<x-app-layout>

    <x-slot name="header">
        <h1 class="text-2xl md:text-4xl font-bold">
            {{ __('Categorias docentes') }}
        </h1>

        <Link slideover href="{{ route('categories.create') }}">
        <x-splade-button>{{ __('Añadir categoria docente') }}</x-splade-button>
        </Link>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl">
            <x-splade-table :for="$categories">

                <x-splade-cell actions as="$category">
                    @include('categories.actions')
                </x-splade-cell>
            </x-splade-table>

        </div>
    </div>

</x-app-layout>