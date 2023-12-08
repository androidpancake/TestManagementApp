@extends('layouts.form')
@section('form')


<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table id="tableTest" class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    No.
                </th>
                <th scope="col" class="px-6 py-3">
                    Scenario
                </th>
                <th scope="col" class="px-6 py-3">
                    Test Case ID
                </th>
                <th scope="col" class="px-6 py-3">
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
                <th scope="col" class="px-6 py-3">
                    Status (Passed/Failed)
                </th>
                <th scope="col" class="px-6 py-3">
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    1
                </th>
                <td class="px-6 py-4">
                    ...
                </td>
                <td class="px-6 py-4">
                    ...
                </td>
                <td class="px-6 py-4">
                    ...
                </td>
                <td class="px-6 py-4">
                    ...
                </td>
                <td class="px-6 py-4">
                    ...
                </td>
                <td class="px-6 py-4">
                    ...
                </td>
                <td class="px-6 py-4">
                    ...
                </td>
                <td class="inline-flex gap-2 px-6 py-4">
                    <button onclick="" href="#" class="bg-bsi-primary px-2.5 py-2 rounded-full hover:bg-teal-600 focus:ring-4 focus:ring-teal-300">
                        <i class="ph ph-plus w-4 h-4 text-white"></i>
                    </button>
                    <button onclick="" href="#" class="bg-red-400 px-2.5 py-2 rounded-full hover:bg-red-600 focus:ring-4 focus:ring-red-300">
                        <i class="ph ph-minus w-4 h-4 text-white"></i>
                    </button>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@push('data-tables')
<script>
    $("#tableTest").DataTables({
        "paging": true
    });
</script>
@endpush
@endsection