<x-splade-modal>
    <div class="flex flex-col gap-5">
        <h1 class="text-xl font-semibold">{{ __('Notificación') }}</h1>

        <div class="">
            {{ __('Remitente') }}
            {{ $notificacion->user->name }}
        </div>

        <div class="">
            {{ __('Fecha') }}
            {{ $notificacion->created_at }}
        </div>

        <div class="">
            {{ $notificacion->message }}
        </div>

        <div>
            <x-splade-button type="button" @click="modal.close">{{ __('Atras') }}</x-splade-button>
        </div>
    </div>
</x-splade-modal>