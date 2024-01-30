<x-splade-modal slideover :close-button="false">
        
    <h2>
        {{ $header }}
    </h2>

    <x-splade-form 
        action="{{ $action }}" 
        method="{{ (isset($edit) && $edit) ? 'patch' : 'post' }}" 
        :default="$role ?? []" 
        class="space-y-4 mt-5"
    >
        

        <x-selects.role />
    
        <x-selects.profesor />

        <div class="flex items-center space-x-5">
            <x-splade-submit :label="__('Save')" />
            <button type="button" @click="modal.close">{{ __('Cancel') }}</button>
        </div>

    </x-splade-form>

</x-splade-modal>
