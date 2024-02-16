<div class="space-y-2 h-screen">
    <livewire:head title="{{ $title }}" description="{{ $description }}" />
    <div class="flex justify-end">
        <button wire:click="redirect_add_user" class="p-2 bg-bsi-primary text-white rounded-lg">Tambah User</button>
    </div>
    <livewire:user-list lazy />
</div>