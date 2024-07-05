<div>
    <h1
        class="capitalize text-xl font-extrabold tracking-tight text-gray-900 md:text-2xl lg:text-2xl xl:text-3xl dark:text-white">
        Users
    </h1>
    @livewire('users.users-nav')
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg my-2">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="p-4">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Role
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Avability
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($this->users as $user)
                    <tr wire:key="{{ $user->id }}"
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <td class="p-4">
                            {{ $loop->index + 1 }}
                        </td>
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $user->name }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $user->email }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $user->division->name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $user->avability }}
                        </td>
                        <td class="px-6 py-4">
                            <p class="font-medium text-red-600 dark:text-red-500 cursor-pointer "
                                wire:click="destroyUser({{ $user->id }})"><i class="bi bi-trash"></i></p>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
