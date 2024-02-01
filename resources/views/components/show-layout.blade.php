@props(['title', 'name', 'details', 'indexRoute', 'editRoute', 'deleteRoute', 'itemId'])

<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __($title) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg dark:bg-gray-800">
                <div class="p-6 bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex flex-col gap-6 md:flex-row">
                        <div class="flex-1">
                            <h2 class="text-2xl font-bold text-gray-700 dark:text-gray-200">{{ $name }}</h2>
                        </div>
                        {{ $details }}
                    </div>

                    <div class="flex items-center justify-between mt-4">
                        <div>
                            <a href="{{ route($indexRoute) }}">
                                <x-primary-button>
                                    {{ __('Back') }}
                                </x-primary-button>
                            </a>
                        </div>
                        <div class="flex items-center">
                            <a href="{{ route($editRoute[0], $editRoute[1]) }}" class="mr-4">
                                <x-secondary-button>
                                    {{ __('Edit') }}
                                </x-secondary-button>
                            </a>
                            <form action="{{ route($deleteRoute[0], $deleteRoute[1]) }}" method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this item?');">
                                @csrf
                                @method('DELETE')
                                <x-danger-button>
                                    {{ __('Delete') }}
                                </x-danger-button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
