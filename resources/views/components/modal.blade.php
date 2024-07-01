@props(['title', 'id'])
<div x-data="{ show: false, id: '{{ $id }}' }" x-show="show" x-on:open-modal.window='show=($event.detail.id===id)'
    x-on:close-modal.window='show=false' class="fixed inset-0 flex items-center justify-center z-50" style="display: none"
    x-transition.duration>
    <!-- Trigger button -->
    {{-- <button x-on:click="show = true"
        class="block py-2 px-3 text-white bg-blue-700 rounded dark:text-white md:dark:text-blue-500">{{ $trigger }}</button> --}}

    <!-- Modal background -->
    <div class="fixed inset-0 bg-gray-300 opacity-50" x-on:click="show = false"></div>

    <!-- Modal content -->
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    {{ $title }}
                </h3>
                <button type="button" x-on:click="$dispatch('close-modal')"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-toggle="crud-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            {{ $body }}
        </div>
        {{-- <div class="px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
            <button x-on:click="$dispatch('close-modal')"
                class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                Close
            </button>
        </div> --}}
    </div>
</div>
