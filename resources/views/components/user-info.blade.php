<div class="w-full shadow-md border rounded-md mb-5">
    <div class="flex flex-col w-full p-5">

        <div class="w-full flex gap-x-3">

            @php
            $hour = date('H');
            @endphp
            <div>
                @if ($hour >= 0 && $hour < 12) <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-sun">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                    <path
                        d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7" />
                    </svg>
                    @elseif($hour >= 12 && $hour < 18) <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-sun-moon">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M9.173 14.83a4 4 0 1 1 5.657 -5.657" />
                        <path d="M11.294 12.707l.174 .247a7.5 7.5 0 0 0 8.845 2.492a9 9 0 0 1 -14.671 2.914" />
                        <path d="M3 12h1" />
                        <path d="M12 3v1" />
                        <path d="M5.6 5.6l.7 .7" />
                        <path d="M3 21l18 -18" /></svg>
                        @else
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-moon">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z" />
                        </svg>
                        @endif
            </div>

            <div class="flex flex-col gap-y-2">
                @php
                $greeting = '';

                if ($hour >= 0 && $hour < 12) { $greeting=__('Buenos dias!') ; } elseif ($hour>= 12 && $hour < 18) {
                        $greeting=__('Buenas tardes!') ; } else { $greeting=__('Buenas noches') ; } @endphp <p
                        class="font-semibold text-sm">{{
                        $greeting }}</p>

                        <span>{{ auth()->user()->name }}</span>
            </div>
        </div>


        <div class="flex gap-3 flex-row flex-wrap pt-3 pb-2">
            @foreach (auth()->user()->roles as $role)
            <div class="border border-primary-500 text-white bg-primary-800 px-2 py-1 rounded-md text-xs">
                {{ \App\Enum\RoleEnum::ROLES[$role->role_id] }}
            </div>
            @endforeach
        </div>


        <div class="flex w-full mt-4">

            <Link href="{{ route('notification') }}" class="flex gap-x-2 group hover:cursor-pointer">

            <div class="relative">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="group-hover:stroke-primary-800">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M10 5a2 2 0 1 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6" />
                    <path d="M9 17v1a3 3 0 0 0 6 0v-1" />
                </svg>
            </div>

            <span class="group-hover:text-primary-800">{{ __('Notificaciones') }}</span>

            @if(isset($notifications) && $notifications > 0)
            <div class=" rounded-full bg-red-600 text-white py-1 px-2 text-xs">{{
                $notifications }}
            </div>
            @endif
            </Link>

        </div>

    </div>
</div>