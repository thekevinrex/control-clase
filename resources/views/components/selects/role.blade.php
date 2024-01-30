<x-splade-select :label="__('Role')" required name="role_id">
    <option disabled value="" selected>{{ __('Select role') }}</option>
    @foreach ($roles as [$role, $name])
        <option value="{{ $role }}">{{ $name }}</option>
    @endforeach
</x-splade-select>