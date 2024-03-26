<div class="flex justify-between flex-row space-x-3">

    <Link slideover href="{{ route('role.edit', $role->id) }}" class=" bg-primary-800 text-white px-4 py-2 rounded-md">
    {{ __('Editar') }}
    </Link>

    <x-splade-form method="delete" :confirm="__('Estas seguro que deseas eliminar este rol?')"
        :confirm-button="__('Eliminar rol')" :action="route('role.delete', $role->id)">
        <x-splade-submit danger :label="__('Eliminar rol')" />
    </x-splade-form>

</div>