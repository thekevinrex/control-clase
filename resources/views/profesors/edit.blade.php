<x-splade-modal slideover :close-button="false">
        
    <h2 class="font-semibold text-xl">
        {{ $header }}
    </h2>

    <x-splade-form 
        action="{{ $action }}" 
        method="{{ (isset($edit) && $edit) ? 'patch' : 'post' }}" 
        :default="$profesor ?? []" 
        class="space-y-4 mt-5"
    >
        
        <x-splade-input id="name" type="text" name="name" :label="__('Name')" required autofocus />

        <x-splade-input id="email" type="email" name="email" :label="__('Email')" required />

        @if(!isset($profesor))
            <x-splade-input id="password" type="password" name="password" :label="__('Password')" required autocomplete="new-password" />
            <x-splade-input id="password_confirmation" type="password" name="password_confirmation" :label="__('Confirm Password')" required />
        @endif

        <x-selects.role />
        
        <x-selects.departament />
    
        <x-selects.category />

        <div class="flex items-center space-x-5">
            <x-splade-submit :label="__('Save')" />
            <button type="button" @click="modal.close">{{ __('Cancel') }}</button>
        </div>

    </x-splade-form>

</x-splade-modal>
