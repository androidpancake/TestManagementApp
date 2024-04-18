<div class="w-full flex justify-end">
    <button wire:click="addMember" id="addUser" type="button" class="text-white bg-bsi-primary hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center me-2 dark:bg-bsi-primary dark:hover:bg-teal-700 dark:focus:ring-teal-800">
        <i class="ph ph-plus"></i>
        <span class="sr-only">Icon description</span>
    </button>
</div>
<div class="flex flex-col gap-2">
    @foreach($members as $data)
    <div id="forms" class="flex flex-row gap-2 w-full bg-white p-2 rounded-lg dark:border-2 dark:border-gray-600 dark:bg-gray-800">
        <div class="mb-5 w-full">
            <label for="name-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
            <input type="text" value="{{ $data->user_name }}" id="name-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-bsi-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-bsi-primary">
            @error('user_name')
            <span class="text-red-800">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-5 w-full">
            <label for="unit-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Unit</label>
            <input type="text" value="{{ $data->unit }}" id="unit-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-bsi-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-bsi-primary">
            @error('unit')
            <span class="text-red-800">{{$message}}</span>
            @enderror
        </div>
        @if($project->test_level->type == 'UAT' || $project->test_level->type == 'PIR')
        <div class="mb-5 w-full">
            <label for="group-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Group</label>
            <input type="text" value="{{ $data->group }}" id="group-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-bsi-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-bsi-primary">
            @error('group')
            <span class="text-red-800">{{$message}}</span>
            @enderror
        </div>
        @endif
        <div class="mb-5 w-full">
            <label for="telephone-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Telephone</label>
            <input type="number" value="{{ $data->telephone }}" id="telephone-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-bsi-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-bsi-primary">
            @error('telephone')
            <span class="text-red-800">{{$message}}</span>
            @enderror
        </div>
    </div>
    @endforeach
    @foreach($this->users as $index => $user)
    <div wire:key="{{ $index }}" id="forms" class="flex flex-row gap-2 w-full bg-white p-2 rounded-lg dark:border-2 dark:border-gray-600 dark:bg-gray-800">
        <div class="mb-5 w-full">
            <label for="name-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
            <input type="text" wire:model="users.{{ $index }}.user_name" id="name-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-bsi-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-bsi-primary">
            @error('users.*.user_name')
            <span class="text-red-800">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-5 w-full">
            <label for="unit-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Unit</label>
            <input type="text" wire:model="users.{{ $index }}.unit" id="unit-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-bsi-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-bsi-primary">
            @error('users.*.unit')
            <span class="text-red-800">{{$message}}</span>
            @enderror
        </div>
        @if($project->test_level->type == 'UAT' || $project->test_level->type == 'PIR')
        <div class="mb-5 w-full">
            <label for="group-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Group (UAT)</label>
            <input type="text" wire:model="users.{{ $index }}.group" id="unit-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-bsi-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-bsi-primary">
        </div>
        @endif
        <div class="mb-5 w-full">
            <label for="telephone-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Telephone</label>
            <input type="number" wire:model="users.{{ $index }}.telephone" id="telephone-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-bsi-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-bsi-primary">
            @error('users.*.telephone')
            <span class="text-red-800">{{$message}}</span>
            @enderror
        </div>
        <div>
            <button wire:click="removeMember({{ $index }})" id="minUser" type="button" class="text-white bg-red-400 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center me-2 dark:bg-bsi-primary dark:hover:bg-teal-700 dark:focus:ring-teal-800 dark:bg-red-800">
                <i class="ph ph-minus"></i>
                <span class="sr-only">Icon description</span>
            </button>
        </div>
    </div>
    @endforeach
</div>