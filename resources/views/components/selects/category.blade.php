<x-splade-select :label="__('Category')" required name="category_id">
    <option disabled value="" selected>{{ __('Select category') }}</option>
    @foreach ($categories as [$id, $name])
        <option value="{{ $id }}">{{ $name }}</option>
    @endforeach
</x-splade-select>