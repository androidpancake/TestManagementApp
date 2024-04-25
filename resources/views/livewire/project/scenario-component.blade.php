<form>
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

    <!-- row count -->
    @php
    $rowCount = $recentCase->step->count();
    @endphp

    @foreach($recentCase->step as $recentStepIndex => $recentStep)
    <tr>
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
        <td class="border border-white dark:border-gray-800 text-center" rowspan="{{ $rowCount }}" colspan="2">
            {{ $recentCase->case }}
        </td>
        @endif

        <td class="border border-white dark:border-gray-800 text-center">{{ $recentStep->test_step_id }}</td>
        <td class="border border-white dark:border-gray-800 text-center">
            {{ $recentStep->test_step }}
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
        <td class="border border-white dark:border-gray-800">
            <button wire:click="deleteTest('{{ $recentScenario->id }}')" class="text-red-600 hover:underline">Delete Test {{ $recentScenario->id }}</button>
        </td>
    </tr>
    @endforeach
    @endforeach
    @endforeach
</form>