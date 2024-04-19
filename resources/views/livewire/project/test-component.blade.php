<div>
    <!-- <form class="max-w-lg mx-auto">
        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
            </div>
            <input wire:model="" type="search" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-bsi-primary focus:border-bsi-primary dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-bsi-primary dark:focus:border-bsi-primary" placeholder="Search Mockups, Logos..." required />
            <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-bsi-primary hover:bg-teal-700 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-teal-600 dark:hover:bg-bsi-primary dark:focus:ring-teal-700">Search</button>
        </div>
    </form> -->
    <div class="max-w-lg mx-auto my-5 items-center min-h-screen">
        <div class="flex flex-col gap-2">
            <div class="bg-white p-2 rounded-lg mb-2 dark:bg-gray-800">
                @foreach($this->project->scenarios as $sIndex => $scenario)
                <input type="hidden" wire:model="projectId" value="{{ $scenario->id }}" name="id">
                <div class="flex items-center gap-2 mb-3">
                    <div class="w-full">
                        <label for="scenario" class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Scenarios {{ $sIndex }}</label>
                        <input type="text" wire:model="scenario_name[]" value="{{ $scenario->scenario_name }}" id="scenario" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-bsi-primary focus:border-bsi-primary dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-bsi-primary dark:focus:border-bsi-primary">
                    </div>
                    <div>
                        <button wire:click="deleteScenario('{{ $this->project->id }}')" class="p-2 hover:rounded-full hover:bg-gray-100 focus:ring-4 focus:ring-gray-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-red-600" fill="currentColor" viewBox="0 0 256 256">
                                <path d="M216,48H176V40a24,24,0,0,0-24-24H104A24,24,0,0,0,80,40v8H40a8,8,0,0,0,0,16h8V208a16,16,0,0,0,16,16H192a16,16,0,0,0,16-16V64h8a8,8,0,0,0,0-16ZM96,40a8,8,0,0,1,8-8h48a8,8,0,0,1,8,8v8H96Zm96,168H64V64H192ZM112,104v64a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Zm48,0v64a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Z"></path>
                            </svg>
                        </button>
                    </div>
                </div>
                @error('scenario_name')
                <span class="text-red-800">{{$message}}</span>
                @enderror

                @foreach($scenario->case as $cIndex => $case)
                <div class="font-bold text-sm text-white">Case</div>
                <div class="flex items-center gap-2">
                    <div class="w-full mb-3">
                        <label for="case" class="block mb-2 text-sm font-normal text-gray-900 dark:text-white">Scenarios {{ $sIndex }} Case {{ $cIndex }}</label>
                        <input type="text" name="case[]" value="{{ $case->case }}" id="case" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-bsi-primary focus:border-bsi-primary dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-bsi-primary dark:focus:border-bsi-primary">
                    </div>
                    <div>
                        <button wire:click="deleteCase('{{ $this->project->id }}')" class="p-2 hover:rounded-full hover:bg-gray-100 focus:ring-4 focus:ring-gray-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-red-600" fill="currentColor" viewBox="0 0 256 256">
                                <path d="M216,48H176V40a24,24,0,0,0-24-24H104A24,24,0,0,0,80,40v8H40a8,8,0,0,0,0,16h8V208a16,16,0,0,0,16,16H192a16,16,0,0,0,16-16V64h8a8,8,0,0,0,0-16ZM96,40a8,8,0,0,1,8-8h48a8,8,0,0,1,8,8v8H96Zm96,168H64V64H192ZM112,104v64a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Zm48,0v64a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Z"></path>
                            </svg>
                        </button>
                    </div>
                </div>
                @error('case')
                <span class="text-red-800">{{$message}}</span>
                @enderror
                @foreach($case->step as $stIndex => $step)
                <div class="font-bold text-sm text-white">Step</div>
                <div class="flex items-center gap-2">

                    <div class="w-full mb-3">
                        <label for="test_step_id" class="block mb-2 text-sm font-normal text-gray-900 dark:text-white">Test Step ID {{ $step->test_step_id }}</label>
                        <input type="text" name="test_step_id[]" value="{{ $step->test_step_id }}" id="test_step_id" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-bsi-primary focus:border-bsi-primary dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-bsi-primary dark:focus:border-bsi-primary" readonly>
                    </div>
                    <div>
                        <button wire:click="deleteStep('{{ $this->project->id }}')" class="p-2 hover:rounded-full hover:bg-gray-100 focus:ring-4 focus:ring-gray-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-red-600" fill="currentColor" viewBox="0 0 256 256">
                                <path d="M216,48H176V40a24,24,0,0,0-24-24H104A24,24,0,0,0,80,40v8H40a8,8,0,0,0,0,16h8V208a16,16,0,0,0,16,16H192a16,16,0,0,0,16-16V64h8a8,8,0,0,0,0-16ZM96,40a8,8,0,0,1,8-8h48a8,8,0,0,1,8,8v8H96Zm96,168H64V64H192ZM112,104v64a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Zm48,0v64a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Z"></path>
                            </svg>
                        </button>
                    </div>
                </div>
                @error('test_step_id')
                <span class="text-red-800">{{$message}}</span>
                @enderror
                <div class="mb-3">
                    <label for="test_step_id" class="block mb-2 text-sm font-normal text-gray-900 dark:text-white">Test Step</label>
                    <input type="text" name="test_step[]" value="{{ $step->test_step }}" id="test_step" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-bsi-primary focus:border-bsi-primary dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-bsi-primary dark:focus:border-bsi-primary">
                </div>
                @error('test_step')
                <span class="text-red-800">{{$message}}</span>
                @enderror
                <div class="mb-3">
                    <label for="expected_result" class="block mb-2 text-sm font-normal text-gray-900 dark:text-white">Expected Result</label>
                    <input type="text" name="expected_result[]" value="{{ $step->expected_result }}" id="expected_result" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-bsi-primary focus:border-bsi-primary dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-bsi-primary dark:focus:border-bsi-primary">
                </div>
                @error('expected_result')
                <span class="text-red-800">{{$message}}</span>
                @enderror
                <div class="mb-3">
                    <label for="category" class="block mb-2 text-sm font-normal text-gray-900 dark:text-white">Category</label>
                    <input type="text" name="category[]" value="{{ $step->category }}" id="category" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-bsi-primary focus:border-bsi-primary dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-bsi-primary dark:focus:border-bsi-primary">
                </div>
                @error('category')
                <span class="text-red-800">{{$message}}</span>
                @enderror
                <div class="mb-3">
                    <label for="severity" class="block mb-2 text-sm font-normal text-gray-900 dark:text-white">Severity</label>
                    <input type="text" name="severity[]" value="{{ $step->severity }}" id="severity" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-bsi-primary focus:border-bsi-primary dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-bsi-primary dark:focus:border-bsi-primary">
                </div>
                @error('severity')
                <span class="text-red-800">{{$message}}</span>
                @enderror
                @endforeach
                @endforeach

                @endforeach
            </div>
            <!-- footer -->
            <div class="flex items-center border-t border-gray-300 rounded-b dark:border-gray-800 gap-2 py-4">
                <a href="{{ route('form', $project->id) }}">
                    <button type="button" class="text-white bg-gray-600 hover:bg-teal-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-bsi-primary dark:focus:ring-teal-700">Close</button>
                </a>
                <button wire:click="update" class="text-white bg-bsi-primary hover:bg-teal-700 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-bsi-primary dark:hover:bg-teal-700 dark:focus:ring-teal-800">Update</button>
            </div>
        </div>
    </div>
</div>