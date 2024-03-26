<x-splade-select :label="__('Asignaturas')" required name="asignatures[]" multiple>
    <option disabled value="" selected>{{ __('Seleccionar asignaturas') }}</option>
    @foreach ($asignatures as [$id, $name])
    <option value="{{ $id }}">{{ $name }}</option>
    @endforeach
</x-splade-select>