<form>
    <div class="py-2">
        <button wire:click="$refresh" class="text-white bg-gray-900 hover:bg-black focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-bsi-primary dark:hover:bg-teal-700 dark:focus:ring-teal-800">Refresh</button>
    </div>
    @if($editMode)
    @include('livewire.scenario.edit-scenario')
    @endif
    @php $scenarioNumber = 0; @endphp
    @foreach($this->project->scenarios as $recentScIndex => $recentScenario)
    @php
    $scenarioNumber++;
    $totalSteps = 0;
    foreach($recentScenario->cases as $cs)
    $totalSteps += $cs->step->count();

    $isFirstRow = true;
    $isLastRow = true;
    @endphp

    @foreach($recentScenario->cases as $recentCaseIndex => $recentCase)

    @php
    $rowCount = $recentCase->step->count();
    @endphp

    @foreach($recentCase->step as $recentStepIndex => $recentStep)
    <tr wire:key="{{ $recentScenario->id }}">
        @if ($isFirstRow)
        <td class="border border-white dark:border-gray-800 text-center" rowspan="{{ $totalSteps }}">{{ $scenarioNumber }}</td>
        <td class="border border-white dark:border-gray-800 text-center" rowspan="{{ $totalSteps }}">
            <input type="hidden" wire:model="id" value="{{ $recentScenario->id }}">
            {{ $recentScenario->scenario_name }}
            @error('recentScenario.*.scenario_name')
            <span class="text-red-800">{{$message}}</span>
            @enderror
        </td>
        @php $isFirstRow = false; @endphp
        @endif


        @if ($recentStepIndex === 0)
        <td wire:click="{{ $recentCase->id }}" class="border border-white dark:border-gray-800 text-center" rowspan="{{ $rowCount }}" colspan="2">
            {{ $recentCase->case }}
            <button wire:click="destroy_case({{ $recentCase->id }})" wire:confirm="Are your sure want to delete {{ $recentScenario->scenario_name }}" class="text-red-600 hover:underline">Delete Case</button>

        </td>
        @endif
        <div wire:key="{{ $recentStep->id }}">
            <td class="border border-white dark:border-gray-800 text-center">{{ $recentStep->test_step_id }}</td>
            <td class="border border-white dark:border-gray-800 text-center">
                {{ $recentStep->test_step }}
                <button wire:click="destroy_step({{ $recentStep->id }})" wire:confirm="Are your sure want to delete {{ $recentStep->test_step }}" class="text-red-600 hover:underline">Delete Step</button>

            </td>
            <td class="border border-white dark:border-gray-800 text-center">
                {{ $recentStep->expected_result }}
            </td>
            <td class="border border-white dark:border-gray-800">
                <select wire:model="category[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-bsi-primary focus:border-bsi-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500">
                    <option value="">{{ $recentStep->category }}</option>
                    <option value="positive">Positive</option>
                    <option value="negative">negative</option>
                </select>
            </td>
            <td class="border border-white dark:border-gray-800">
                <select wire:model="severity[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-bsi-primary focus:border-bsi-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500">
                    <option value="{{ $recentStep->severity }}">{{ $recentStep->severity }}</option>
                    <option value="high">High</option>
                    <option value="medium">Medium</option>
                    <option value="low">Low</option>
                </select>
            </td>
            <td class="border border-white dark:border-gray-800" colspan="2">
                <select wire:model="status[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-bsi-primary focus:border-bsi-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500">
                    <option value="{{ $recentStep->status }}">{{ $recentStep->status }}</option>
                    <option value="passed">Passed</option>
                    <option value="failed">Failed</option>
                </select>
            </td>
        </div>
        @if ($isLastRow)
        <td class="border border-white dark:border-gray-800" rowspan="{{ $totalSteps }}">
            <button wire:click="deleteTest({{ $recentScenario->id }})" wire:confirm="Are your sure want to delete {{ $recentScenario->scenario_name }}" class="text-red-600 hover:underline">Delete Test</button>
        </td>
        @php $isLastRow = false; @endphp

        @endif
    </tr>
    @endforeach
    @endforeach
    @endforeach
</form>