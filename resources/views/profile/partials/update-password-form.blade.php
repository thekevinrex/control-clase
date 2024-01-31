<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Cambiar contraseña') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Asegura que tu cuenta está usando una larga y aleatoria contraseña para permanecer seguro') }}
        </p>
    </header>

    <x-splade-form method="put" :action="route('password.update')" class="mt-6 space-y-6" preserve-scroll>
        <x-splade-input id="current_password" name="current_password" type="password" :label="__('Contraseña actual')" autocomplete="current-password" />
        <x-splade-input id="password" name="password" type="password" :label="__('Nueva contraseña')" autocomplete="new-password" />
        <x-splade-input id="password_confirmation" name="password_confirmation" type="password" :label="__('Confirmar contraseña')" autocomplete="new-password" />

        <div class="flex items-center gap-4">
            <x-splade-submit :label="__('Guardar')" />

            @if (session('status') === 'password-updated')
                <p class="text-sm text-gray-600">{{ __('Guardado.') }}</p>
            @endif
        </div>
    </x-splade-form>
</section>
