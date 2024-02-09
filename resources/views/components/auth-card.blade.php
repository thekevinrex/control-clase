<div>
    @isset($logo)
    {{ $logo }}
    @else
    <Link href="/">
    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
    </Link>
    @endisset
</div>

<div class="py-5">
    <h1 class="text-3xl font-black [text-shadow:_0_1px_0_rgb(0_0_0_/_40%)]">
        Control a clases
    </h1>
</div>

<div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
    {{ $slot }}
</div>