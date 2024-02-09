<x-app-layout>
    <x-slot name="header">
        <h1 class="text-2xl md:text-4xl font-bold">
            {{ __('Roles') }}
        </h1>

        <Link slideover href="{{ route('role.create') }}">
        <x-splade-button>{{ __('Asignar role') }}</x-splade-button></Link>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl">

            <x-splade-table :for="$roles">

                <x-splade-cell actions as="$role">
                    <div class="flex justify-between flex-row space-x-3">

                        <Link slideover href="{{ route('role.edit', $role->id) }}"
                            class=" bg-primary-800 text-white px-4 py-2 rounded-md">
                        {{ __('Editar') }}
                        </Link>

                        <x-splade-form method="delete" :confirm="__('Estas seguro que deseas eliminar este rol?')" :confirm-button="__('Eliminar rol')" :action="route('role.delete', $role->id)">
                            <x-splade-submit danger :label="__('Eliminar rol')" />
                        </x-splade-form>

                    </div>
                </x-splade-cell>
            </x-splade-table>

        </div>
    </div>

</x-app-layout>
