@extends('base.app')
@section('content')
@if($project->scenarios)

<form action="{{ route('scenario.update', $project->id ) }}" method="POST" class="max-w-lg mx-auto min-h-screen" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="flex flex-col">
        <div class="bg-white p-2 rounded-lg mb-2">
            @foreach($project->scenarios as $sIndex => $scenario)
            <!-- <input type="hidden" value="{{ $scenario->id }}" name="id"> -->
            <div class="mb-3">
                <label for="scenario" class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Scenarios {{ $sIndex }}</label>
                <input type="text" name="scenario_name[]" value="{{ $scenario->scenario_name }}" id="scenario" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            @error('scenario_name')
            <span class="text-red-800">{{$message}}</span>
            @enderror

            @foreach($scenario->case as $cIndex => $case)
            <div class="font-bold text-sm">Case</div>
            <div class="mb-3">
                <label for="case" class="block mb-2 text-sm font-normal text-gray-900 dark:text-white">Scenarios {{ $sIndex }} Case {{ $cIndex }}</label>
                <input type="text" name="case[]" value="{{ $case->case }}" id="case" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            @error('case')
            <span class="text-red-800">{{$message}}</span>
            @enderror
            @foreach($case->step as $stIndex => $step)
            <div class="font-bold text-sm">Step</div>

            <div class="mb-3">
                <label for="test_step_id" class="block mb-2 text-sm font-normal text-gray-900 dark:text-white">Test Step ID {{ $step->test_step_id }}</label>
                <input type="text" name="test_step_id[]" value="{{ $step->test_step_id }}" id="test_step_id" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" readonly>
            </div>
            @error('test_step_id')
            <span class="text-red-800">{{$message}}</span>
            @enderror
            <div class="mb-3">
                <label for="test_step_id" class="block mb-2 text-sm font-normal text-gray-900 dark:text-white">Test Step</label>
                <input type="text" name="test_step[]" value="{{ $step->test_step }}" id="test_step" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            @error('test_step')
            <span class="text-red-800">{{$message}}</span>
            @enderror
            <div class="mb-3">
                <label for="expected_result" class="block mb-2 text-sm font-normal text-gray-900 dark:text-white">Expected Result</label>
                <input type="text" name="expected_result[]" value="{{ $step->expected_result }}" id="expected_result" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            @error('expected_result')
            <span class="text-red-800">{{$message}}</span>
            @enderror
            <div class="mb-3">
                <label for="category" class="block mb-2 text-sm font-normal text-gray-900 dark:text-white">Category</label>
                <input type="text" name="category[]" value="{{ $step->category }}" id="category" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            @error('category')
            <span class="text-red-800">{{$message}}</span>
            @enderror
            <div class="mb-3">
                <label for="severity" class="block mb-2 text-sm font-normal text-gray-900 dark:text-white">Severity</label>
                <input type="text" name="severity[]" value="{{ $step->severity }}" id="severity" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            @error('severity')
            <span class="text-red-800">{{$message}}</span>
            @enderror
            @endforeach
            @endforeach

            @endforeach
        </div>
        <!-- footer -->
        <div class="flex items-center border-t border-gray-200 rounded-b dark:border-gray-600 gap-2">
            <a href="{{ route('form', $project->id) }}">
                <button type="button" class="text-white bg-gray-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Close</button>
            </a>
            <button type="submit" class="text-white bg-bsi-primary hover:bg-teal-700 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button>
        </div>
    </div>
</form>
@else
<div class="flex flex-col">
    <div class="bg-white p-2 rounded-lg mb-2">
        <p>Tidak ada data</p>
    </div>
</div>
@endif
@endsection