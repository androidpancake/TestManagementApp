@extends('layouts.form')
@section('form')
<form action="" method="">
    <div class="relative overflow-x-auto mb-5 rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-900 uppercase bg-white dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Document Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Availability
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Remarks
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-white dark:bg-gray-800">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        TMP
                    </th>
                    <td class="px-6 py-4">
                        <select name="" id="" class="rounded-full bg-gray-100 text-gray-900 border-0 text-gray-700 hover:bg-gray-300 focus:ring-2 focus:ring-teal-300 dark:bg-gray-700 dark:text-white">Select
                            <option value="" selected>Not Available</option>
                            <option value="">Available</option>
                        </select>
                    </td>
                    <td class="px-6 py-4">
                        <input type="text" name="remarks[]" class="bg-gray-100 w-full rounded border border-gray-300 dark:bg-gray-700 focus:outline-none focus:ring-teal-300 dark:border-gray-700 dark:focus:outline-none dark:focus:ring-teal-300">
                    </td>
                </tr>
                <tr class="bg-white dark:bg-gray-800">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Updated UAT
                    </th>
                    <td class="px-6 py-4">
                        <select name="" id="" class="rounded-full bg-gray-100 text-gray-900 border-0 text-gray-700 hover:bg-gray-300 focus:ring-2 focus:ring-teal-300 dark:bg-gray-700 dark:text-white">Select
                            <option value="" selected>Not Available</option>
                            <option value="">Available</option>
                        </select>
                    </td>
                    <td class="px-6 py-4">
                        <input type="text" name="remarks[]" class="bg-gray-100 w-full rounded border border-gray-300 dark:bg-gray-700 focus:outline-none focus:ring-teal-300 dark:border-gray-700 dark:focus:outline-none dark:focus:ring-teal-300">
                    </td>
                </tr>
                <tr class="bg-white dark:bg-gray-800">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        UAT Result
                    </th>
                    <td class="px-6 py-4">
                        <select name="" id="" class="rounded-full bg-gray-100 text-gray-900 border-0 text-gray-700 hover:bg-gray-300 focus:ring-2 focus:ring-teal-300 dark:bg-gray-700 dark:text-white">Select
                            <option value="" selected>Not Available</option>
                            <option value="">Available</option>
                        </select>
                    </td>
                    <td class="px-6 py-4">
                        <input type="text" name="remarks[]" class="bg-gray-100 w-full rounded border border-gray-300 dark:bg-gray-700 focus:outline-none focus:ring-teal-300 dark:border-gray-700 dark:focus:outline-none dark:focus:ring-teal-300">
                    </td>
                </tr>
                <tr class="bg-white dark:bg-gray-800">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        UAT Attendance
                    </th>
                    <td class="px-6 py-4">
                        <select name="" id="" class="rounded-full bg-gray-100 text-gray-900 border-0 text-gray-700 hover:bg-gray-300 focus:ring-2 focus:ring-teal-300 dark:bg-gray-700 dark:text-white">Select
                            <option value="" selected>Not Available</option>
                            <option value="">Available</option>
                        </select>
                    </td>
                    <td class="px-6 py-4">
                        <input type="text" name="remarks[]" class="bg-gray-100 w-full rounded border border-gray-300 dark:bg-gray-700 focus:outline-none focus:ring-teal-300 dark:border-gray-700 dark:focus:outline-none dark:focus:ring-teal-300">
                    </td>
                </tr>
                <tr class="bg-white dark:bg-gray-800">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Other
                    </th>
                    <td class="px-6 py-4">
                        <select name="" id="" class="rounded-full bg-gray-100 text-gray-900 border-0 text-gray-700 hover:bg-gray-300 focus:ring-2 focus:ring-teal-300 dark:bg-gray-700 dark:text-white">Select
                            <option value="" selected>Not Available</option>
                            <option value="">Available</option>
                        </select>
                    </td>
                    <td class="px-6 py-4">
                        <input type="text" name="remarks[]" class="bg-gray-100 w-full rounded border border-gray-300 dark:bg-gray-700 focus:outline-none focus:ring-teal-300 dark:border-gray-700 dark:focus:outline-none dark:focus:ring-teal-300">
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="flex justify-end">
        <button type="button" class="bg-bsi-primary px-6 py-2.5 rounded text-white hover:bg-teal-700 focus:ring-4 focus:ring-teal-400">Generate</button>
    </div>
</form>

@endsection