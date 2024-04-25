<div class="flex justify-between space-x-2 w-full">
    <div class="flex flex-row gap-2 order-last">
        <button wire:click="addScenario" class="bg-bsi-primary px-2.5 py-2 text-sm inline-flex items-center gap-2 text-white rounded-lg hover:bg-teal-600 focus:ring-4 focus:ring-teal-300 dark:text-white dark:bg-bsi-primary">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 256 256">
                <path d="M224,128a8,8,0,0,1-8,8H136v80a8,8,0,0,1-16,0V136H40a8,8,0,0,1,0-16h80V40a8,8,0,0,1,16,0v80h80A8,8,0,0,1,224,128Z"></path>
            </svg>
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
                <th scope="col" class="px-6 py-3" colspan="2">
                    Action
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

                        <button wire:click="addTestCase({{ $scenarioIndex }})" class="bg-bsi-primary px-2.5 py-2 text-sm text-white rounded-lg hover:bg-teal-600 focus:ring-4 focus:ring-teal-300 dark:text-white dark:bg-bsi-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 256 256">
                                <path d="M224,128a8,8,0,0,1-8,8H136v80a8,8,0,0,1-16,0V136H40a8,8,0,0,1,0-16h80V40a8,8,0,0,1,16,0v80h80A8,8,0,0,1,224,128Z"></path>
                            </svg> <span>Tambah Test Case</span>
                        </button>
                        <button wire:click="removeScenario({{ $scenarioIndex }})" class="bg-red-400 hover:bg-red-600 px-2.5 py-2 text-sm text-white rounded-lg">Hapus</button>
                        @error('scenarios.*.scenario_name')
                        <span class="text-red-800">{{$message}}</span>
                        @enderror
                    </td>
                </div>

                @foreach($scenario['cases'] as $caseIndex => $case)
            <tr wire:key="case-{{ $scenarioIndex }}-{{ $caseIndex }}">
                <td></td>
                <td></td>
                <td colspan="2" class="py-4 space-y-2">
                    <input type="text" wire:model="scenarios.{{ $scenarioIndex }}.cases.{{ $caseIndex }}.case" class="w-full rounded border border-gray-300" placeholder="Masukkan Case">
                    <button wire:click="addTestStep({{ $scenarioIndex }}, {{ $caseIndex }})" class="bg-bsi-primary px-2.5 py-2 text-sm text-white rounded-lg hover:bg-teal-600 focus:ring-4 focus:ring-teal-300 dark:text-white dark:bg-bsi-primary">
                        <i class="ph ph-plus"></i>
                        <span>Tambah Test Step</span>
                    </button>
                    <button wire:click="removeCase({{ $scenarioIndex}}, {{ $caseIndex }})" class="bg-red-400 hover:bg-red-600 px-2.5 py-2 text-sm text-white rounded-lg">Hapus</button>
                    @error('scenarios.*.cases.*.case')
                    <span class="text-red-800">{{$message}}</span>
                    @enderror
                </td>
                @foreach($case['steps'] as $stepIndex => $step)
            <tr wire:key="step-{{ $scenarioIndex }}-{{ $caseIndex }}-{{ $stepIndex }}">
                <td></td>
                <td></td>
                <td colspan="2"></td>
                <td class="px-6 py-4">
                    <input type="text" wire:model="scenarios.{{ $scenarioIndex }}.cases.{{ $caseIndex }}.steps.{{ $stepIndex }}.test_step_id" class="w-full rounded border border-gray-300" value="TS-{{ $stepIndex }}" readonly>
                    @error('scenarios.*.cases.*.steps.*.test_step_id')
                    <span class="text-red-800">{{$message}}</span>
                    @enderror
                </td>
                <td class="px-6 py-4">
                    <textarea wire:model="scenarios.{{ $scenarioIndex }}.cases.{{ $caseIndex }}.steps.{{$stepIndex}}.test_step" cols="30" rows="10" class="rounded border border-gray-200 bg-gray-100" placeholder="Test Step"></textarea>
                    @error('scenarios.*.cases.*.steps.*.test_step')
                    <span class="text-red-800">{{$message}}</span>
                    @enderror
                </td>
                <td class="px-6 py-4">
                    <textarea wire:model="scenarios.{{ $scenarioIndex }}.cases.{{ $caseIndex }}.steps.{{ $stepIndex }}.expected_result" cols="30" rows="10" class="rounded border border-gray-200 bg-gray-100" placeholder="Expected Result"></textarea>
                    @error('scenarios.*.cases.*.steps.*.expected_result')
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
                    @error('scenarios.*.cases.*.steps.*.category')
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
                    @error('scenarios.*.cases.*.steps.*.severity')
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
                    @error('scenarios.*.cases.*.steps.*.status')
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