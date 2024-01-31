<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Floor Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg dark:bg-gray-800">
                <div class="p-6 bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex flex-col gap-6 md:flex-row">
                        <div class="flex-1">
                            <h2 class="text-2xl font-bold text-gray-700 dark:text-gray-200">{{ $floor->name }}</h2>
                        </div>
                    </div>

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


                    <div class="flex items-center justify-between mt-4">
                        <div>
                            <a href="{{ route('floor.index') }}">
                                <x-primary-button class="ml-3">
                                    {{ __('Back') }}
                                </x-primary-button>
                            </a>
                        </div>
                        <div class="flex items-center">
                            <a href="{{ route('floor.edit', $floor->id) }}">
                                <x-secondary-button class="ml-3">
                                    {{ __('Edit') }}
                                </x-secondary-button>
                            </a>
                            <form action="{{ route('floor.destroy', $floor->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this floor?');">
                                @csrf
                                @method('DELETE')
                                <x-danger-button class="ml-3">
                                    {{ __('Delete') }}
                                </x-danger-button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
