<div class="w-full flex justify-end">
    <button wire:click="addIssue" id="addIssue" type="button" class="text-white bg-bsi-primary hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center me-2 dark:bg-bsi-primary dark:hover:bg-teal-700 dark:focus:ring-teal-800">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 256 256">
            <path d="M224,128a8,8,0,0,1-8,8H136v80a8,8,0,0,1-16,0V136H40a8,8,0,0,1,0-16h80V40a8,8,0,0,1,16,0v80h80A8,8,0,0,1,224,128Z"></path>
        </svg>
        <span class="sr-only">Icon description</span>
    </button>
</div>
<div>
    @if($editIssue)
    @include('livewire.form.edit-issue')
    @endif
</div>
<div class="flex flex-col gap-2">
    @forelse($issues as $data)
    <div id="forms" class="flex flex-row gap-2 items-center w-full bg-white p-2 rounded-lg dark:border-2 dark:border-gray-600 dark:bg-gray-800">
        <div class="mb-5 w-2/4">
            <label for="issue-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Issue</label>
            <input type="text" value="{{ $data->issue }}" id="issue-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-bsi-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-bsi-primary" placeholder="Masukkan Issue">
        </div>
        <div class="mb-5 w-2/4">
            <label for="closed-date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Closed Date</label>
            <input type="date" value="{{ $data->closed_date }}" id="closed-date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-bsi-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-bsi-primary" placeholder="Masukkan Issue">
        </div>
        <div class="mb-5 w-2/4">
            <label for="status-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
            <select id="status-input" class="w-full bg-white border border-gray-200 rounded-lg">
                <option value="{{ $data->status }}" selected>{{ $data->status }}</option>
                <option>Very High</option>
                <option>High</option>
                <option>Medium</option>
                <option>Low</option>
            </select>
        </div>
        <div>
            <button wire:click="deleteIssue({{ $data->id }})" id="removeIssue" type="button" class="text-white bg-red-400 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center me-2 dark:bg-bsi-primary dark:hover:bg-teal-700 dark:focus:ring-teal-800 dark:bg-red-800">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 256 256">
                    <path d="M216,48H176V40a24,24,0,0,0-24-24H104A24,24,0,0,0,80,40v8H40a8,8,0,0,0,0,16h8V208a16,16,0,0,0,16,16H192a16,16,0,0,0,16-16V64h8a8,8,0,0,0,0-16ZM96,40a8,8,0,0,1,8-8h48a8,8,0,0,1,8,8v8H96Zm96,168H64V64H192ZM112,104v64a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Zm48,0v64a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Z"></path>
                </svg>
                <span class="sr-only">Icon description</span>
            </button>
            <button wire:click="updateIssue({{ $data->id }})" id="editIssue" type="button" class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center me-2 dark:hover:bg-blue-800 dark:focus:ring-teal-800 dark:bg-blue-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 256 256">
                    <path d="M225,80.4,183.6,39a24,24,0,0,0-33.94,0L31,157.66a24,24,0,0,0,0,33.94l30.06,30.06A8,8,0,0,0,66.74,224H216a8,8,0,0,0,0-16h-84.7L225,114.34A24,24,0,0,0,225,80.4ZM108.68,208H70.05L42.33,180.28a8,8,0,0,1,0-11.31L96,115.31,148.69,168Zm105-105L160,156.69,107.31,104,161,50.34a8,8,0,0,1,11.32,0l41.38,41.38a8,8,0,0,1,0,11.31Z"></path>
                </svg> <span class="sr-only">Icon description</span>
            </button>
        </div>
    </div>
    @empty
    <p>Tidak ada data</p>
    @endforelse
    @foreach($this->issue as $index => $issue)
    <div wire:key="{{ $index }}" id="forms" class="flex flex-row gap-2 items-center w-full bg-white p-2 rounded-lg dark:border-2 dark:border-gray-600 dark:bg-gray-800">
        <div class="mb-5 w-2/4">
            <label for="issue-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Issue</label>
            <input type="text" wire:model="issue.{{ $index }}.issue" id="issue-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-bsi-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-bsi-primary" placeholder="Masukkan Issue">
        </div>
        <div class="mb-5 w-2/4">
            <label for="closed-date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Closed Date</label>
            <input type="date" wire:model="issue.{{ $index }}.closed_date" id="closed-date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-bsi-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-bsi-primary">
        </div>
        <div class="mb-5 w-2/4">
            <label for="status-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
            <select wire:model="issue.{{ $index }}.status" id="status-input" class="w-full bg-white border border-gray-200 rounded-lg">
                <option value="">Select</option>
                <option>very high</option>
                <option>high</option>
                <option>medium</option>
                <option>low</option>
            </select>
        </div>
        <div>
            <button wire:click="removeIssue({{ $index }})" id="removeIssue" type="button" class="text-white bg-red-400 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center me-2 dark:bg-bsi-primary dark:hover:bg-teal-700 dark:focus:ring-teal-800 dark:bg-red-800">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 256 256">
                    <path d="M216,48H176V40a24,24,0,0,0-24-24H104A24,24,0,0,0,80,40v8H40a8,8,0,0,0,0,16h8V208a16,16,0,0,0,16,16H192a16,16,0,0,0,16-16V64h8a8,8,0,0,0,0-16ZM96,40a8,8,0,0,1,8-8h48a8,8,0,0,1,8,8v8H96Zm96,168H64V64H192ZM112,104v64a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Zm48,0v64a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Z"></path>
                </svg>
                <span class="sr-only">Icon description</span>
            </button>
        </div>
    </div>
    @endforeach
</div>