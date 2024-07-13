<div>
    <h1
        class="capitalize text-xl font-extrabold tracking-tight text-gray-900 md:text-2xl lg:text-2xl xl:text-3xl dark:text-white">
        Pelayanan
    </h1>
    @livewire('services.services-nav')
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-4">
        @foreach ($this->currentServices as $service)
            <div wire:key="{{ $service->id }}"
                class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 relative">
                <button type="button" wire:click="destroyService({{ $service->id }})"
                    class="absolute right-4 text-red-400 bg-transparent hover:bg-rose-200 hover:text-red-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-rose-600 dark:hover:text-white"
                    data-modal-toggle="crud-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <a href="#">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                        {{ $service->name }}</h5>
                </a>
                <div class="flex flex-row sm:flex-col lg:flex-row mb-3">
                    <p class="font-semibold text-gray-700 dark:text-gray-400">
                        {{ \Carbon\Carbon::parse($service->date)->toDateString() }}</p>
                    <p class="mx-2 sm:hidden lg:block">
                        |
                    </p>
                    <p class="font-semibold text-gray-700 dark:text-gray-400">
                        {{ \Carbon\Carbon::parse($service->start_at)->format('H:i') }} -
                        {{ \Carbon\Carbon::parse($service->end_at)->format('H:i') }} </p>
                </div>
                <a href="/services/{{ $service->id }}" wire:navigate
                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Read more
                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </a>
            </div>
        @endforeach
    </div>
</div>
