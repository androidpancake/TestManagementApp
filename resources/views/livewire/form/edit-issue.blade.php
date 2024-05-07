<div id="forms" class="flex flex-row gap-2 items-center w-full bg-white p-2 rounded-lg border border-bsi-primary dark:border-2 dark:border-gray-600 dark:bg-gray-800">
    <div class="mb-5 w-2/4">
        <label for="issue-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Issue</label>
        <input type="text" wire:model="existingIssue" value="{{ $existingIssue }}" id="issue-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-bsi-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-bsi-primary" placeholder="Masukkan Issue">
    </div>
    <div class="mb-5 w-2/4">
        <label for="closed-date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Closed Date</label>
        <input type="date" wire:model="existingClosedDate" value="{{ $existingClosedDate }}" id="closed-date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-bsi-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-bsi-primary" placeholder="Masukkan Issue">
    </div>
    <div class="mb-5 w-2/4">
        <label for="status-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
        <select id="status-input" wire:model="existingIssueStatus" class="w-full bg-white border border-gray-200 rounded-lg">
            <option value="{{ $existingIssueStatus }}" selected>{{ $existingIssueStatus }}</option>
            <option>Very High</option>
            <option>High</option>
            <option>Medium</option>
            <option>Low</option>
        </select>
    </div>
    <div>
        <button wire:click="update_issue" id="editIssue" type="button" class="text-white bg-blue-400 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center me-2 dark:hover:bg-blue-800 dark:focus:ring-teal-800 dark:bg-blue-700">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 256 256">
                <path d="M219.31,72,184,36.69A15.86,15.86,0,0,0,172.69,32H48A16,16,0,0,0,32,48V208a16,16,0,0,0,16,16H208a16,16,0,0,0,16-16V83.31A15.86,15.86,0,0,0,219.31,72ZM168,208H88V152h80Zm40,0H184V152a16,16,0,0,0-16-16H88a16,16,0,0,0-16,16v56H48V48H172.69L208,83.31ZM160,72a8,8,0,0,1-8,8H96a8,8,0,0,1,0-16h56A8,8,0,0,1,160,72Z"></path>
            </svg>
            <span class="sr-only">Icon description</span>
        </button>
    </div>
</div>