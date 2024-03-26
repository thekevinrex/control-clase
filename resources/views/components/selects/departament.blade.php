<x-splade-select :label="__('Departamento')" name="departament_id">
    <option disabled value="" selected>{{ __('Seleccionar departamento') }}</option>
    @foreach ($departaments as [$id, $name])
    <option value="{{ $id }}">{{ $name }}</option>
    @endforeach
</x-splade-select>