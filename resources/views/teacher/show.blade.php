<x-show-layout title="Teacher Details" :name="$teacher->name" indexRoute="teacher.index" :editRoute="['teacher.edit', $teacher->id]" :deleteRoute="['teacher.destroy', $teacher->id]" :itemId="$teacher->id">
    <x-slot name="details">
        <div class="flex-1 p-6 bg-white rounded-lg shadow-lg dark:bg-gray-800">
            <div class="mb-4">
                <h3 class="text-2xl font-bold text-gray-700 dark:text-gray-200">
                    <i class="mr-3 text-3xl fas fa-info-circle"></i>Teacher Details
                </h3>
                <h1 class="mt-2 text-xl text-gray-500">{{ $teacher->name }}</h1>
            </div>

            <div class="mt-6">
                <h3 class="text-xl font-bold text-gray-700 dark:text-gray-200">Email</h3>
                <p class="mt-2 text-gray-700 dark:text-gray-200">
                    <a href="mailto:{{ $teacher->email }}" class="text-blue-500 hover:text-blue-700">{{ $teacher->email }}</a>
                </p>
            </div>
        </div>
    </x-slot>
</x-show-layout>
