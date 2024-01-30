<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Plan actual') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            
            @isset($plan)

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200 flex flex-row space-x-5">
                        
                        <Link href="{{ route('plan.edit', $plan->id) }}" class="bg-cyan-300 text-white px-4 py-2 rounded-md">
                            {{ __('Edit plan') }}
                        </Link>
                        
                        <x-splade-form
                            method="delete"
                            :confirm="true"
                            :action="route('plan.delete', $plan->id)"
                        >
                            <x-splade-submit danger :label="__('Delete plan')" />
                        </x-splade-form>

                    </div>
                </div>          

                @include('plan.show', ['plan' => $plan])
            @else
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="w-full flex justify-center items-center min-h-[300px] flex-col space-y-10">
                        
                            <strong>{{ __('No has creado un plan de control a clases') }}</strong>
        
                            <Link href="{{ route('plan.create') }}" class="bg-cyan-300 text-white px-4 py-2 rounded-md">
                                {{ __('Create plan') }}
                            </Link>
                        </div>
                    </div>
                </div>
            @endif
            
        </div>
    </div>

</x-app-layout>
