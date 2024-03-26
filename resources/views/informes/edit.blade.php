<x-app-layout>
    <x-slot name="header">
        <h1 class="text-2xl md:text-4xl font-bold">
            {{ __('Editar Informe de control a clases') }}
        </h1>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl bg-white grid grid-cols-1 md:grid-cols-2 gap-5">

            <x-splade-form :action="route('informe.update', $informe->id)" method="patch" :default="$informe->toArray()"
                class="flex flex-col max-w-2xl gap-y-5">

                @include('informes.partials.start')

                @include('informes.partials.main')

                <x-splade-submit label="{{__('Editar informe')}}" />
            </x-splade-form>

            <div class="">
                @include('informes.partials.indicators')
            </div>

        </div>
    </div>
</x-app-layout>