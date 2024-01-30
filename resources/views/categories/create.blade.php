<x-splade-modal slideover :close-button="false">
        
    <h2>
        {{ $header }}
    </h2>

    <x-splade-form 
        action="{{ $action }}" 
        method="{{ (isset($edit) && $edit) ? 'patch' : 'post' }}" 
        :default="$category ?? []" 
        class="space-y-4 mt-5"
    >
        
        <x-splade-input id="name" type="text" name="name" :label="__('Name')" required autofocus />

        <div class="flex items-center space-x-5">
            <x-splade-submit :label="__('Save')" />
            <button type="button" @click="modal.close">{{ __('Cancel') }}</button>
        </div>

    </x-splade-form>

</x-splade-modal>
