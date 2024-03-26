<Link slideover href="{{ route('informe.view', $informe->id) }}" class=" bg-slate-800 text-white px-4 py-2 rounded-md">
{{__('Ver')}}
</Link>

<Link slideover href="{{ route('informe.edit', $informe->id) }}"
    class=" bg-primary-800 text-white px-4 py-2 rounded-md">
{{__('Editar')}}
</Link>

<x-splade-form method="delete" :confirm="__('Estas seguro que deseas eliminar este informe de control a clase?')"
    :confirm-button="__('Eliminar informe de control a clase')" :action="route('informe.delete', $informe->id)">
    <x-splade-submit danger :label="__('Eliminar')" />
</x-splade-form>