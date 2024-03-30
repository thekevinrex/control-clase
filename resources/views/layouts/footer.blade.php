@inject('navigation', 'App\Services\NavigationService', request())

@php
$navigationMap = $navigation->getNavigaitonMap(
footer : true
);
@endphp

<div className="flex justify-center items-center  ">
    <div className="max-w-screen-xl min-h-[250px] flex flex-col md:flex-row gap-5 justify-start w-full px-10">
        <div className="flex flex-col max-md:justify-center max-w-[300px] space-y-7">

            <Link href="{{ route('dashboard') }}">
            <x-application-logo class="block h-10 w-auto fill-current text-gray-800" />
            </Link>

            <h1 className="text-lg text-pretty tracking-wider font-semibold">
                {{ __('Control a clases') }}
            </h1>

            <p>
                {{ __('Aplicación para el control a clases en la Universidad de las Ciencias Informáticas de Cuba') }}
            </p>

        </div>

        <div className="w-full flex justify-evenly  max-md:flex-col flex-wrap gap-5 items-start">

            @foreach ($navigationMap as $name => $navigation)
            <div className="w-auto h-auto max-w-[300px] flex flex-col">
                <h2 className="text-lg font-bold text-gray-500 mb-7">{{ $name }}</h2>

                <ul className="space-y-2">

                    @foreach ($navigation as $link)
                    <li>
                        <Link href="{{ $link['link'] }}">
                        {{ $link['name'] }}
                        </Link>
                    </li>
                    @endforeach
                </ul>
            </div>
            @endforeach
        </div>

    </div>
</div>

<div className="flex justify-center items-center py-3 px-10">
    {{ __('Diseñado y programado por Kevin González Gómez (2024) ©') }}
</div>