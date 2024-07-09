<nav class="bg-white border-gray-200 dark:bg-gray-900">
    <div class="flex flex-wrap flex-col md:flex-row md:items-center md:justify-between mx-auto py-4">
        <div class="relative max-w-sm">
            <label for="table-search" class="sr-only">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input type="text" id="table-search-users" wire:model.live="search"
                    class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Search for users">
            </div>
        </div>

        <div class="md:block md:w-auto md:pe-4 max-w-sm" id="navbar-default">
            <ul
                class="font-medium flex flex-col md:p-0 mt-4 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                <li>
                    <button x-data x-on:click="$dispatch('open-modal',{id:'modal1'})"
                        class="block py-2 px-3 text-white bg-blue-700 rounded dark:text-white md:dark:text-blue-500">
                        Tambah User</button>

                    <x-modal id="modal1" title="Add User">
                        <x-slot:body>
                            <div class="max-w-md px-4 mb-2">
                                <label for="table-search" class="sr-only">Search</label>
                                <div class="relative">
                                    <div
                                        class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                        </svg>
                                    </div>
                                    <input type="text" id="table-search-users" wire:model.live="searchUser"
                                        class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-full bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Search for users">
                                </div>
                            </div>
                            <div
                                class="w-full max-w-md px-4 bg-white border border-gray-200 rounded-lg shadow sm:px-6 dark:bg-gray-800 dark:border-gray-700 overflow-y-scroll min-h-52 max-h-60">
                                <div class="flow-root ">
                                    <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                                        @foreach ($this->users as $user)
                                            <li wire:key="{{ $user->id }}" class="py-3 sm:py-4">
                                                <div class="flex items-center">
                                                    <div class="flex-1 min-w-0">
                                                        <p
                                                            class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                            {{ $user->user->name }}
                                                        </p>
                                                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                                            {{ $user->user->email }}
                                                        </p>
                                                    </div>
                                                    <div
                                                        class="inline-flex items-center text-base font-semibold text-green-400 dark:text-white">
                                                        <button wire:click="addUser({{ $user->user->id }})"
                                                            class="px-4 py-2 rounded-lg ease-in-out duration-300 hover:bg-green-400 hover:text-white">
                                                            Add
                                                        </button>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                            </form>
                        </x-slot:body>
                    </x-modal>

                </li>
            </ul>
        </div>
    </div>
</nav>
