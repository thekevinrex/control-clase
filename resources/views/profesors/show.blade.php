<x-app-layout>
    <x-slot name="header">
        <h1 class="text-2xl md:text-4xl font-bold">
            {{ __('Profesores') }}
        </h1>

        <Link slideover href="{{ route('profesors.create') }}"><x-splade-button>{{ __('Añadir profesor')}}</x-splade-button></Link>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl bg-white">
            <x-splade-table :for="$profesors">

                <x-splade-cell actions as="$profesor">
                    <div class="flex justify-between flex-row space-x-3">
                        @include('profesors.actions')
                    </div>
                </x-splade-cell>
            </x-splade-table>
        </div>
    </div>

</x-app-layout>
