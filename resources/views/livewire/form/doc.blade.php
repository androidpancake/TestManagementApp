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
                    <select wire:model="tmp" id="tmp" class="rounded-full bg-gray-100 border-0 text-gray-700 hover:bg-gray-300 focus:ring-2 focus:ring-teal-300 dark:bg-gray-700 dark:text-white">Select
                        <option value="{{ $tmp }}" selected>{{ $tmp }}</option>
                        <option value="Not Available">Not Available</option>
                        <option value="Available">Available</option>
                    </select>
                    @error('tmp')
                    <span class="text-red-800">{{$message}}</span>
                    @enderror
                </td>
                <td class="px-6 py-4">
                    <input type="text" wire:model="tmp_remark" class="bg-gray-100 w-full rounded border border-gray-300 dark:bg-gray-700 focus:outline-none focus:ring-teal-300 dark:border-gray-700 dark:focus:outline-none dark:focus:ring-teal-300">
                    @error('tmp_remark')
                    <span class="text-red-800">{{$message}}</span>
                    @enderror
                </td>
            </tr>
            <tr class="bg-white dark:bg-gray-800">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Updated {{ $project->test_level->type }}
                </th>
                <td class="px-6 py-4">
                    <select wire:model="updated_uat" id="updated_uat" class="rounded-full bg-gray-100 border-0 text-gray-700 hover:bg-gray-300 focus:ring-2 focus:ring-teal-300 dark:bg-gray-700 dark:text-white">Select
                        <option value="{{ $updated_uat }}" selected>{{ $updated_uat }}</option>
                        <option value="Not Available">Not Available</option>
                        <option value="Available">Available</option>
                    </select>
                    @error('updated_uat')
                    <span class="text-red-800">{{$message}}</span>
                    @enderror
                </td>
                <td class="px-6 py-4">
                    <input type="text" wire:model="updated_remark" class="bg-gray-100 w-full rounded border border-gray-300 dark:bg-gray-700 focus:outline-none focus:ring-teal-300 dark:border-gray-700 dark:focus:outline-none dark:focus:ring-teal-300">
                    @error('updated_remark')
                    <span class="text-red-800">{{$message}}</span>
                    @enderror
                </td>
            </tr>
            <tr class="bg-white dark:bg-gray-800">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{ $project->test_level->type }} Result
                </th>
                <td class="px-6 py-4">
                    <select wire:model="uat_result" id="uat_result" class="rounded-full bg-gray-100  border-0 text-gray-700 hover:bg-gray-300 focus:ring-2 focus:ring-teal-300 dark:bg-gray-700 dark:text-white">Select
                        <option value="{{ $uat_result }}" selected>{{ $uat_result }}</option>
                        <option value="Not Available">Not Available</option>
                        <option value="Available">Available</option>
                    </select>
                    @error('uat_result')
                    <span class="text-red-800">{{$message}}</span>
                    @enderror
                </td>
                <td class="px-6 py-4">
                    <input type="text" wire:model="uat_remark" class="bg-gray-100 w-full rounded border border-gray-300 dark:bg-gray-700 focus:outline-none focus:ring-teal-300 dark:border-gray-700 dark:focus:outline-none dark:focus:ring-teal-300">
                    @error('uat_remark')
                    <span class="text-red-800">{{$message}}</span>
                    @enderror
                </td>
            </tr>
            <tr class="bg-white dark:bg-gray-800">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{ $project->test_level->type }} Attendance
                </th>
                <td class="px-6 py-4">
                    <select wire:model="uat_attendance" id="uat_attendance" class="rounded-full bg-gray-100 border-0 text-gray-700 hover:bg-gray-300 focus:ring-2 focus:ring-teal-300 dark:bg-gray-700 dark:text-white">Select
                        <option value="{{ $uat_attendance }}" selected>{{ $uat_attendance }}</option>
                        <option value="Not Available">Not Available</option>
                        <option value="Available">Available</option>
                    </select>
                    @error('uat_attendance')
                    <span class="text-red-800">{{$message}}</span>
                    @enderror
                </td>
                <td class="px-6 py-4">
                    <input type="text" wire:model="uat_attendance_remark" class="bg-gray-100 w-full rounded border border-gray-300 dark:bg-gray-700 focus:outline-none focus:ring-teal-300 dark:border-gray-700 dark:focus:outline-none dark:focus:ring-teal-300">
                </td>
            </tr>
            <tr class="bg-white dark:bg-gray-800">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Other
                </th>
                <td class="px-6 py-4">
                    <select wire:model="other" id="other" class="rounded-full bg-gray-100 border-0 text-gray-700 hover:bg-gray-300 focus:ring-2 focus:ring-teal-300 dark:bg-gray-700 dark:text-white">Select
                        <option value="{{ $other }}" selected>{{ $other }}</option>
                        <option value="Not Available">Not Available</option>
                        <option value="Available">Available</option>
                    </select>
                    @error('status')
                    <span class="text-red-800">{{$message}}</span>
                    @enderror
                </td>
                <td class="px-6 py-4">
                    <input type="text" wire:model="other_remark" class="bg-gray-100 w-full rounded border border-gray-300 dark:bg-gray-700 focus:outline-none focus:ring-teal-300 dark:border-gray-700 dark:focus:outline-none dark:focus:ring-teal-300">
                    @error('other_remark')
                    <span class="text-red-800">{{$message}}</span>
                    @enderror
                </td>
            </tr>
        </tbody>
    </table>
</div>