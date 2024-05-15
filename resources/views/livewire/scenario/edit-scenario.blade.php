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

    @php
    $rowCount = $recentCase->step->count();
    @endphp

    @foreach($recentCase->step as $recentStepIndex => $recentStep)
    <tr>
        @if ($isFirstRow)
        <td class="border border-white dark:border-gray-800 text-center" rowspan="{{ $totalSteps }}">{{ $scenarioNumber }}</td>
        <td class="border border-white dark:border-gray-800 text-center" rowspan="{{ $totalSteps }}">
            <input type="hidden" wire:model="id" value="{{ $recentScenario->id }}">
            <input type="text" value="{{ $recentScenario->scenario_name }}">
            @error('recentScenario.*.scenario_name')
            <span class="text-red-800">{{$message}}</span>
            @enderror
        </td>
        @php $isFirstRow = false; @endphp
        @endif

        @if ($isLastRow)
        <td class="border border-white dark:border-gray-800" rowspan="{{ $totalSteps }}">
            <button wire:click="update" wire:confirm="Are your sure want to delete {{ $recentScenario->scenario_name }}" class="text-red-600 hover:underline">Delete Test {{ $recentScenario->id }}</button>
        </td>
        <td class="border border-white dark:border-gray-800" rowspan="{{ $totalSteps }}">
            <button wire:click="cancel" class="text-gray-600 hover:underline">Update Test {{ $recentScenario->id }}</button>
        </td>
        @php $isLastRow = false; @endphp

        @endif
    </tr>
    @endforeach
    @endforeach
    @endforeach
</form>