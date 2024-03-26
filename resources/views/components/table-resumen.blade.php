@props(['label', 'cant', 'total'])

<div class="w-full border rounded-lg shadow-lg flex items-center">
    <div class="flex w-full p-5 justify-between gap-4 items-center">

        <div class="flex flex-col">
            <span class="text-base text-slate-600">{{ $label }}</span>

            <span class="text-2xl font-bold">{{ $cant }}</span>
        </div>

        @if (isset($total) && $total > 0)
        <div class="flex justify-center items-center relative w-[72px] h-[72px]">
            <svg class="fill-none w-full h-full">
                <circle cx="36" stroke-width="10" class="stroke-primary" pathLength="100"
                    stroke-dasharray="{{ round( ($cant*100) / $total ) }} 100" stroke-dashoffset="0"
                    stroke-linecap="round" cy="36" r="30">
                </circle>
            </svg>
            <span class="absolute text-sm text-slate-500 font-semibold">{{ round( ($cant*100) / $total ) . '%' }}</span>
        </div>
        @endif

    </div>
</div>