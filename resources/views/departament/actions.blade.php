<div class="flex justify-between flex-row space-x-3">

    <Link slideover href="{{ route('departament.edit', $departament->id) }}"
        class=" bg-primary-800 text-white px-4 py-2 rounded-md">
    {{__('Editar')}}
    </Link>

    <x-splade-form method="delete" :confirm="__('Estas seguro que deseas eliminar este departamento?')"
        :confirm-button="__('Eliminar departamento')" :action="route('departament.delete', $departament->id)">
        <x-splade-submit danger :label="__('Eliminar')" />
    </x-splade-form>

</div>