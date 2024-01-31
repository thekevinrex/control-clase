<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Información de perfil') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Modifica tu información de perfil y correo electronico.") }}
        </p>
    </header>

    <x-splade-form method="patch" :action="route('profile.update')" :default="$user" class="mt-6 space-y-6" preserve-scroll>
        <x-splade-input id="name" name="name" type="text" :label="__('Nombre')" required autofocus autocomplete="name" />
        <x-splade-input id="email" name="email" type="email" :label="__('Correo electronico')" required autocomplete="email" />

        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
            <div>
                <p class="text-sm mt-2 text-gray-800">
                    {{ __('Tu correo electronico aun no ha sido verificado.') }}

                    <Link method="post" href="{{ route('verification.send') }}" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        {{ __('Haz click aqui para reenviar el correo de verificación.') }}
                    </Link>
                </p>

                @if (session('status') === 'verification-link-sent')
                    <p class="mt-2 font-medium text-sm text-green-600">
                        {{ __('Un nuevo link de verificación ha sido enviado a su dirección de correo electrónico.') }}
                    </p>
                @endif
            </div>
        @endif

        <div class="flex items-center gap-4">
            <x-splade-submit :label="__('Guardar')" />

            @if (session('status') === 'profile-updated')
                <p class="text-sm text-gray-600">
                    {{ __('Guardado.') }}
                </p>
            @endif
        </div>
    </x-splade-form>
</section>
