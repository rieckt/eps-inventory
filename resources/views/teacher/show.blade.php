<x-show-layout title="Teacher Details" :name="$teacher->name" indexRoute="teacher.index" :editRoute="['teacher.edit', $teacher->id]" :deleteRoute="['teacher.destroy', $teacher->id]" :itemId="$teacher->id">
    <x-slot name="details">
        <div class="flex-1">
            <h3 class="text-xl font-bold text-gray-700 dark:text-gray-200">Email</h3>
            <p class="text-gray-700 dark:text-gray-200">{{ $teacher->email }}</p>
        </div>
    </x-slot>
</x-show-layout>
