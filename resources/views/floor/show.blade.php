<x-show-layout title="Floor Details" :name="$floor->name" indexRoute="floor.index" :editRoute="['floor.edit', $floor->id]" :deleteRoute="['floor.destroy', $floor->id]" :itemId="$floor->id">
    <x-slot name="details">
        <div class="flex-1">
            <h3 class="text-xl font-bold text-gray-700 dark:text-gray-200">Rooms on this floor:</h3>
            @forelse ($roomsOnSameFloor as $roomOnSameFloor)
                <a href="{{ route('room.show', $roomOnSameFloor->id) }}" class="mb-2 text-blue-500 hover:underline">
                    <x-secondary-button class="w-full">
                        {{ $roomOnSameFloor->name }}
                    </x-secondary-button>
                </a>
            @empty
                <p class="text-gray-500">No rooms on this floor.</p>
            @endforelse
        </div>
    </x-slot>
</x-show-layout>
