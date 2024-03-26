<x-splade-select :label="__('Categorias')" required name="category_id">
    <option disabled value="" selected>{{ __('Seleccionar categorias') }}</option>
    @foreach ($categories as [$id, $name])
    <option value="{{ $id }}">{{ $name }}</option>
    @endforeach
</x-splade-select>