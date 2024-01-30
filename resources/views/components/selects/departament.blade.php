<x-splade-select :label="__('Departament')" name="departament_id">
    <option disabled value="" selected>{{ __('Select departament') }}</option>
    @foreach ($departaments as [$id, $name])
        <option value="{{ $id }}">{{ $name }}</option>
    @endforeach
</x-splade-select>