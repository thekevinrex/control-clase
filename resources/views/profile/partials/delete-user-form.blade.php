<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Eliminar cuenta') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Una vez que la cuenta se elimine toda la información se borrará permanentemente. Introduce tu contraseña para confirmar que quieres eliminar la cuenta.') }}
        </p>
    </header>

     <x-splade-form
        method="delete"
        :action="route('profile.destroy')"
        :confirm="__('Estas seguro que deseas eliminar tu cuenta?')"
        :confirm-text="__('Una vez que la cuenta se elimine toda la información se borrará permanentemente. Introduce tu contraseña para confirmar que quieres eliminar la cuenta.')"
        :confirm-button="__('Eliminar cuenta')"
        require-password
    >
        <x-splade-submit danger :label="__('Eliminar cuenta')" />
    </x-splade-form>
</section>
