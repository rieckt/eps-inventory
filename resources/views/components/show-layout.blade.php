<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __($title) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white rounded-lg shadow-md dark:bg-gray-800">
                <div class="p-6">
                    <h2 class="mb-4 text-2xl font-bold text-gray-700 dark:text-gray-200">{{ $name }}</h2>
                    <div class="mb-4 card">
                        {{ $details }}
                    </div>

                    <div class="flex items-center justify-between pt-6 mt-6 border-t border-gray-200 dark:border-gray-700">
                        <div>
                            <a href="{{ route($indexRoute) }}" title="Go back to the list"
                                class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25">
                                <i class="fas fa-arrow-left"></i> {{ __('Back') }}
                            </a>
                        </div>
                        <div class="flex items-center">
                            <a href="{{ route($editRoute[0], $editRoute[1]) }}"
                                class="inline-flex items-center px-4 py-2 mr-4 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-blue-500 border border-transparent rounded-md hover:bg-blue-400 active:bg-blue-600 focus:outline-none focus:border-blue-600 focus:ring ring-blue-300 disabled:opacity-25"
                                title="Edit this item">
                                <i class="fas fa-edit"></i> {{ __('Edit') }}
                            </a>
                            <form action="{{ route($deleteRoute[0], $deleteRoute[1]) }}" method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this item?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-red-500 border border-transparent rounded-md hover:bg-red-400 active:bg-red-600 focus:outline-none focus:border-red-600 focus:ring ring-red-300 disabled:opacity-25"
                                    title="Delete this item">
                                    <i class="fas fa-trash"></i> {{ __('Delete') }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
