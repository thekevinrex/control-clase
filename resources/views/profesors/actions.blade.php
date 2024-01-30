<Link slideover href="{{ route('profesors.edit', $profesor->id) }}" class=" bg-cyan-300 text-white px-4 py-2 rounded-md">
    Edit
</Link>

<x-splade-form
    require-password 
    method="delete"
    :confirm="__('Are you sure you want to delete this account?')"
    :confirm-text="__('Once this account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.')"
    :confirm-button="__('Delete Account')"
    :action="route('profesors.delete', $profesor->id)"
>
    <x-splade-submit danger :label="__('Delete')" />
</x-splade-form>