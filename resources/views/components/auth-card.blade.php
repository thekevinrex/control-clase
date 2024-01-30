
    <div>
        @isset($logo)
            {{ $logo }}
        @else
            <Link href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </Link>
        @endisset
    </div>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
