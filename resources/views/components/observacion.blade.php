<div class="flex flex-col gap-y-3 px-5">
    <x-splade-toggle :data="false">
        <div class="flex justify-between items-center gap-x-5">
            <div class="flex flex-col gap-y-2">
                <span class="text-base font-semibold">
                    {{ $observacion->user->email }}
                </span>
                <span class="text-xs text-gray-600">
                    {{ __('Creado el ') . $observacion->created_at->format('Y-m-d') }}
                </span>
            </div>

            @if ($own)
            <div class="flex gap-3">
                <x-splade-button v-show="!toggled" @click="setToggle(true)"><svg xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round"
                        class="icon icon-tabler icons-tabler-outline icon-tabler-edit">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                        <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                        <path d="M16 5l3 3" />
                    </svg></x-splade-button>
                <x-splade-form method="delete" preserve-scroll :confirm="__('Estas seguro que deseas esta observación')"
                    :confirm-button="__('Eliminar observación')"
                    :action="route('observacion.delete', $observacion->id)">
                    <x-splade-submit danger>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-trash">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M4 7l16 0" />
                            <path d="M10 11l0 6" />
                            <path d="M14 11l0 6" />
                            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                        </svg>
                    </x-splade-submit>
                </x-splade-form>
            </div>
            @endif
        </div>

        <div v-show="!toggled" class="text-sm max-w-prose">
            {{ $observacion->observacion }}
        </div>

        <div v-show="toggled">
            <x-splade-form method="patch" preserve-scroll :action="route('observacion.update', $observacion->id)"
                :default="[ 'observacion' => $observacion->observacion ]">
                <div class="flex flex-col gap-y-3">
                    <x-splade-textarea name="observacion" :label="__('Observación')" />

                    <div class="flex gap-3">
                        <x-splade-submit :label="__('Editar observación')" />
                        <x-splade-button type="button" secondary @click="setToggle(false)">Cancelar</x-splade-button>
                    </div>
                </div>
            </x-splade-form>
        </div>

    </x-splade-toggle>
</div>