<x-show-layout title="Category Details" :name="$category->name" indexRoute="category.index" :editRoute="['category.edit', $category->id]" :deleteRoute="['category.destroy', $category->id]" :itemId="$category->id">
    <x-slot name="details">
        <div class="flex-1">
            <h3 class="text-xl font-bold text-gray-700 dark:text-gray-200">{{ __('Description:') }}</h3>
            <p class="text-gray-700 dark:text-gray-200">{{ $category->description }}</p>
        </div>
    </x-slot>
</x-show-layout>
