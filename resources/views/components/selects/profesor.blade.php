<x-splade-select :label="__('Profesor')" required name="user_id">
    <option disabled value="" selected>{{ __('Seleccionar profesor') }}</option>
    @foreach ($profesors as [$user_id, $name])
    <option value="{{ $user_id }}">{{ $name }}</option>
    @endforeach
</x-splade-select>