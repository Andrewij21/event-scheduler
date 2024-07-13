<div class="relative overflow-x-auto min-h-screen sm:rounded-lg">
    <h1
        class="capitalize text-xl font-extrabold tracking-tight text-gray-900 md:text-2xl lg:text-2xl xl:text-3xl dark:text-white">
        Service Details
    </h1>

    {{-- NAV --}}
    {{-- <div
        class="flex items-center justify-between flex-column flex-wrap md:flex-row space-y-4 mt-4 md:space-y-0 pb-4 bg-white dark:bg-gray-900">
        <div>
            <button id="dropdownActionButton" data-dropdown-toggle="dropdownAction"
                class="inline-flex items-center text-gray-500 bg-white border border-gray-300   hover:bg-gray-100   font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
                type="button">
                <span class="sr-only">Action button</span>
                {{ $selectedDivision }}
                <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 4 4 4-4" />
                </svg>
            </button>
            <!-- Dropdown menu -->
            <div id="dropdownAction"
                class="z-50 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600 max-h-64 overflow-y-auto">
                <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownActionButton">
                    <li>
                        <button wire:click="filterDivision(0)"
                            class="block w-full text-left px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                            All</button>
                    </li>
                    @foreach ($this->divisions as $division)
                        <li wire:key="{{ $division->id }}">
                            <button wire:click.prevent="filterDivision({{ $division->id }},'{{ $division->name }}')"
                                class="block w-full text-left px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                {{ $division->name }}</button>
                        </li>
                    @endforeach


                </ul>

            </div>
        </div>
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
    </div> --}}
    @livewire('services.detail.service-detail-nav', ['id' => $id])

    {{-- TABLE --}}

    @foreach ($this->divisions as $division)
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 mb-6">
            <h2 class="mb-1 capitalize font-semibold">
                {{ $division->name }}
            </h2>
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="p-4">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Division
                    </th>
                    {{-- <th scope="col" class="px-6 py-3">
                    Avability
                </th> --}}
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @php $localIndex = 1; @endphp
                @foreach ($this->schedules as $schedule)
                    @if ($schedule->user->division->id == $division->id)
                        <tr wire:key="{{ $schedule->id }}"
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="w-4 p-4">
                                <div class="flex items-center">
                                    {{ $localIndex++ }}
                                </div>
                            </td>
                            <th scope="row"
                                class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                <img class="w-10 h-10 rounded-full" src="/docs/images/people/profile-picture-1.jpg"
                                    alt="Jese image">
                                <div class="ps-3">
                                    <div class="text-base font-semibold">{{ $schedule->user->name }}</div>
                                    <div class="font-normal text-gray-500">{{ $schedule->user->email }}</div>
                                </div>
                            </th>
                            <td class="px-6 py-4">
                                {{ $schedule->user->division->name }}
                            </td>
                            {{-- <td class="px-6 py-4">
                        <div class="flex items-center">
                            <div class="h-2.5 w-2.5 rounded-full bg-green-500 me-2"></div> Online
                        </div>
                    </td> --}}
                            <td class="px-6 py-4">
                                <button wire:click="destroyUserSchedule({{ $schedule->id }})"
                                    class="font-medium text-rose-600 dark:text-rose-500 hover:underline">
                                    Remove
                                </button>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    @endforeach
</div>
