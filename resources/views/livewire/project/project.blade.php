<div>
    <div class="m-1">
        <livewire:head title="{{ $title }}" description="{{ $description }}" />
        <div class="flex flex-row w-full gap-2 items-center mt-4">
            <!-- search -->
            <div class="w-full">
                <form>
                    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <input wire:model.live="search" type="text" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-teal-500 focus:border-bsi-primary dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-bsi-primary" placeholder="Search Projects/JIRA/">
                        <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-bsi-primary hover:bg-bsi-secondary focus:ring-4 focus:outline-none focus:ring-teal-500 font-medium rounded-lg text-sm px-4 py-2 dark:bg-bsi-primary dark:hover:bg-bsi-primary dark:focus:ring-teal-500">Search</button>
                    </div>
                </form>
            </div>
            <!-- end search -->

            @if($type)
            @else
            <!-- filter category -->
            <div class="h-full">
                <button id="dropdownDefault" data-dropdown-toggle="dropdown" class="text-gray-800 dark:text-white bg-white hover:bg-gray-100 focus:border-bsi-primary focus:outline-none focus:ring-teal-500 font-medium rounded-lg text-sm px-4 py-2 text-center inline-flex items-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-primary-800" type="button">
                    Filter Type
                    <svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>

                <!-- Dropdown menu -->
                <div id="dropdown" class="z-10 hidden w-56 p-3 bg-white rounded-lg shadow dark:bg-gray-700">
                    <h6 class="mb-3 text-sm font-medium text-gray-900 dark:text-white">
                        Category
                    </h6>
                    <ul class="space-y-2 text-sm" aria-labelledby="dropdownDefault">
                        @foreach($test_level as $data)
                        <div wire:key="{{ $data->id }}">
                            <li class="flex items-center">
                                <input id="{{ $data->id }}" type="checkbox" wire:model.change="testlevel" value="{{ $data->id }}" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:border-bsi-primary dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" />
                                <label for="{{ $data->id }}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                                    {{ $data->description }}
                                </label>
                            </li>
                        </div>
                        @endforeach
                    </ul>
                </div>
            </div>
            <!-- end filter category -->
            @endif

            <!-- filter draft -->
            <div class="h-full">
                <button id="dropdownPublish" data-dropdown-toggle="dropdownPub" class="text-gray-800 dark:text-white bg-white hover:bg-gray-100 focus:border-bsi-primary focus:outline-none focus:ring-teal-500 font-medium rounded-lg text-sm px-4 py-2 text-center inline-flex items-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-primary-800" type="button">
                    Publish Type
                    <svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>

                <!-- Dropdown menu -->
                <div id="dropdownPub" class="z-10 hidden w-56 p-3 bg-white rounded-lg shadow dark:bg-gray-700">
                    <h6 class="mb-3 text-sm font-medium text-gray-900 dark:text-white">
                        Draft
                    </h6>
                    <ul class="space-y-2 text-sm" aria-labelledby="dropdownPublish">
                        <div wire:key="draft">
                            <li class="flex items-center">
                                <input id="draft" type="checkbox" wire:model.change="publish" value="draft" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:border-bsi-primary dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" />
                                <label for="draft" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                                    Draft
                                </label>
                            </li>
                        </div>
                        <div wire:key="published">
                            <li class="flex items-center">
                                <input id="published" type="checkbox" wire:model.change="publish" value="published" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:border-bsi-primary dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" />
                                <label for="published" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                                    Published
                                </label>
                            </li>
                        </div>
                    </ul>
                </div>
            </div>
            <!-- end filter draft -->
        </div>
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
                        <th scope="col" class="px-6 py-3 text-center" colspan="3">
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
                        @if($data->test_level_id != null)
                        <td class="px-6 py-4">
                            {{ $data->test_level_id }}
                            {{ $data->test_level->type }}
                        </td>
                        @else
                        <td>
                            Test type not defined
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
                            {{ $data->published }}
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ route('generate', $data->id) }}" class="font-medium text-bsi-primary dark:text-bsi-primary hover:underline">Generate</a>
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ url('form', $data->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Continue</a>
                        </td>
                        <td class="px-6 py-4">
                            <button wire:click="delete('{{ $data->id }}')" class="text-red-600">delete</button>
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
                <div class="p-2">
                    {{ $projects->links() }}
                </div>
            </table>
        </div>
        <!-- end table -->
    </div>
</div>