<x-show-layout title="Room Details" :name="$room->name" indexRoute="room.index" :editRoute="['room.edit', $room->id]" :deleteRoute="['room.destroy', $room->id]" :itemId="$room->id">
    <x-slot name="details">
        <div class="flex-1">
            <h3 class="text-xl font-bold text-gray-700 dark:text-gray-200">{{ __('Floor:') }}</h3>
            <a href="{{ route('floor.show', $room->floor_id) }}" class="text-blue-500 hover:underline">
                <x-secondary-button class="w-full mb-2">
                    {{ $room->floor ? $room->floor->name : __('Floor does not exist') }}
                </x-secondary-button>
            </a>
        </div>
    </x-slot>
</x-show-layout>
