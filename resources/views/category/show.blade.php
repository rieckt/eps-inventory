<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Category Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg dark:bg-gray-800">
                <div class="p-6 bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex flex-col gap-6 md:flex-row">

                        <div class="flex-1">
                            <h2 class="text-2xl font-bold text-gray-700 dark:text-gray-200">{{ $category->name }}</h2>
                        </div>

                        <div class="flex-1">
                            <h3 class="text-xl font-bold text-gray-700 dark:text-gray-200">{{ __('Description:') }}</h3>
                            <p class="text-gray-700 dark:text-gray-200">{{ $category->description }}</p>
                        </div>

                    </div>


                    <div class="flex items-center justify-between mt-4">
                        <div>
                            <a href="{{ route('category.index') }}">
                                <x-primary-button class="ml-3">
                                    {{ __('Back') }}
                                </x-primary-button>
                            </a>
                        </div>
                        <div class="flex items-center">
                            <a href="{{ route('category.edit', $category->id) }}">
                                <x-secondary-button class="ml-3">
                                    {{ __('Edit') }}
                                </x-secondary-button>
                            </a>
                            <form action="{{ route('category.destroy', $category->id) }}" method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this category?');">
                                @csrf
                                @method('DELETE')
                                <x-danger-button class="ml-3">
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
