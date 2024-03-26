<div class="flex justify-between flex-row space-x-3">

    <Link slideover href="{{ route('profesors.edit', $profesor->id) }}"
        class=" bg-primary-800 text-white px-4 py-2 rounded-md">
    {{__('Editar')}}
    </Link>

    <x-splade-form require-password method="delete" :confirm="__('Estas seguro que deseas eliminar esta cuenta?')"
        :confirm-text="__('Una vez que la cuenta se elimine toda la información se borrará permanentemente. Introduce tu contraseña para confirmar que quieres eliminar la cuenta.')"
        :confirm-button="__('Eliminar cuenta')" :action="route('profesors.delete', $profesor->id)">
        <x-splade-submit danger :label="__('Eliminar')" />
    </x-splade-form>

</div>