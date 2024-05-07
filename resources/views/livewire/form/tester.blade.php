<div class="w-full flex justify-end">
    <button wire:click="addMember" id="addUser" type="button" class="text-white bg-bsi-primary hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center me-2 dark:bg-bsi-primary dark:hover:bg-teal-700 dark:focus:ring-teal-800">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 256 256">
            <path d="M224,128a8,8,0,0,1-8,8H136v80a8,8,0,0,1-16,0V136H40a8,8,0,0,1,0-16h80V40a8,8,0,0,1,16,0v80h80A8,8,0,0,1,224,128Z"></path>
        </svg>
        <span class="sr-only">Icon description</span>
    </button>
</div>
<div class="flex flex-col gap-2">
    <form class="flex flex-col gap-2 w-full">
        @if($editUsers)
        @include('livewire.form.edit-tester')
        @endif
        @foreach($this->members as $mIndex => $data)
        <div id="existingMembers" class="flex gap-2 bg-white p-2 rounded-lg dark:border-2 dark:border-gray-600 dark:bg-gray-800">
            <div class="mb-5 w-full">
                <label for="name-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                <input type="text" name="members[$mIndex][user_name]" value="{{ $data->user_name }}" id="name-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-bsi-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-bsi-primary">
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
            <div>
                <button wire:click="deleteMember({{ $data->id }})" wire:confirm="Anda yakin menghapus tester?" id="minUser" type="button" class="text-white bg-red-400 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center me-2 dark:bg-bsi-primary dark:hover:bg-teal-700 dark:focus:ring-teal-800 dark:bg-red-800">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 256 256">
                        <path d="M216,48H176V40a24,24,0,0,0-24-24H104A24,24,0,0,0,80,40v8H40a8,8,0,0,0,0,16h8V208a16,16,0,0,0,16,16H192a16,16,0,0,0,16-16V64h8a8,8,0,0,0,0-16ZM96,40a8,8,0,0,1,8-8h48a8,8,0,0,1,8,8v8H96Zm96,168H64V64H192ZM112,104v64a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Zm48,0v64a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Z"></path>
                    </svg>
                    <span class="sr-only">Icon description</span>
                </button>
                <button wire:click="editMember({{ $data->id }})" id="addUser" type="button" class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center me-2 dark:bg-bsi-primary dark:hover:bg-teal-700 dark:focus:ring-blue-800">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 256 256">
                        <path d="M225,80.4,183.6,39a24,24,0,0,0-33.94,0L31,157.66a24,24,0,0,0,0,33.94l30.06,30.06A8,8,0,0,0,66.74,224H216a8,8,0,0,0,0-16h-84.7L225,114.34A24,24,0,0,0,225,80.4ZM108.68,208H70.05L42.33,180.28a8,8,0,0,1,0-11.31L96,115.31,148.69,168Zm105-105L160,156.69,107.31,104,161,50.34a8,8,0,0,1,11.32,0l41.38,41.38a8,8,0,0,1,0,11.31Z"></path>
                    </svg> <span class="sr-only">Icon description</span>

                </button>
            </div>
        </div>
        @endforeach
    </form>
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
        @error('users.*.group')
        <span class="text-red-800">{{$message}}</span>
        @enderror
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
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 256 256">
                    <path d="M216,48H176V40a24,24,0,0,0-24-24H104A24,24,0,0,0,80,40v8H40a8,8,0,0,0,0,16h8V208a16,16,0,0,0,16,16H192a16,16,0,0,0,16-16V64h8a8,8,0,0,0,0-16ZM96,40a8,8,0,0,1,8-8h48a8,8,0,0,1,8,8v8H96Zm96,168H64V64H192ZM112,104v64a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Zm48,0v64a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Z"></path>
                </svg>
                <span class="sr-only">Icon description</span>
            </button>
        </div>
    </div>
    @endforeach
</div>