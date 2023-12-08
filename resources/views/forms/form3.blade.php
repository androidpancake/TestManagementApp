@extends('layouts.form')
@section('form')
<form action="" method="">
    <div class="mb-5">
        <label for="env-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Test Environment</label>
        <input type="text" name="env" id="env-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    </div>
    <div class="mb-5">
        <label for="env-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Defect Issue Found</label>
        <input type="text" name="env" id="env-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    </div>
    <div class="mb-5">
        <label for="env-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Credentials</label>
        <input type="text" name="env" id="env-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    </div>
    <div class="mb-5">
        <label for="env-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Other Notes</label>
        <input type="text" name="env" id="env-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    </div>
    <div class="flex justify-end">
        <button class="bg-bsi-primary px-6 py-2.5 rounded text-white hover:bg-teal-700 focus:ring-4 focus:ring-teal-400">Next</button>
    </div>
</form>
@endsection