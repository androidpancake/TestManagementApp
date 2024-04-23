<div class="relative overflow-x-auto sm:rounded-t-lg">
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
                <th>
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-gray-50">
                <input type="hidden" wire:model="user_id">
                <td scope="col" class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <div>
                        <input type="text" wire:model="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-bsi-primary focus:border-bsi-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-bsi-primary dark:focus:border-bsi-primary" value="{{ $name }}" required />
                    </div>
                    @error('name')
                    <span class="text-red-800">{{$message}}</span>
                    @enderror
                </td>

                <td scope="col" class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <div>
                        <input type="text" wire:model="unit" id="unit" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-bsi-primary focus:border-bsi-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-bsi-primary dark:focus:border-bsi-primary" value="{{ $unit }}" required />
                    </div>
                    @error('unit')
                    <span class="text-red-800">{{$message}}</span>
                    @enderror
                </td>
                <td scope="col" class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <div>
                        <input type="text" wire:model="username" id="username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-bsi-primary focus:border-bsi-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-bsi-primary dark:focus:border-bsi-primary" value="{{ $username }}" required />
                    </div>
                    @error('username')
                    <span class="text-red-800">{{$message}}</span>
                    @enderror
                </td>
                <td class="px-6 py-3 space-x-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <button wire:click="update" class="text-bsi-primary hover:underline">Update</button>
                    <button wire:click="cancel" class="text-gray-500 hover:underline">Cancel</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>