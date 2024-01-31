<div class="min-h-screen flex flex-col w-full">
    @include('layouts.navigation')

    <div class="w-full flex-col flex items-center">
        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white max-w-7xl w-full flex flex-col gap-y-5 items-start pt-5 px-5">
                {{ $header }}
            </header>
        @endif

        @if (isset($hero))
            {{ $hero }}
        @endif

        <!-- Page Content -->
        <main class="max-w-7xl flex flex-col gap-y-5 w-full px-5">
            {{ $slot }}
        </main>

        <footer class="bg-white max-w-7xl w-full flex flex-col gap-y-5 ">
            @include('layouts.footer')
        </footer>

    </div>
</div>
