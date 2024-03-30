<x-app-layout>

    <x-slot name="header">
        <h1 class="text-2xl md:text-4xl font-bold">
            {{ __('Información archivada') }}
        </h1>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl flex flex-col">


            @if ($admin)
            <x-periodo :periodo="$periodo" />
            @endif

            <x-splade-table :for="$periodos">

                <x-splade-cell actions as="$periodo">
                    <div class="flex justify-between flex-row space-x-3">
                        @include('periodos.actions')
                    </div>
                </x-splade-cell>
            </x-splade-table>


        </div>
    </div>

</x-app-layout>