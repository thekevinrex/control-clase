<x-guest-layout>
    <x-auth-card>

        <h1 class="text-xl font-semibold mb-4">{{ __('Confirm password') }}</h1>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
        </div>

        <x-splade-form action="{{ route('password.confirm') }}" class="space-y-4">
            <x-splade-input id="password" type="password" name="password" required autocomplete="current-password" :label="__('Password')" />

            <div class="flex justify-end">
                <x-splade-submit :label="__('Confirm')" />
            </div>
        </x-splade-form>
    </x-auth-card>
</x-guest-layout>
