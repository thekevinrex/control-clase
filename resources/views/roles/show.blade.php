<x-app-layout>
    <x-slot name="header">
        <h1 class="text-2xl md:text-4xl font-bold">
            {{ __('Roles') }}
        </h1>

        <Link slideover href="{{ route('role.create') }}">
        <x-splade-button>{{ __('Asignar rol') }}</x-splade-button>
        </Link>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl">

            <x-splade-table :for="$roles">

                <x-splade-cell actions as="$role">
                    @include('roles.actions')
                </x-splade-cell>
            </x-splade-table>

        </div>
    </div>

</x-app-layout>