<x-app-layout>
    <x-slot name="header">

        <h1 class="text-2xl md:text-4xl font-bold">
            {{ __('Notificaciones') }}
        </h1>

    </x-slot>


    <div class="py-12">

        <div class="max-w-2xl bg-white">
            @foreach ($notificaciones as $notificacion)
            @php $link = ($notificacion->type == 'informe') ? route('informe.view', $notificacion->aditional_id) :
            route('informe.show') @endphp
            <div class="shadow-sm sm:rounded-lg p-3 mb-3 hover:bg-gray-400/20">
                <Link modal href="{{ route('notification.view', $notificacion->id) }}" class="flex flex-col ">
                <p class="text-base ">{{ $notificacion->message }}</p>
                <span class="text-xs text-gray-500">{{ $notificacion->created_at }}</span>
                </Link>
            </div>

            @endforeach
        </div>
    </div>

</x-app-layout>