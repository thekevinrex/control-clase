<Link slideover href="{{ route('periodos.view', $periodo->id) }}" class=" bg-slate-800 text-white px-4 py-2 rounded-md">
{{__('Ver')}}
</Link>

@can('delete', [App\Models\Periodo::class, $periodo])
<x-splade-form method="delete" :confirm="__('Estas seguro que deseas eliminar?')" :confirm-button="__('Eliminar')"
    :action="route('periodos.delete', $periodo->id)">
    <x-splade-submit danger :label="__('Eliminar')" />
</x-splade-form>
@endcan