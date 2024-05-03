<div class="w-full flex justify-end">
    <button wire:click="addIssue" id="addIssue" type="button" class="text-white bg-bsi-primary hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center me-2 dark:bg-bsi-primary dark:hover:bg-teal-700 dark:focus:ring-teal-800">
        <i class="ph ph-plus"></i>
        <span class="sr-only">Icon description</span>
    </button>
</div>
<div>

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
                <i class="ph ph-minus"></i>
                <span class="sr-only">Icon description</span>
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
                <i class="ph ph-minus"></i>
                <span class="sr-only">Icon description</span>
            </button>
        </div>
    </div>
    @endforeach
</div>