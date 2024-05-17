<div class="space-y-2 h-screen">
    <livewire:head.head title="{{ $title }}" description="{{ $description }}" user_name="{{ auth()->user()->name }}"/>
    <div class="flex justify-end space-x-2">
        <button wire:click="create" class="p-2 bg-bsi-primary text-white rounded-lg hover:bg-teal-700">Tambah User</button>
    </div>
    <livewire:userlist lazy />
</div>