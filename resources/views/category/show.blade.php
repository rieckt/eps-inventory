<x-show-layout title="Category Details" :name="$category->name" indexRoute="category.index" :editRoute="['category.edit', $category->id]" :deleteRoute="['category.destroy', $category->id]" :itemId="$category->id">
    <x-slot name="details">
        <div class="flex-1 p-6 bg-white rounded-lg shadow-lg dark:bg-gray-800">
            <div class="mb-4">
                <h3 class="text-2xl font-bold text-gray-700 dark:text-gray-200">
                    <i class="mr-3 text-3xl fas fa-info-circle"></i>Category Details
                </h3>
                <h1 class="mt-2 text-xl text-gray-500">{{ $category->name }}</h1>
            </div>

            <div class="mt-6">
                <h3 class="text-xl font-bold text-gray-700 dark:text-gray-200">{{ __('Description:') }}</h3>
                <p class="mt-2 text-gray-700 dark:text-gray-200">{{ $category->description }}</p>
            </div>
        </div>
    </x-slot>
</x-show-layout>
