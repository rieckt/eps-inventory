<x-show-layout title="Room Details" :name="$room->name" indexRoute="room.index" :editRoute="['room.edit', $room->id]" :deleteRoute="['room.destroy', $room->id]" :itemId="$room->id">
    <x-slot name="details">
        <div class="flex-1 p-6 bg-white rounded-lg shadow-lg dark:bg-gray-800">
            <h3 class="flex items-center mb-4 text-2xl font-bold text-gray-700 dark:text-gray-200">
                <i class="mr-3 text-3xl fas fa-building"></i>{{ __('Floor:') }}
            </h3>
            <x-clickable-link :route="'floor.show'" :id="$room->floor->id" :name="$room->floor->name" class="inline-block px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-600"/>
        </div>
    </x-slot>
</x-show-layout>
