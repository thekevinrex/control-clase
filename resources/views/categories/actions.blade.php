<div class="flex justify-between flex-row space-x-3">

    <Link slideover href="{{ route('categories.edit', $category->id) }}"
        class=" bg-primary-800 text-white px-4 py-2 rounded-md">
    {{ __('Editar') }}
    </Link>

    <x-splade-form method="delete" :confirm="__('Estas seguro que deseas eliminar esta categoria docente?')"
        :confirm-button="__('Eliminar categoria docente')" :action="route('categories.delete', $category->id)">
        <x-splade-submit danger :label="__('Eliminar categoria docente')" />
    </x-splade-form>

</div>