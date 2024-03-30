<x-app-layout>
    <x-slot name="header">
        <h1 class="text-2xl md:text-4xl font-bold">
            {{ __('Informes') }}
        </h1>

        @can('create', App\Models\Informe::class)
        <Link href="{{ route('informe.create') }}">
        <x-splade-button>{{ __('Crear informe') }}</x-splade-button>
        </Link>
        @endcan
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl bg-white">

            <x-splade-table :for="$informes">

                <x-splade-cell actions as="$informe">
                    <div class="flex justify-between flex-row space-x-3">
                        @include('informes.actions')
                    </div>
                </x-splade-cell>
            </x-splade-table>

        </div>
    </div>
</x-app-layout>