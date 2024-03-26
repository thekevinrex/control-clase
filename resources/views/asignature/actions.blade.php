<div class="flex justify-between flex-row space-x-3">

    <Link slideover href="{{ route('asignature.edit', $asignature->id) }}"
        class=" bg-primary-800 text-white px-4 py-2 rounded-md">
    {{ __('Editar') }}
    </Link>

    <x-splade-form method="delete" :confirm="__('Estas seguro que deseas eliminar esta asignatura?')"
        :confirm-button="__('Eliminar asignatura')" :action="route('asignature.delete', $asignature->id)">
        <x-splade-submit danger :label="__('Eliminar asignatura')" />
    </x-splade-form>

</div>