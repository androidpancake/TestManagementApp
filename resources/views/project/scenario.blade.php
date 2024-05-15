@extends('base.app')
@section('content')
@if($project)
<div>
    @if(session('success'))
    <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
        <span class="font-medium">Success!</span> {{ session('success') }}.
    </div>
    @endif

    @if(session('case'))
    <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
        <span class="font-medium">Success!</span> {{ session('success') }}.
    </div>
    @endif

    <div class="py-2">
        <livewire:head title="CRUD" description="Scenario-Case-Step" />
    </div>
    <!-- test table -->
    <div id="table-collapse" data-accordion="collapse">
        <h2 id="table-collapse-test">
            <button type="button" class="flex items-center justify-between w-full p-5 bg-white font-medium rtl:text-right text-gray-500 border border-gray-300 rounded-t-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#table-collapse-body-1" aria-expanded="true" aria-controls="accordion-collapse-heading-1">
                <span>Scenario-Case-Step Table</span>
                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
                </svg>
            </button>
        </h2>
        <div id="table-collapse-body-1" class="hidden" aria-labelledby="accordion-collapse-heading-1">
            <div class="relative overflow-auto shadow-md p-2">
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
                        <livewire:Project.ScenarioComponent :id="$project->id" />
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- form -->
    <div id="form-collapse" data-accordion="collapse">
        <h2 id="form-collapse-test">
            <button type="button" class="flex items-center justify-between w-full p-5 bg-white font-medium rtl:text-right text-gray-500 border border-gray-300 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#form-collapse-body-1" aria-expanded="true" aria-controls="accordion-collapse-heading-1">
                <span>Edit Existing Scenario-Case-Step</span>
                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
                </svg>
            </button>
        </h2>
        <div id="form-collapse-body-1" class="hidden" aria-labelledby="accordion-collapse-heading-1">
            @include('project.scenario-form')
        </div>
    </div>

    <!--case options -->
    <div id="case-collapse" data-accordion="collapse">
        <h2 id="case-collapse-test">
            <button type="button" class="flex items-center justify-between w-full p-5 bg-white font-medium rtl:text-right text-gray-500 border border-gray-300 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#case-collapse-body-1" aria-expanded="true" aria-controls="accordion-collapse-heading-1">
                <span>Attach Case</span>
                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
                </svg>
            </button>
        </h2>
        <div id="case-collapse-body-1" class="hidden" aria-labelledby="accordion-collapse-heading-1">
            @include('project.case')
        </div>
    </div>

    <!-- step options -->
    <div id="step-collapse" data-accordion="collapse">
        <h2 id="step-collapse-test">
            <button type="button" class="flex items-center justify-between w-full p-5 bg-white font-medium rtl:text-right text-gray-500 border border-gray-300 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#step-collapse-body-1" aria-expanded="true" aria-controls="accordion-collapse-heading-1">
                <span>Attach Step</span>
                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
                </svg>
            </button>
        </h2>
        <div id="step-collapse-body-1" class="hidden" aria-labelledby="accordion-collapse-heading-1">
            @include('project.step')
        </div>
    </div>

    @else
    <div class="flex flex-col">
        <div class="bg-white p-2 rounded-lg mb-2">
            <p>Tidak ada data</p>
        </div>
    </div>
    @endif
</div>
@endsection