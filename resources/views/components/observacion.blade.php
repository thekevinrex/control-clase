@props(['observacion'])

<div class="flex flex-col gap-y-3">

    <div class="flex justify-center gap-x-5">
        <span class="text-base font-semibold">
            {{ $observacion->user->email }}
        </span>

        <div>
            {{-- <x-splade-form method="delete" :confirm="__('Estas seguro que deseas esta observación')"
                :confirm-button="__('Eliminar plan')" :action="route('plan.delete', $plan->id)">
                <x-splade-submit danger>
                    sdasd
                </x-splade-submit>
            </x-splade-form> --}}
        </div>
    </div>

    <div class="text-sm max-w-prose">
        {{ $observacion->observacion }}
    </div>

</div>