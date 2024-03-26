<x-splade-select name="to_user_id" :label="__('Profesor controlado')">
    <option disabled value="" selected>{{ __('Seleccionar profesor controlado') }}</option>

    @foreach($profesors as $id => $name)
    <option value="{{ $id }}">{{ $name }}</option>
    @endforeach
</x-splade-select>

<div class="flex w-full justify-between items-center gap-3">

    <x-splade-select name="asignature_id" class="w-full" :label="__('Asignatura')">

        <option disabled value="" selected>{{ __('Seleccionar asignatura') }}</option>

        @foreach($asignatures as $asignature)
        <option value="{{ $asignature->id }}">{{ $asignature->name }}</option>
        @endforeach
    </x-splade-select>

    <x-splade-input class="min-w-[100px]" :label="__('Grupo')" name="grupo" />

</div>

<div class="flex w-full justify-between items-center gap-3">

    <x-splade-input class="w-full" :label="__('Título de la clase')" name="titulo" />

    <x-splade-select name="tipo_clase" class="min-w-[250px]" :label="__('Tipo de clase')">
        <option disabled value="" selected>{{ __('Seleccionar tipo de clase') }}</option>

        @foreach(\App\Enum\ClassTypeEnum::TYPES as $type => $name)
        <option value="{{ $type }}">{{ $name }}</option>
        @endforeach
    </x-splade-select>

</div>