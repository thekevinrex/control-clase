<x-app-layout>
    <x-slot name="header">
        <h1 class="text-2xl md:text-4xl font-bold">
            {{ __('Perfil') }}
        </h1>
    </x-slot>

    <div class="py-12 flex flex-col gap-y-5">
        <div class="p-4 sm:p-8 bg-white shadow-md sm:rounded-lg">
            <div class="max-w-xl" dusk="update-profile-information">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        <div class="p-4 sm:p-8 bg-white shadow-md sm:rounded-lg">
            <div class="max-w-xl" dusk="update-password">
                @include('profile.partials.update-password-form')
            </div>
        </div>

        <div class="p-4 sm:p-8 bg-white shadow-md sm:rounded-lg">
            <div class="max-w-xl" dusk="delete-user">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
</x-app-layout>
