<form action="{{ route('scenario.update', $project->id ) }}" method="POST">
    @csrf
    @method('PUT')
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
                    <th scope="col" class="px-6 py-3">
                        Action
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
                        <input type="text" class="w-full" name="scenario_name[]" wire:model="scenario.{{ $scenarioIndex }}.scenario_name" value="{{ $scenario->scenario_name }}">
                    </td>
                    @php $isFirstRow = false; @endphp
                    @endif


                    @if ($stepIndex === 0)
                    <td class="border border-black" rowspan="{{ $rowCount }}">
                        <input type="text" class="w-full" name="case[]" wire:model="scenario.{{ $scenarioIndex }}.cases.{{ $caseIndex }}.case" value="{{ $case->case }}">
                    </td>
                    @endif

                    <td class="border border-black">{{ $step->test_step_id }}</td>
                    <td class="border border-black">
                        <input type="text" class="w-full" name="test_step[]" wire:model="scenario.{{ $scenarioIndex }}.cases.{{ $caseIndex }}.steps.{{ $stepIndex }}.test_step" value="{{ $step->test_step }}">
                    </td>
                    <td class="border border-black">
                        <input type="text" class="w-full" name="expected_result[]" wire:model="scenario.{{ $scenarioIndex }}.cases.{{ $caseIndex }}.steps.{{ $stepIndex }}.expected_result" value="{{ $step['expected_result'] }}">

                    </td>
                    <td class="border border-black">
                        <select name="category[]" wire:model="scenarios.{{ $scenarioIndex }}.cases.{{ $caseIndex }}.steps.{{ $stepIndex }}.category" class="w-full bg-white border border-gray-200 rounded-lg">
                            <option value="">{{ $step->category }}</option>
                            <option value="positive">Positive</option>
                            <option value="negative">negative</option>
                        </select>
                    </td>
                    <td class="border border-black">
                        <select name="severity[]" wire:model="scenario.{{ $scenarioIndex }}.cases.{{ $caseIndex }}.steps.{{ $stepIndex }}.severity" class="w-full bg-white border border-gray-200 rounded-lg">
                            <option value="{{ $step->severity }}">{{ $step->severity }}</option>
                            <option value="high">High</option>
                            <option value="medium">Medium</option>
                            <option value="low">Low</option>
                        </select>
                    </td>
                    <td class="border border-black">
                        <select name="status[]" wire:model="scenario.{{ $scenarioIndex }}.cases.{{ $caseIndex }}.steps.{{ $stepIndex }}.status" class="w-full bg-white border border-gray-200 rounded-lg">
                            <option value="{{ $step->status }}">{{ $step->status }}</option>
                            <option value="passed">Passed</option>
                            <option value="failed">Failed</option>
                        </select>
                    </td>
                    <td class="border border-black">
                        <a href="{{ route('scenario.show', $project->id) }}">tes</a>
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
    <!-- Modal footer -->
    <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600 gap-2">
        <button wire:click="$set('scenarioView', false)" data-modal-hide="default-modal" type="button" class="text-white bg-gray-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Close</button>
        <!-- <button type="submit" class="text-white bg-bsi-primary hover:bg-teal-700 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button> -->
    </div>
</form>