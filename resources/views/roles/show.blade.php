<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Roles') }}
        </h2>

        <Link href="{{ route('role.create') }}" slideover>Add role</Link>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <x-splade-table :for="$roles">

                        <x-splade-cell actions as="$role">
                            <div class="flex justify-between flex-row space-x-3">
                                
                                <Link slideover href="{{ route('role.edit', $role->id) }}" class=" bg-cyan-300 text-white px-4 py-2 rounded-md">
                                    Edit
                                </Link>
                                
                                <x-splade-form
                                    method="delete"
                                    :confirm="true"
                                    :action="route('role.delete', $role->id)"
                                >
                                    <x-splade-submit danger :label="__('Delete')" />
                                </x-splade-form>
                                

                            </div>
                        </x-splade-cell>
                    </x-splade-table>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
