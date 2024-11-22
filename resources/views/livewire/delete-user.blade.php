<div>
    {{-- <button data-modal-target="popup-modal-{{ $userId }}" data-modal-toggle="popup-modal-{{ $userId }}"
        class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
        type="button">
        Delete
    </button> --}}

    <x-icon-button type="danger" icon="delete" data-modal-target="popup-modal-{{ $userId }}"
        data-modal-toggle="popup-modal-{{ $userId }}" />

    <div id="popup-modal-{{ $userId }}" tabindex="-1"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-neutral4">
                <button type="button"
                    class="absolute top-3 end-2.5 text-red bg-transparent hover:bg-gray-200 hover:text-neutral4 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-neutral4 dark:hover:text-white"
                    data-modal-hide="popup-modal-{{ $userId }}">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-4 md:p-5 text-center">
                    <svg class="mx-auto mb-4 text-neutral4 w-12 h-12 dark:text-gray-200" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <h3 class="mb-5 text-lg font-normal text-neutral4 dark:text-neutral4">Are you sure you want to
                        delete this user?</h3>
                    <button wire:click="deleteUser" data-modal-hide="popup-modal-{{ $userId }}" type="button"
                        class="text-white bg-danger hover:bg-danger4 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                        Yes, delete
                    </button>
                    <button data-modal-hide="popup-modal-{{ $userId }}" type="button"
                        class="py-2.5 px-5 ms-3 text-sm font-medium text-neutral4 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-neutral4 hover:text-white focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-neutral4 dark:bg-neutral4 dark:text-neutral4 dark:border-neutral4 dark:hover:text-white dark:hover:bg-neutral4">
                        No, cancel
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>