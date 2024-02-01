<x-show-layout title="status Details" :name="$status->name" indexRoute="status.index" :editRoute="['status.edit', $status->id]" :deleteRoute="['status.destroy', $status->id]" :itemId="$status->id">
    <x-slot name="details">
        <div class="flex-1">
            <h3 class="text-xl font-bold text-gray-700 dark:text-gray-200">Status</h3>
        </div>
    </x-slot>
</x-show-layout>
