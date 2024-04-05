<div class="pt-4 flex flex-col w-full space-y-2">
    <div class="w-full justify-start">
        <div id="title" class="font-semibold text-lg text-gray-900 uppercase dark:text-gray-100">{{ $title }}</div>
        <div id="subtitle" class="font-base text-sm text-gray-700 dark:text-gray-200">{{ $description }}</div>
    </div>
    <div class="flex justify-between">
        <div class="bg-gray-500 p-2 rounded-full text-sm text-white">{{ $currentStep }} out of {{ $total_steps }}</div>
    </div>
    <div class="text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:text-gray-400 dark:border-gray-700">
        <ul class="flex flex-wrap -mb-px">
            <li class="me-2">
                <button type="button" wire:click="toStep(1)" class="inline-block p-4 border-b-2 {{ $currentStep == 1 ? 'border-bsi-primary text-bsi-primary' : 'border-transparent' }} rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" aria-current="page">Project Info</button>
            </li>
            <li class="me-2">
                <button type="button" wire:click="toStep(2)" class="inline-block p-4 border-b-2 {{ $currentStep == 2 ? 'border-bsi-primary text-bsi-primary' : 'border-transparent' }} rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" aria-current="page">Description</button>
            </li>
            <li class="me-2">
                <button type="button" wire:click="toStep(3)" class="inline-block p-4 border-b-2 {{ $currentStep == 3 ? 'border-bsi-primary text-bsi-primary' : 'border-transparent' }} rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" aria-current="page">Env & Credentials</button>
            </li>
            <li class="me-2">
                <button type="button" wire:click="toStep(4)" class="inline-block p-4 border-b-2 {{ $currentStep == 4 ? 'border-bsi-primary text-bsi-primary' : 'border-transparent' }} rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" aria-current="page">Issue</button>
            </li>
            <li>
                <button type="button" wire:click="toStep(5)" class="inline-block p-4 border-b-2 {{ $currentStep == 5 ? 'border-bsi-primary text-bsi-primary' : 'border-transparent' }} rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" aria-current="page">Tester</button>
            </li>
            <li>
                <button type="button" wire:click="toStep(6)" class="inline-block p-4 border-b-2 {{ $currentStep == 6 ? 'border-bsi-primary text-bsi-primary' : 'border-transparent' }} rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" aria-current="page">Scenario-Case-Step</button>
            </li>
            <li>
                <button type="button" wire:click="toStep(7)" class="inline-block p-4 border-b-2 {{ $currentStep == 7 ? 'border-bsi-primary text-bsi-primary' : 'border-transparent' }} rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" aria-current="page">Document Availability</button>
            </li>
        </ul>
    </div>
    @if($currentStep===1)
    <div class="mb-5">
        <label for="name-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Project Name/AM Code</label>
        <input type="text" wire:model="name" id="name-input" value="{{ $name }}" placeholder="Masukkan Nama Project" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-bsi-primary focus:border-bsi-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-bsi-primary dark:focus:border-bsi-primary">
        @error('name')
        <span class="text-red-800">{{$message}}</span>
        @enderror
    </div>
    <div class="mb-5">
        <label for="jira-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">JIRA Code</label>
        <input type="text" wire:model="jira_code" id="jira-input" value="{{ $jira_code }}" placeholder="Masukkan Kode JIRA/Kode Issue Production" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-bsi-primary focus:border-bsi-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-bsi-primary dark:focus:border-bsi-primary">
        @error('jira_code')
        <span class="text-red-800">{{$message}}</span>
        @enderror
    </div>
    <div class="mb-5">
        <label for="test_level" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Test Level</label>

        <select wire:model="test_level_id" id="test_level" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-bsi-primary focus:border-bsi-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-bsi-primary dark:focus:border-bsi-primary">
            <option value="{{ $test_level_id }}" selected>{{ $project->test_level->type }}</option>
        </select>
        @error('test_level_id')
        <span class="text-red-800">{{$message}}</span>
        @enderror
    </div>
    <div class="mb-5">
        <label for="test_type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Test Type</label>
        <input wire:model="test_type" id="test_type" type="text" value="{{ $test_type }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-bsi-primary focus:border-bsi-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-bsi-primary dark:focus:border-bsi-primary" readonly>
        @error('test_type')
        <span class="text-red-800">{{$message}}</span>
        @enderror
    </div>
    <div class="mb-5">
        <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal</label>
        <div class="flex w-full items-center">
            <div class="relative">

                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                    </svg>
                </div>
                <input wire:model="start_date" type="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-bsi-primary focus:border-bsi-primary block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-bsi-primary dark:focus:border-bsi-primary" placeholder="Select date start">
            </div>
            <span class="mx-4 text-gray-500">to</span>
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                    </svg>
                </div>
                <input wire:model="end_date" type="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-bsi-primary focus:border-bsi-primary block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-bsi-primary dark:focus:border-bsi-primary" placeholder="Select date end">
            </div>
        </div>
        @error('start_date')
        <span class="text-red-800">{{$message}}</span>
        @enderror
        @error('end_date')
        <span class="text-red-800">{{$message}}</span>
        @enderror
    </div>

    @elseif($currentStep===2)
    <div class="mb-5">
        <label for="desc" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description / Business Process Flow / Changes Made</label>
        <textarea id="desc" wire:model="desc" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-bsi-primary focus:border-bsi-primary dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-bsi-primary dark:focus:border-bsi-primary" placeholder="Give Description"></textarea>
        @error('desc')
        <span class="text-red-800">{{$message}}</span>
        @enderror
    </div>
    <div class="mb-5">
        <label for="scope-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Scope of Testing</label>
        <input type="text" wire:model="scope" id="scope-input" placeholder="Scope" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-bsi-primary focus:border-bsi-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-bsi-primary dark:focus:border-bsi-primary">
        @error('scope')
        <span class="text-red-800">{{$message}}</span>
        @enderror
    </div>

    @elseif($currentStep===3)
    <div class="mb-5">
        <label for="env-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Test Environment</label>
        <input type="text" wire:model="env" id="env-input" placeholder="Test Environment" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-bsi-primary focus:border-bsi-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-bsi-primary dark:focus:border-bsi-primary">
        @error('env')
        <span class="text-red-800">{{$message}}</span>
        @enderror
    </div>
    <div class="mb-5">
        <label for="credentials-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Credentials</label>
        <input type="text" wire:model="credentials" value="{{ $credentials }}" id="credentials-input" placeholder="Credentials" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-bsi-primary focus:border-bsi-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-bsi-primary dark:focus:border-bsi-primary">
        @error('credentials')
        <span class="text-red-800">{{$message}}</span>
        @enderror
    </div>
    <div class="mb-5">
        <label for="other-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Other Notes</label>
        <input type="text" wire:model="other_notes" id="other-input" placeholder="Other notes" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-bsi-primary focus:border-bsi-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-bsi-primary dark:focus:border-bsi-primary">
        @error('other')
        <span class="text-red-800">{{$message}}</span>
        @enderror
    </div>

    @if($project->test_level->type == 'UAT')
    <div class="mb-5">
        <label for="sat-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">SAT Process (UAT)</label>
        <input type="text" wire:model="sat_process" id="sat-input" placeholder="SAT Process" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-bsi-primary focus:border-bsi-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-bsi-primary dark:focus:border-bsi-primary">
        @error('sat_process')
        <span class="text-red-800">{{$message}}</span>
        @enderror
    </div>
    <div class="mb-5">
        <label for="retest-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Retesting (UAT)</label>
        <input type="text" wire:model="retesting" id="restest-input" placeholder="Retesting" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-bsi-primary focus:border-bsi-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-bsi-primary dark:focus:border-bsi-primary">
        @error('retesting')
        <span class="text-red-800">{{$message}}</span>
        @enderror
    </div>
    @endif

    @elseif($currentStep===4)
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
    @elseif($currentStep===5)
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
                @error('user_name')
                <span class="text-red-800">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-5 w-full">
                <label for="unit-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Unit</label>
                <input type="text" wire:model="users.{{ $index }}.unit" id="unit-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-bsi-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-bsi-primary">
                @error('unit')
                <span class="text-red-800">{{$message}}</span>
                @enderror
            </div>
            @if($project->test_level->type == 'UAT' || $project->test_level->type == 'PIR')
            <div class="mb-5 w-full">
                <label for="group-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Group (UAT)</label>
                <input type="text" wire:model="users.{{ $index }}.group" id="unit-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-bsi-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-bsi-primary">
                @error('group')
                <span class="text-red-800">{{$message}}</span>
                @enderror
            </div>
            @endif
            <div class="mb-5 w-full">
                <label for="telephone-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Telephone</label>
                <input type="number" wire:model="users.{{ $index }}.telephone" id="telephone-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-bsi-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-bsi-primary">
                @error('telephone')
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

    @elseif($currentStep===6)
    <div class="flex justify-between space-x-2 w-full">
        <div class="flex flex-row gap-2 order-last">
            <button wire:click="addScenario" class="bg-bsi-primary px-2.5 py-2 text-sm text-white rounded-lg hover:bg-teal-600 focus:ring-4 focus:ring-teal-300 dark:text-white dark:bg-bsi-primary">
                <i class="ph ph-plus"></i>
                <span>Tambah Skenario</span>
            </button>
            @if($this->project->scenarios()->exists())
            <a href="{{ route('scenario.show', $this->project->id) }}" wire:navigate class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                Edit Scenario-Case-Step
            </a>
            @else
            @endif
        </div>
    </div>

    <div class="relative overflow-x-auto shadow-md">
        <table id="tableTest" class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No.
                    </th>
                    <th scope="col" class="px-16 py-3">
                        Scenario
                    </th>
                    <th scope="col" class="px-24 py-3" colspan="2">
                        Test Case
                    </th>
                    <th scope="col" class="px-12 py-3">
                        Test Step ID
                    </th>
                    <th scope="col" class="px-24 py-3">
                        Test Step
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Expected Result
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Category (positive/negative)
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Severity (High/Medium/Low)
                    </th>
                    <th scope="col" class="px-6 py-3" colspan="2">
                        Status (Passed/Failed)
                    </th>
                </tr>
            </thead>
            <tbody>
                @php
                $i = 1;
                $index = 0;
                @endphp

                @foreach($this->scenarios as $scenarioIndex => $scenario)
                <tr wire:key="{{ $scenarioIndex }}">
                    <div class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $i++ }}
                        </td>
                        <td class="px-16 py-4 space-y-2">
                            <input type="text" wire:model="scenarios.{{ $scenarioIndex }}.scenario_name" id="" cols="30" rows="10" class="rounded border border-gray-200 bg-gray-100" placeholder="Scenario Name" />

                            @error('scenarios.*.scenario_name')
                            <span class="text-red-800">{{$message}}</span>
                            @enderror
                            <button wire:click="addTestCase({{ $scenarioIndex }})" class="bg-bsi-primary px-2.5 py-2 text-sm text-white rounded-lg hover:bg-teal-600 focus:ring-4 focus:ring-teal-300 dark:text-white dark:bg-bsi-primary">
                                <i class="ph ph-plus"></i>
                                <span>Tambah Test Case</span>
                            </button>
                            <button wire:click="removeScenario({{ $scenarioIndex }})" class="bg-red-400 hover:bg-red-600 px-2.5 py-2 text-sm text-white rounded-lg">Hapus</button>
                        </td>
                    </div>

                    @foreach($scenario['cases'] as $caseIndex => $case)
                <tr wire:key="case-{{ $scenarioIndex }}-{{ $caseIndex }}">
                    <td></td>
                    <td></td>
                    <td colspan="2" class="py-4 space-y-2">
                        <input type="text" wire:model="scenarios.{{ $scenarioIndex }}.cases.{{ $caseIndex }}.case" class="w-full rounded border border-gray-300" placeholder="Masukkan Case">
                        @error('case')
                        <span class="text-red-800">{{$message}}</span>
                        @enderror
                        <button wire:click="addTestStep({{ $scenarioIndex }}, {{ $caseIndex }})" class="bg-bsi-primary px-2.5 py-2 text-sm text-white rounded-lg hover:bg-teal-600 focus:ring-4 focus:ring-teal-300 dark:text-white dark:bg-bsi-primary">
                            <i class="ph ph-plus"></i>
                            <span>Tambah Test Step</span>
                        </button>
                        <button wire:click="removeCase({{ $scenarioIndex}}, {{ $caseIndex }})" class="bg-red-400 hover:bg-red-600 px-2.5 py-2 text-sm text-white rounded-lg">Hapus</button>
                    </td>
                    @foreach($case['steps'] as $stepIndex => $step)
                <tr wire:key="step-{{ $scenarioIndex }}-{{ $caseIndex }}-{{ $stepIndex }}">
                    <td></td>
                    <td></td>
                    <td colspan="2"></td>
                    <td class="px-6 py-4">
                        <input type="text" wire:model="scenarios.{{ $scenarioIndex }}.cases.{{ $caseIndex }}.steps.{{ $stepIndex }}.test_step_id" class="w-full rounded border border-gray-300" value="TS-{{ $stepIndex }}">
                        @error('test_step_id')
                        <span class="text-red-800">{{$message}}</span>
                        @enderror
                    </td>
                    <td class="px-6 py-4">
                        <textarea wire:model="scenarios.{{ $scenarioIndex }}.cases.{{ $caseIndex }}.steps.{{$stepIndex}}.test_step" cols="30" rows="10" class="rounded border border-gray-200 bg-gray-100" placeholder="Test Step"></textarea>
                        @error('test_step')
                        <span class="text-red-800">{{$message}}</span>
                        @enderror
                    </td>
                    <td class="px-6 py-4">
                        <textarea wire:model="scenarios.{{ $scenarioIndex }}.cases.{{ $caseIndex }}.steps.{{ $stepIndex }}.expected_result" cols="30" rows="10" class="rounded border border-gray-200 bg-gray-100" placeholder="Expected Result"></textarea>
                        @error('expected_result')
                        <span class="text-red-800">{{$message}}</span>
                        @enderror
                    </td>
                    <td class="px-6 py-4">
                        <label for="category">Category</label>
                        <select wire:model="scenarios.{{ $scenarioIndex }}.cases.{{ $caseIndex }}.steps.{{ $stepIndex }}.category" class="w-full bg-white border border-gray-200 rounded-lg">
                            <option value="">Pilih</option>
                            <option value="positive">Positive</option>
                            <option value="negative">negative</option>
                        </select>
                        @error('category')
                        <span class="text-red-800">{{$message}}</span>
                        @enderror
                    </td>
                    <td class="px-6 py-4">
                        <label for="category">Severity</label>
                        <select wire:model="scenarios.{{ $scenarioIndex }}.cases.{{ $caseIndex }}.steps.{{ $stepIndex }}.severity" class="w-full bg-white border border-gray-200 rounded-lg">
                            <option value="">Pilih</option>
                            <option value="high">High</option>
                            <option value="medium">Medium</option>
                            <option value="low">Low</option>
                        </select>
                        @error('severity')
                        <span class="text-red-800">{{$message}}</span>
                        @enderror
                    </td>
                    <td class="px-6 py-4">
                        <label for="category">Status</label>
                        <select wire:model="scenarios.{{ $scenarioIndex }}.cases.{{ $caseIndex }}.steps.{{ $stepIndex }}.status" class="w-full bg-white border border-gray-200 rounded-lg">
                            <option value="">Pilih</option>
                            <option value="passed">Passed</option>
                            <option value="failed">Failed</option>
                        </select>
                        @error('status')
                        <span class="text-red-800">{{$message}}</span>
                        @enderror
                    </td>
                    <td class="px-6 py-4">
                        <button wire:click="removeStep({{ $scenarioIndex }}, {{ $caseIndex }}, {{ $stepIndex }})" class="bg-red-400 hover:bg-red-600 px-2.5 py-2 text-sm text-white rounded-lg">Hapus</button>
                    </td>
                </tr>
                @endforeach

                </tr>
                @endforeach

                </tr>
                @endforeach

                <livewire:Project.ScenarioComponent :id="$this->project->id" />
            </tbody>
        </table>
    </div>

    @elseif($currentStep===7)
    <div class="relative overflow-x-auto mb-5 rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-900 uppercase bg-white dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Document Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Availability
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Remarks
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-white dark:bg-gray-800">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        TMP
                    </th>
                    <td class="px-6 py-4">
                        <select wire:model="tmp" id="tmp" class="rounded-full bg-gray-100 border-0 text-gray-700 hover:bg-gray-300 focus:ring-2 focus:ring-teal-300 dark:bg-gray-700 dark:text-white">Select
                            <option value="{{ $tmp }}" selected>{{ $tmp }}</option>
                            <option value="Not Available">Not Available</option>
                            <option value="Available">Available</option>
                        </select>
                        @error('tmp')
                        <span class="text-red-800">{{$message}}</span>
                        @enderror
                    </td>
                    <td class="px-6 py-4">
                        <input type="text" wire:model="tmp_remark" class="bg-gray-100 w-full rounded border border-gray-300 dark:bg-gray-700 focus:outline-none focus:ring-teal-300 dark:border-gray-700 dark:focus:outline-none dark:focus:ring-teal-300">
                        @error('tmp_remark')
                        <span class="text-red-800">{{$message}}</span>
                        @enderror
                    </td>
                </tr>
                <tr class="bg-white dark:bg-gray-800">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Updated UAT
                    </th>
                    <td class="px-6 py-4">
                        <select wire:model="updated_uat" id="updated_uat" class="rounded-full bg-gray-100 border-0 text-gray-700 hover:bg-gray-300 focus:ring-2 focus:ring-teal-300 dark:bg-gray-700 dark:text-white">Select
                            <option value="{{ $updated_uat }}" selected>{{ $updated_uat }}</option>
                            <option value="Not Available">Not Available</option>
                            <option value="Available">Available</option>
                        </select>
                        @error('updated_uat')
                        <span class="text-red-800">{{$message}}</span>
                        @enderror
                    </td>
                    <td class="px-6 py-4">
                        <input type="text" wire:model="updated_remark" class="bg-gray-100 w-full rounded border border-gray-300 dark:bg-gray-700 focus:outline-none focus:ring-teal-300 dark:border-gray-700 dark:focus:outline-none dark:focus:ring-teal-300">
                        @error('updated_remark')
                        <span class="text-red-800">{{$message}}</span>
                        @enderror
                    </td>
                </tr>
                <tr class="bg-white dark:bg-gray-800">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        UAT Result
                    </th>
                    <td class="px-6 py-4">
                        <select wire:model="uat_result" id="uat_result" class="rounded-full bg-gray-100  border-0 text-gray-700 hover:bg-gray-300 focus:ring-2 focus:ring-teal-300 dark:bg-gray-700 dark:text-white">Select
                            <option value="{{ $uat_result }}" selected>{{ $uat_result }}</option>
                            <option value="Not Available">Not Available</option>
                            <option value="Available">Available</option>
                        </select>
                        @error('uat_result')
                        <span class="text-red-800">{{$message}}</span>
                        @enderror
                    </td>
                    <td class="px-6 py-4">
                        <input type="text" wire:model="uat_remark" class="bg-gray-100 w-full rounded border border-gray-300 dark:bg-gray-700 focus:outline-none focus:ring-teal-300 dark:border-gray-700 dark:focus:outline-none dark:focus:ring-teal-300">
                        @error('uat_remark')
                        <span class="text-red-800">{{$message}}</span>
                        @enderror
                    </td>
                </tr>
                <tr class="bg-white dark:bg-gray-800">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        UAT Attendance
                    </th>
                    <td class="px-6 py-4">
                        <select wire:model="uat_attendance" id="uat_attendance" class="rounded-full bg-gray-100 border-0 text-gray-700 hover:bg-gray-300 focus:ring-2 focus:ring-teal-300 dark:bg-gray-700 dark:text-white">Select
                            <option value="{{ $uat_attendance }}" selected>{{ $uat_attendance }}</option>
                            <option value="Not Available">Not Available</option>
                            <option value="Available">Available</option>
                        </select>
                        @error('uat_attendance')
                        <span class="text-red-800">{{$message}}</span>
                        @enderror
                    </td>
                    <td class="px-6 py-4">
                        <input type="text" wire:model="uat_attendance_remark" class="bg-gray-100 w-full rounded border border-gray-300 dark:bg-gray-700 focus:outline-none focus:ring-teal-300 dark:border-gray-700 dark:focus:outline-none dark:focus:ring-teal-300">
                    </td>
                </tr>
                <tr class="bg-white dark:bg-gray-800">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Other
                    </th>
                    <td class="px-6 py-4">
                        <select wire:model="other" id="other" class="rounded-full bg-gray-100 border-0 text-gray-700 hover:bg-gray-300 focus:ring-2 focus:ring-teal-300 dark:bg-gray-700 dark:text-white">Select
                            <option value="{{ $other }}" selected>{{ $other }}</option>
                            <option value="Not Available">Not Available</option>
                            <option value="Available">Available</option>
                        </select>
                        @error('status')
                        <span class="text-red-800">{{$message}}</span>
                        @enderror
                    </td>
                    <td class="px-6 py-4">
                        <input type="text" wire:model="other_remark" class="bg-gray-100 w-full rounded border border-gray-300 dark:bg-gray-700 focus:outline-none focus:ring-teal-300 dark:border-gray-700 dark:focus:outline-none dark:focus:ring-teal-300">
                        @error('other_remark')
                        <span class="text-red-800">{{$message}}</span>
                        @enderror
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    @endif

    <div class="flex justify-between">
        @if($currentStep > 1)
        <button wire:click="decrementSteps" class="order-first bg-gray-800 px-6 py-2.5 rounded text-white hover:bg-teal-700 focus:ring-4 focus:ring-teal-400">Previous</button>
        @endif

        @if($currentStep < $total_steps) @if($currentStep===4) <button wire:click="incrementSteps" class="bg-bsi-primary px-6 py-2.5 rounded text-white hover:bg-teal-700 focus:ring-4 focus:ring-teal-400">Create Project & Next</button>
            @elseif($currentStep===5)
            <button wire:click="incrementSteps" class="bg-bsi-primary px-6 py-2.5 rounded text-white hover:bg-teal-700 focus:ring-4 focus:ring-teal-400">Add Members & Next</button>
            @elseif($currentStep===6)
            <button wire:click="incrementSteps" class="bg-bsi-primary px-6 py-2.5 rounded text-white hover:bg-teal-700 focus:ring-4 focus:ring-teal-400">Save Test & Next</button>

            @else
            <button wire:click.prevent="incrementSteps" class="order-last bg-bsi-primary px-6 py-2.5 rounded text-white hover:bg-teal-700 focus:ring-4 focus:ring-teal-400">Next</button>
            @endif

            @endif

            @if($currentStep === $total_steps)
            <input type="hidden" wire:model="is_generated" value="Generated">
            <input type="hidden" wire:model="published" value="published">
            <div>
                <button wire:click="store" type="button" class="bg-transparent border border-bsi-primary px-6 py-2.5 rounded text-bsi-primary hover:bg-teal-700 hover:text-white hover:border-teal-700 focus:ring-4 focus:ring-teal-400">Simpan</button>
                <button wire:click="generate" type="submit" class="bg-bsi-primary px-6 py-2.5 rounded text-white hover:bg-teal-700 focus:ring-4 focus:ring-teal-400">Cetak</button>
            </div>
            @endif
    </div>
</div>