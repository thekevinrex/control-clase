<div class="flex flex-row gap-x-2">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
        <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" />
    </svg>

    <h3 v-if="table.hasSelectedItems" class="text-sm uppercase tracking-wide font-bold">
        <span v-if="table.totalSelectedItems == 1">
            <span v-text="table.totalSelectedItems" /> {{ __('Elemento seleccionado') }}
        </span>

        <span v-if="table.totalSelectedItems > 1">
            <span v-text="table.totalSelectedItems" /> {{ __('Elementos seleccionados') }}
        </span>
    </h3>
</div>

<div class="flex flex-row gap-x-2">
    @foreach($table->getBulkActions() as $bulkAction)
        <button
            v-if="table.hasSelectedItems"
            class="text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-gray-900 font-normal"
            @click.prevent="table.performBulkAction(
                @js($bulkAction->getUrl()),
                @js($bulkAction->confirm),
                @js($bulkAction->confirmText),
                @js($bulkAction->confirmButton),
                @js($bulkAction->cancelButton),
                @js($bulkAction->requirePassword)
            )"
            dusk="action.{{ $bulkAction->getSlug() }}">
            {{ $bulkAction->label }}
        </button>
    @endforeach
</div>
