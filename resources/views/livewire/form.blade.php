<div class="pt-4 flex flex-col w-full h-screen space-y-2">
    <div class="w-full justify-start">
        <div id="title" class="font-semibold text-lg text-gray-900 uppercase dark:text-gray-100">{{ $title }}</div>
        <div id="subtitle" class="font-base text-sm text-gray-700 dark:text-gray-200">{{ $description }}</div>
    </div>
    <div class="flex justify-start">
        <div class="bg-bsi-primary p-2 rounded-full text-sm text-white">{{ $currentStep }} out of {{ $total_steps }}</div>
    </div>
    <!-- <form wire:submit="submit"> -->
    @if($currentStep===1)
    <div class="mb-5">
        <label for="name-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Project Name/AM Code</label>
        <input type="text" wire:model.live="name" id="name-input" placeholder="Masukkan Nama Project" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        @error('name')
        <span class="text-red-800">{{$message}}</span>
        @enderror
    </div>
    <div class="mb-5">
        <label for="jira-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">JIRA Code</label>
        <input type="text" wire:model.live="jira_code" id="jira-input" placeholder="Masukkan Kode JIRA" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        @error('jira_code')
        <span class="text-red-800">{{$message}}</span>
        @enderror
    </div>
    <div class="mb-5">
        <label for="test_level" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Test Level</label>
        <!-- <input type="text" wire:model="test_level" id="test-level" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"> -->
        <select wire:model.debounce.800ms="test_level" id="test_level" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option value="">Pilih</option>
            @foreach($test_lv as $data)
            <option value="{{ $data->type }}">{{ $data->type }}</option>
            @endforeach
        </select>
        @error('test_level')
        <span class="text-red-800">{{$message}}</span>
        @enderror
    </div>
    <div class="mb-5">
        <label for="test_type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Test Type</label>
        <input wire:model="test_type" id="test_type" type="text" value="{{ $test_type }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
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
                <input wire:model.live="start_date" type="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date start">
            </div>
            <span class="mx-4 text-gray-500">to</span>
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                    </svg>
                </div>
                <input wire:model.live="end_date" type="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date end">
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
        <textarea id="desc" wire:model="desc" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Give Description"></textarea>
        @error('desc')
        <span class="text-red-800">{{$message}}</span>
        @enderror
    </div>
    <div class="mb-5">
        <label for="scope-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Scope of Testing</label>
        <input type="text" wire:model="scope" id="scope-input" placeholder="Scope" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        @error('scope')
        <span class="text-red-800">{{$message}}</span>
        @enderror
    </div>
    @elseif($currentStep===3)
    <div class="mb-5">
        <label for="env-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Test Environment</label>
        <input type="text" wire:model="env" id="env-input" placeholder="Test Environment" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        @error('env')
        <span class="text-red-800">{{$message}}</span>
        @enderror
    </div>
    <div class="mb-5">
        <label for="issue-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Defect Issue Found</label>
        <input type="text" wire:model="issue" id="issue-input" placeholder="Issue Found" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        @error('issue')
        <span class="text-red-800">{{$message}}</span>
        @enderror
    </div>
    <div class="mb-5">
        <label for="credentials-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Credentials</label>
        <input type="text" wire:model="credentials" id="credentials-input" placeholder="Credentials" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        @error('credentials')
        <span class="text-red-800">{{$message}}</span>
        @enderror
    </div>
    <div class="mb-5">
        <label for="other-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Other Notes</label>
        <input type="text" wire:model="other" id="other-input" placeholder="Other notes" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        @error('other')
        <span class="text-red-800">{{$message}}</span>
        @enderror
    </div>
    <div class="mb-5">
        <label for="sat-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Other Notes</label>
        <input type="text" wire:model="sat_process" id="sat-input" placeholder="Other notes" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        @error('sat_process')
        <span class="text-red-800">{{$message}}</span>
        @enderror
    </div>
    <div class="mb-5">
        <label for="retest-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Retesting</label>
        <input type="text" wire:model="retesting" id="restest-input" placeholder="Other notes" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        @error('retesting')
        <span class="text-red-800">{{$message}}</span>
        @enderror
    </div>
    @elseif($currentStep===4)
    <div class="w-full flex justify-end">
        <button wire:click="addUser" id="addUser" type="button" class="text-white bg-bsi-primary hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center me-2 dark:bg-bsi-primary dark:hover:bg-teal-700 dark:focus:ring-teal-800">
            <i class="ph ph-plus"></i>
            <span class="sr-only">Icon description</span>
        </button>
    </div>
    <div class="flex flex-col gap-2">
        @foreach($this->users as $index => $user)
        <div wire:key="{{ $index }}" id="forms" class="flex flex-row gap-2 w-full bg-white p-2 rounded-lg dark:border-2 dark:border-gray-600 dark:bg-gray-800">
            <div class="mb-5 w-full">
                <label for="name-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                <input type="text" wire:model="users.{{ $index }}.user_name" id="name-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-blue-500">
                @error('user_name')
                <span class="text-red-800">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-5 w-full">
                <label for="unit-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Unit</label>
                <input type="text" wire:model="users.{{ $index }}.unit" id="unit-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-blue-500">
                @error('unit')
                <span class="text-red-800">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-5 w-full">
                <label for="telephone-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Telephone</label>
                <input type="number" wire:model="users.{{ $index }}.telephone" id="telephone-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-blue-500">
                @error('telephone')
                <span class="text-red-800">{{$message}}</span>
                @enderror
            </div>
            <div>
                <button wire:click="removeUser({{ $index }})" id="minUser" type="button" class="text-white bg-red-400 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center me-2 dark:bg-bsi-primary dark:hover:bg-teal-700 dark:focus:ring-teal-800 dark:bg-red-800">
                    <i class="ph ph-minus"></i>
                    <span class="sr-only">Icon description</span>
                </button>
            </div>
        </div>
        @endforeach
    </div>
    @elseif($currentStep===5)
    <div class="flex justify-end w-full">
        <button class="bg-bsi-primary px-2.5 py-2 rounded text-sm text-white rounded-lg hover:bg-teal-600 focus:ring-4 focus:ring-teal-300 dark:text-white dark:bg-bsi-primary">
            <i class="ph ph-plus"></i>
            <span>Tambah Skenario</span>
        </button>
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table id="tableTest" class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No.
                    </th>
                    <th scope="col" class="px-16 py-3">
                        Scenario
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
                    <th scope="col" class="px-6 py-3">
                        Status (Passed/Failed)
                    </th>
                    <th scope="col" class="px-6 py-3">
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        1
                    </th>
                    <td class="px-6 py-4">
                        <textarea name="scenario_name" id="" cols="30" rows="10" class="rounded border border-gray-200 bg-gray-100"></textarea>
                    </td>
                    <td class="px-6 py-4">
                        <input type="text" name="test_case_id" class="w-full rounded border border-gray-300" value="">
                    </td>
                    <td class="px-6 py-4">
                        <textarea name="test_step" id="" cols="30" rows="10" class="rounded border border-gray-200 bg-gray-100"></textarea>
                    </td>
                    <td class="px-6 py-4">
                        <textarea name="expected" id="" cols="30" rows="10" class="rounded border border-gray-200 bg-gray-100"></textarea>
                    </td>
                    <td class="px-6 py-4">
                        <select name="" id="" class="w-full bg-white border border-gray-200 rounded-lg">
                            <option value="">Positive</option>
                            <option value="">negative</option>
                        </select>
                    </td>
                    <td class="px-6 py-4">
                        <select name="" id="" class="w-full bg-white border border-gray-200 rounded-lg">
                            <option value="">High</option>
                            <option value="">Medium</option>
                            <option value="">Low</option>
                        </select>
                    </td>
                    <td class="px-6 py-4">
                        <select name="" id="" class="w-full bg-white border border-gray-200 rounded-lg">
                            <option value="">Passed</option>
                            <option value="">Failed</option>
                        </select>
                    </td>
                    <td class="inline-flex gap-2 px-6 py-4">
                        <button onclick="" href="#" class="bg-bsi-primary px-2.5 py-2 rounded-full hover:bg-teal-600 focus:ring-4 focus:ring-teal-300">
                            <i class="ph ph-plus w-4 h-4 text-white"></i>
                        </button>
                        <button onclick="" href="#" class="bg-red-400 px-2.5 py-2 rounded-full hover:bg-red-600 focus:ring-4 focus:ring-red-300">
                            <i class="ph ph-minus w-4 h-4 text-white"></i>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    @elseif($currentStep===6)
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
                        <select name="" id="" class="rounded-full bg-gray-100 text-gray-900 border-0 text-gray-700 hover:bg-gray-300 focus:ring-2 focus:ring-teal-300 dark:bg-gray-700 dark:text-white">Select
                            <option value="" selected>Not Available</option>
                            <option value="">Available</option>
                        </select>
                    </td>
                    <td class="px-6 py-4">
                        <input type="text" name="remarks[]" class="bg-gray-100 w-full rounded border border-gray-300 dark:bg-gray-700 focus:outline-none focus:ring-teal-300 dark:border-gray-700 dark:focus:outline-none dark:focus:ring-teal-300">
                    </td>
                </tr>
                <tr class="bg-white dark:bg-gray-800">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Updated UAT
                    </th>
                    <td class="px-6 py-4">
                        <select name="" id="" class="rounded-full bg-gray-100 text-gray-900 border-0 text-gray-700 hover:bg-gray-300 focus:ring-2 focus:ring-teal-300 dark:bg-gray-700 dark:text-white">Select
                            <option value="" selected>Not Available</option>
                            <option value="">Available</option>
                        </select>
                    </td>
                    <td class="px-6 py-4">
                        <input type="text" name="remarks[]" class="bg-gray-100 w-full rounded border border-gray-300 dark:bg-gray-700 focus:outline-none focus:ring-teal-300 dark:border-gray-700 dark:focus:outline-none dark:focus:ring-teal-300">
                    </td>
                </tr>
                <tr class="bg-white dark:bg-gray-800">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        UAT Result
                    </th>
                    <td class="px-6 py-4">
                        <select name="" id="" class="rounded-full bg-gray-100 text-gray-900 border-0 text-gray-700 hover:bg-gray-300 focus:ring-2 focus:ring-teal-300 dark:bg-gray-700 dark:text-white">Select
                            <option value="" selected>Not Available</option>
                            <option value="">Available</option>
                        </select>
                    </td>
                    <td class="px-6 py-4">
                        <input type="text" name="remarks[]" class="bg-gray-100 w-full rounded border border-gray-300 dark:bg-gray-700 focus:outline-none focus:ring-teal-300 dark:border-gray-700 dark:focus:outline-none dark:focus:ring-teal-300">
                    </td>
                </tr>
                <tr class="bg-white dark:bg-gray-800">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        UAT Attendance
                    </th>
                    <td class="px-6 py-4">
                        <select name="" id="" class="rounded-full bg-gray-100 text-gray-900 border-0 text-gray-700 hover:bg-gray-300 focus:ring-2 focus:ring-teal-300 dark:bg-gray-700 dark:text-white">Select
                            <option value="" selected>Not Available</option>
                            <option value="">Available</option>
                        </select>
                    </td>
                    <td class="px-6 py-4">
                        <input type="text" name="remarks[]" class="bg-gray-100 w-full rounded border border-gray-300 dark:bg-gray-700 focus:outline-none focus:ring-teal-300 dark:border-gray-700 dark:focus:outline-none dark:focus:ring-teal-300">
                    </td>
                </tr>
                <tr class="bg-white dark:bg-gray-800">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Other
                    </th>
                    <td class="px-6 py-4">
                        <select name="" id="" class="rounded-full bg-gray-100 text-gray-900 border-0 text-gray-700 hover:bg-gray-300 focus:ring-2 focus:ring-teal-300 dark:bg-gray-700 dark:text-white">Select
                            <option value="" selected>Not Available</option>
                            <option value="">Available</option>
                        </select>
                    </td>
                    <td class="px-6 py-4">
                        <input type="text" name="remarks[]" class="bg-gray-100 w-full rounded border border-gray-300 dark:bg-gray-700 focus:outline-none focus:ring-teal-300 dark:border-gray-700 dark:focus:outline-none dark:focus:ring-teal-300">
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

        @if($currentStep < $total_steps) @if($currentStep===3) <button wire:click="save_data_project" class="bg-bsi-primary px-6 py-2.5 rounded text-white hover:bg-teal-700 focus:ring-4 focus:ring-teal-400">Create Project & Next</button>
            @elseif($currentStep===4)
            <button wire:click="save_members" type="submit" class="bg-bsi-primary px-6 py-2.5 rounded text-white hover:bg-teal-700 focus:ring-4 focus:ring-teal-400">Add Members & Next</button>
            @else
            <button wire:click="incrementSteps" class="order-last bg-bsi-primary px-6 py-2.5 rounded text-white hover:bg-teal-700 focus:ring-4 focus:ring-teal-400">Next</button>
            @endif

            @endif

            @if($currentStep === $total_steps)
            <button wire:click="submit" class="bg-bsi-primary px-6 py-2.5 rounded text-white hover:bg-teal-700 focus:ring-4 focus:ring-teal-400">Generate</button>
            @endif
    </div>
    <!-- </form> -->
</div>