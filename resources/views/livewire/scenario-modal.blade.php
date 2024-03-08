<div id="default-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-4xl max-h-full">
        <form wire:submit.prevent="update_modal_v1" method="POST">
            @csrf
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Scenario-Case-Step
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" wire:click="$set('scenarioView', false)" data-modal-hide="default-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-2 space-y-4">
                    <div class="relative overflow-x-auto shadow-md">
                        <table class="w-full mt-4 text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-2 py-3">
                                        No.
                                    </th>
                                    <th scope="col" class="px-2 py-3">
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
                                @php $scenarioNumber = 0; @endphp
                                @forelse($project->scenarios as $scenarioIndex => $scenario)
                                @php
                                $scenarioNumber++;
                                $totalSteps = 0;
                                foreach($scenario->case as $case) {
                                $totalSteps += $case->step->count();
                                }
                                $isFirstRow = true;
                                @endphp

                                @foreach($scenario->case as $caseIndex => $case)
                                @php
                                $rowCount = $case->step->count();
                                @endphp

                                @foreach($case->step as $stepIndex => $step)
                                <tr wire:key="{{ $scenarioIndex }}" class="border border-black">

                                    @if ($isFirstRow)
                                    <td class="border border-black" rowspan="{{ $totalSteps }}">{{ $scenarioNumber }}</td>
                                    <td class="border border-black" rowspan="{{ $totalSteps }}">
                                        <input type="text" class="w-full" wire:model="scenario.{{ $scenarioIndex }}.scenario_name" value="{{ $scenario['scenario_name'] }}">
                                    </td>
                                    @php $isFirstRow = false; @endphp
                                    @endif


                                    @if ($stepIndex === 0)
                                    <td class="border border-black" rowspan="{{ $rowCount }}">
                                        <input type="text" class="w-full" wire:model="scenario.{{ $scenarioIndex }}.cases.{{ $caseIndex }}.case" value="{{ $case->case }}">
                                    </td>
                                    @endif

                                    <td class="border border-black">{{ $step->test_step_id }}</td>
                                    <td class="border border-black">
                                        <input type="text" class="w-full" wire:model="scenario.{{ $scenarioIndex }}.cases.{{ $caseIndex }}.steps.{{ $stepIndex }}.test_step" value="{{ $step->test_step }}">
                                    </td>
                                    <td class="border border-black">
                                        <input type="text" class="w-full" wire:model="scenario.{{ $scenarioIndex }}.cases.{{ $caseIndex }}.steps.{{ $stepIndex }}.expected_result" value="{{ $step['expected_result'] }}">

                                    </td>
                                    <td class="border border-black">
                                        <select wire:model="scenarios.{{ $scenarioIndex }}.cases.{{ $caseIndex }}.steps.{{ $stepIndex }}.category" class="w-full bg-white border border-gray-200 rounded-lg">
                                            <option value="">{{ $step->category }}</option>
                                            <option value="positive">Positive</option>
                                            <option value="negative">negative</option>
                                        </select>
                                    </td>
                                    <td class="border border-black">
                                        <select wire:model="scenario.{{ $scenarioIndex }}.cases.{{ $caseIndex }}.steps.{{ $stepIndex }}.severity" class="w-full bg-white border border-gray-200 rounded-lg">
                                            <option value="{{ $step->severity }}">{{ $step->severity }}</option>
                                            <option value="high">High</option>
                                            <option value="medium">Medium</option>
                                            <option value="low">Low</option>
                                        </select>
                                    </td>
                                    <td class="border border-black">
                                        <select wire:model="scenario.{{ $scenarioIndex }}.cases.{{ $caseIndex }}.steps.{{ $stepIndex }}.status" class="w-full bg-white border border-gray-200 rounded-lg">
                                            <option value="{{ $step->status }}">{{ $step->status }}</option>
                                            <option value="passed">Passed</option>
                                            <option value="failed">Failed</option>
                                        </select>
                                    </td>
                                </tr>
                                @endforeach
                                @endforeach
                                @empty
                                <tr>
                                    <td colspan="9" class="text-center">
                                        <p>Tidak ada data</p>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600 gap-2">
                    <button wire:click="$set('scenarioView', false)" data-modal-hide="default-modal" type="button" class="text-white bg-gray-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Close</button>
                    <button type="submit" class="text-white bg-bsi-primary hover:bg-teal-700 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>