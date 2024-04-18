<div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        @if($editMode)
        @include('livewire.users.edit')
        @endif
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Unit
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Username (email)
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Project
                    </th>
                    <th>
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $user->name }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $user->unit }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $user->username }}
                    </td>
                    <td class="px-6 py-4">
                        @forelse($user->project as $data)
                        <ul>
                            <li>{{ $data->name }}</li>
                        </ul>
                        @empty
                        no project
                        @endforelse
                    </td>
                    <td class="px-6 py-4">
                        <button wire:click="edit({{ $user->id }})" type="button" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</button>
                    </td>
                </tr>
                @endforeach

            </tbody>
            <tfoot>
                <tr>
                    <td class="px-6 py-3" colspan="5">
                        {{ $users->links() }}
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>