<x-splade-select :label="__('Rol')" required name="role_id">
    <option disabled value="" selected>{{ __('Seleccionar rol') }}</option>
    @foreach ($roles as [$role, $name])
    <option value="{{ $role }}">{{ $name }}</option>
    @endforeach
</x-splade-select>