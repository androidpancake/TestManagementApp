<div class="space-y-2">
    <livewire:head title="Tambah User" description="" />

    <div class="w-full flex justify-end">
        <button wire:click="addUser" id="addUser" type="button" class="text-white bg-bsi-primary hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center me-2 dark:bg-bsi-primary dark:hover:bg-teal-700 dark:focus:ring-teal-800">
            <i class="ph ph-plus"></i>
            <span class="sr-only">Icon description</span>
        </button>
    </div>
    <form wire:submit.prevent="store" class="space-y-2">
        <div class="flex flex-col gap-2 overflow-x-auto">
            @foreach($this->users as $index => $user)
            <div wire:key="{{ $index }}" id="forms" class="grid grid-cols-3 gap-2 w-full bg-white p-2 rounded-lg dark:border-2 dark:border-gray-600 dark:bg-gray-800">
                <div class="mb-5 w-full">
                    <label for="name-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                    <input type="text" wire:model="users.{{ $index }}.name" id="name-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500">
                    @error('users.*.name')
                    <span class="text-red-800">{{$message}}</span>
                    @enderror
                </div>
                <div class="mb-5 w-full">
                    <label for="unit-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Unit</label>
                    <input type="text" wire:model="users.{{ $index }}.unit" id="unit-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500">
                    @error('users.*.unit')
                    <span class="text-red-800">{{$message}}</span>
                    @enderror
                </div>
                <div class="mb-5 w-full">
                    <label for="dept-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Departement</label>
                    <input type="text" wire:model="users.{{ $index }}.department" id="dept-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500">
                    @error('users.*.department')
                    <span class="text-red-800">{{$message}}</span>
                    @enderror
                </div>
                <div class="mb-5 w-full">
                    <label for="role-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Roles</label>
                    <select wire:model="users.{{ $index }}.role" id="role-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500">
                        @foreach($this->roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                    @error('users.*.role')
                    <span class="text-red-800">{{$message}}</span>
                    @enderror
                </div>
                <div class="mb-5 w-full">
                    <label for="username-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                    <input type="text" wire:model="users.{{ $index }}.username" id="username-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500">
                    @error('users.*.username')
                    <span class="text-red-800">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="w-full">
                <button wire:click="removeUser({{ $index }})" id="minUser" type="button" class="text-white bg-red-400 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center me-2 dark:bg-bsi-primary dark:hover:bg-teal-700 dark:focus:ring-teal-800 dark:bg-red-800">
                    <i class="ph ph-minus"></i>
                    <span class="sr-only">Icon description</span>
                </button>
            </div>
            @endforeach
        </div>
        <div class="flex justify-end">
            <button type="submit" class="p-2 bg-bsi-primary text-white rounded-lg">Create</button>
        </div>
    </form>
</div>