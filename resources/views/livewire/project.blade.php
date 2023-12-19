<div class="h-fit">
    <livewire:head title="Project" description="Selamat Datang" />

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
                    <th>
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
                    <td class="px-6 py-4">
                        {{ $data->test_level }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $data->start_date }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $data->end_date }}
                    </td>
                    <td class="px-6 py-4">
                        <a href="{{ url('project/detail', $data->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Continue</a>
                    </td>
                </tr>
                @empty
                @endforelse
            </tbody>
        </table>
    </div>
</div>