<x-splade-select :label="__('Asignatures')" required name="asignatures[]" multiple>
    <option disabled value="" selected>{{ __('Select asignatures') }}</option>
    @foreach ($asignatures as [$id, $name])
        <option value="{{ $id }}">{{ $name }}</option>
    @endforeach
</x-splade-select>