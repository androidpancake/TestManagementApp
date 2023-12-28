<div class="pt-4 flex flex-col w-full h-fit space-y-2">
    <livewire:head title="{{ $title }}" description="{{ $description }}" />

    <section>
        <!-- project -->
        <div class="mb-5">
            <label for="name-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Project Name/AM Code</label>
            <input type="text" wire:model.live="name" id="name-input" value="{{ $project->name }}" placeholder="Masukkan Nama Project" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            @error('name')
            <span class="text-red-800">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-5">
            <label for="jira-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">JIRA Code</label>
            <input type="text" wire:model.live="jira_code" id="jira-input" value="{{ $project->jira_code }}" placeholder="Masukkan Kode JIRA" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            @error('jira_code')
            <span class="text-red-800">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-5">
            <label for="test_level" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Test Level</label>
            <!-- <input type="text" wire:model="test_level" id="test-level" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"> -->
            <select wire:model.debounce.800ms="test_level" id="test_level" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="{{ $project->test_level }}">Pilih</option>
            </select>
            @error('test_level')
            <span class="text-red-800">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-5">
            <label for="test_type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Test Type</label>
            <input wire:model="test_type" id="test_type" type="text" value="{{ $project->test_type }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
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
                    <input wire:model.live="start_date" type="date" value="{{ $project->start_date }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date start">
                </div>
                <span class="mx-4 text-gray-500">to</span>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                        </svg>
                    </div>
                    <input wire:model.live="end_date" type="date" value="{{ $project->end_date }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date end">
                </div>
            </div>
            @error('start_date')
            <span class="text-red-800">{{$message}}</span>
            @enderror
            @error('end_date')
            <span class="text-red-800">{{$message}}</span>
            @enderror
        </div>
    </section>

    <!-- desc & scope -->
    <section>
        <div class="mb-5">
            <label for="desc" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description / Business Process Flow / Changes Made</label>
            <textarea id="desc" wire:model="desc" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Give Description">{{ $project->desc }}</textarea>
            @error('desc')
            <span class="text-red-800">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-5">
            <label for="scope-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Scope of Testing</label>
            <input type="text" wire:model="scope" id="scope-input" value="{{ $project->scope }}" placeholder="Scope" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            @error('scope')
            <span class="text-red-800">{{$message}}</span>
            @enderror
        </div>
    </section>

    <section>
        <div class="mb-5">
            <label for="env-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Test Environment</label>
            <input type="text" wire:model="env" id="env-input" value="{{ $project->env }}" placeholder="Test Environment" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            @error('env')
            <span class="text-red-800">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-5">
            <label for="issue-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Defect Issue Found</label>
            <input type="text" wire:model="issue" id="issue-input" value="{{ $project->issue }}" placeholder="Issue Found" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            @error('issue')
            <span class="text-red-800">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-5">
            <label for="credentials-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Credentials</label>
            <input type="text" wire:model="credentials" id="credentials-input" value="{{ $project->credentials }}" placeholder="Credentials" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            @error('credentials')
            <span class="text-red-800">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-5">
            <label for="other-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Other Notes</label>
            <input type="text" wire:model="other" id="other-input" value="{{ $project->other }}" placeholder="Other notes" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            @error('other')
            <span class="text-red-800">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-5">
            <label for="retest-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Retesting</label>
            <input type="text" wire:model="retesting" id="restest-input" value="{{ $project->retesting }}" placeholder="Other notes" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            @error('retesting')
            <span class="text-red-800">{{$message}}</span>
            @enderror
        </div>
    </section>

    <section>
        <livewire:head title="Members" description="Anggota" />
        <div class="flex flex-col gap-2 mt-4">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rounded rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Nama
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Unit
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Telephone
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($members as $data)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-6 py-4">{{ $data->user_name }}</td>
                            <td class="px-6 py-4">{{ $data->unit }}</td>
                            <td class="px-6 py-4">{{ $data->telephone }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <section>
        <livewire:head title="Scenario" description="Scenario, Cases, Steps" />
        <div class="relative overflow-x-auto shadow-md sm:rounded-t-lg">

            @foreach($scenarios as $scenario)
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-2 py-3">
                            No.
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Scenario
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Test Case
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Test Step ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Test Step
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Expected Result
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Category
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Severity
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($)
                </tbody>
            </table>
            @endforeach
        </div>
    </section>
</div>