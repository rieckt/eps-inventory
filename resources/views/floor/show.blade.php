<x-show-layout title="Floor Details" :name="$floor->name" indexRoute="floor.index" :editRoute="['floor.edit', $floor->id]" :deleteRoute="['floor.destroy', $floor->id]" :itemId="$floor->id">
    <x-slot name="details">
        <div class="flex-1 p-6 bg-white rounded-lg shadow-lg dark:bg-gray-800">
            <div class="mb-4">
                <h3 class="text-2xl font-bold text-gray-700 dark:text-gray-200">
                    <i class="mr-3 text-3xl fas fa-info-circle"></i>Floor Details
                </h3>
                <h1 class="mt-2 text-xl text-gray-500">{{ $floor->name }}</h1>
            </div>

            <div class="mt-6">
                <h3 class="text-xl font-bold text-gray-700 dark:text-gray-200">Rooms on this floor:</h3>
                @forelse ($floor->rooms as $room)
                <x-clickable-link :route="'room.show'" :id="$room->id" :name="$room->name" class="inline-block px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-600"/>
                @empty
                    <p class="mt-2 text-gray-500">No rooms on this floor.</p>
                @endforelse
            </div>
        </div>
    </x-slot>
</x-show-layout>
