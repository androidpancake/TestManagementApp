<form action="{{ route('scenario.attach_step') }}" method="post" class="w-full mx-auto my-5 items-center" enctype="multipart/form-data">
    @csrf
    <div class="flex flex-col gap-2">
        <div class="bg-white p-2 rounded-lg mb-2 max-h-screen overflow-y-auto dark:bg-gray-800">
            <div class="mb-5">
                <label for="case" class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Case</label>
                <select name="case_id" id="case_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-bsi-primary focus:border-bsi-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500">
                    @foreach($projectData->scenarios as $scenario)
                    @foreach($scenario->cases as $case)
                    <option value="{{ $case->id }}">{{ $case->case }}</option>
                    @endforeach
                    @endforeach
                </select>
            </div>
            <div class="mb-5">
                <label for="test_step_id" class="block mb-2 text-sm font-normal text-gray-900 dark:text-white">Test Step ID</label>
                <input type="text" name="test_step_id" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="mb-5">
                <label for="test_step" class="block mb-2 text-sm font-normal text-gray-900 dark:text-white">Test Step</label>
                <input type="text" name="test_step" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="mb-5">
                <label for="expected_result" class="block mb-2 text-sm font-normal text-gray-900 dark:text-white">Expected Result</label>
                <input type="text" name="expected_result" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="mb-5">
                <label for="category" class="block mb-2 text-sm font-normal text-gray-900 dark:text-white">Case</label>
                <select name="category" id="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-bsi-primary focus:border-bsi-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500">
                    <option value="positive">Positive</option>
                    <option value="negative">negative</option>
                </select>
            </div>
            <div class="mb-5">
                <label for="severity" class="block mb-2 text-sm font-normal text-gray-900 dark:text-white">Case</label>
                <select name="severity" id="severity" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-bsi-primary focus:border-bsi-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500">
                    <option value="high">High</option>
                    <option value="medium">Medium</option>
                    <option value="low">Low</option>

                </select>
            </div>
            <div class="mb-5">
                <label for="status" class="block mb-2 text-sm font-normal text-gray-900 dark:text-white">Case</label>
                <select name="status" id="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-bsi-primary focus:border-bsi-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500">
                    <option value="passed">Passed</option>
                    <option value="failed">Failed</option>
                </select>
            </div>
            <button type="submit" class="text-white bg-bsi-primary hover:bg-teal-700 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-bsi-primary dark:hover:bg-teal-700 dark:focus:ring-teal-800">Update</button>
        </div>
    </div>
</form>