<x-show-layout title="Item Status Details" :name="$itemStatus->inventory->name" indexRoute="itemStatus.index" :editRoute="['itemStatus.edit', $itemStatus->id]" :deleteRoute="['itemStatus.destroy', $itemStatus->id]" :itemId="$itemStatus->id">
    <x-slot name="details">
        <div class="flex-1">
            <h2 class="text-xl font-bold text-gray-700 dark:text-gray-200">Item Status:</h2>
            <h1 class="text-gray-500">{{ $itemStatus->status->name }}</h1>
        </div>
    </x-slot>
</x-show-layout>
