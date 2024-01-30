<div class="min-h-screen">
    @include('layouts.navigation')

    <!-- Page Heading -->
    @if(isset($header))
    <header class="bg-white shadow">
        <h1 class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            {{ $header }}
        </h1>
    </header>
    @endif

    @if(isset($hero)) {{ $hero }} @endif

    <!-- Page Content -->
    <main>
        {{ $slot }}
    </main>
</div>
