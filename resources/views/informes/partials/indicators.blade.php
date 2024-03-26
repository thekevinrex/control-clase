<h1 class="text-2xl font-bold">
    {{__('Indicadores') }}
</h1>
<ol class="flex flex-col gap-y-5 mt-5">
    @foreach (\App\Enum\IndicatorsEnum::INDICADORES as $key => $indicator)
    <li class="flex flex-col">
        <h2 class="font-bold text-xl">
            {{ $key . ' - ' . $indicator }}
        </h2>
        <ol class="flex flex-col px-5 gap-y-2 mt-2">
            @foreach (\App\Enum\IndicatorsEnum::INDICADORES_MAP[$key] as $key => $item)
            <li class="text-sm">{{ $key . '. ' . $item['name']}}</li>
            @endforeach
        </ol>
    </li>
    @endforeach
</ol>