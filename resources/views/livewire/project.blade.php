<div>
    <div class="m-1">
        <livewire:head title="{{ $title }}" description="{{ $description }}" />
        <!-- search -->
        <form class="mt-4">
            <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input wire:model.live="search" type="text" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-bsi-primary focus:border-bsi-primary dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Projects" required>
                <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-bsi-primary hover:bg-bsi-secondary focus:ring-4 focus:outline-none focus:ring-bsi-primary font-medium rounded-lg text-sm px-4 py-2 dark:bg-bsi-primary dark:hover:bg-bsi-primary dark:focus:ring-bsi-primary">Search</button>
            </div>
        </form>
        <!-- end search -->

        <!-- filter -->

        <!-- end filter -->

        <!-- table -->
        <div class="mt-4 relative overflow-x-auto shadow-md sm:rounded-lg">

            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Project name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Kode JIRA
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Test Level
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Start Date
                        </th>
                        <th scope="col" class="px-6 py-3">
                            End Date
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Created Date
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3 text-center" colspan="2">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($projects as $data)
                    <tr wire:key="{{ $data->id }}" class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $data->name }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $data->jira_code }}
                        </td>
                        @if($data->test_level_id = null)
                        <td class="px-6 py-4">
                            {{ $data->test_level->type }}
                        </td>
                        @else
                        <td>
                            no test level
                        </td>
                        @endif
                        <td class="px-6 py-4">
                            {{ $data->start_date }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $data->end_date }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $data->created_at }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $data->is_generated }}
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ route('generate', $data->id) }}" class="font-medium text-bsi-primary dark:text-blue-500 hover:underline">Generate</a>
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ url('form', $data->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Continue</a>
                        </td>
                    </tr>
                    @empty
                    <tr class="bg-white">
                        <td colspan="8" class="px-2 py-2 text-center">
                            tidak ada data
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <!-- end table -->
    </div>
</div>