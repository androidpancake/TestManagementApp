<div>
    <div class="max-w-lg mx-auto my-5 items-center min-h-screen">
        <div class="flex flex-col gap-2">
            <div class="bg-white p-2 rounded-lg mb-2 dark:bg-gray-800">
                @foreach($this->project->scenarios as $sIndex => $scenario)
                <div class="flex items-center gap-2 mb-3">
                    <div class="w-full gap-2">
                        <label for="scenario" class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Scenarios {{ $sIndex }}</label>
                        <input type="text" wire:model="scenarios.{{ $sIndex }}.scenario_name" value="{{ $scenario->scenario_name }}" id="scenario" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-bsi-primary focus:border-bsi-primary dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-bsi-primary dark:focus:border-bsi-primary">
                    </div>
                    <div>
                        <button wire:click="deleteScenario('{{ $this->project->id }}')" class="p-2 hover:rounded-full hover:bg-gray-100 focus:ring-4 focus:ring-gray-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-red-600" fill="currentColor" viewBox="0 0 256 256">
                                <path d="M216,48H176V40a24,24,0,0,0-24-24H104A24,24,0,0,0,80,40v8H40a8,8,0,0,0,0,16h8V208a16,16,0,0,0,16,16H192a16,16,0,0,0,16-16V64h8a8,8,0,0,0,0-16ZM96,40a8,8,0,0,1,8-8h48a8,8,0,0,1,8,8v8H96Zm96,168H64V64H192ZM112,104v64a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Zm48,0v64a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Z"></path>
                            </svg>
                        </button>
                    </div>
                </div>
                @error('scenarios.*.scenario_name')
                <span class="text-red-800">{{$message}}</span>
                @enderror

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