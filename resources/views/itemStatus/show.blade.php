@php
    $date = new DateTime($itemStatus->date);
    $time = new DateTime($itemStatus->time);

    $dateFormatter = new IntlDateFormatter('de_DE', IntlDateFormatter::LONG, IntlDateFormatter::NONE);
    $timeFormatter = new IntlDateFormatter('de_DE', IntlDateFormatter::NONE, IntlDateFormatter::SHORT);

    $formattedDate = $dateFormatter->format($date);
    $formattedTime = $timeFormatter->format($time);
@endphp

<x-show-layout title="Item Status Details" :name="$itemStatus->item ? $itemStatus->item->name : 'No associated item'" indexRoute="itemStatus.index" :editRoute="['itemStatus.edit', $itemStatus->id]"
    :deleteRoute="['itemStatus.destroy', $itemStatus->id]" :itemId="$itemStatus->id">
    <x-slot name="details">
        <div class="flex flex-col p-4 bg-white rounded-lg shadow-md md:flex-row dark:bg-gray-800">
            <div class="flex-1">
                <h2 class="mb-2 text-xl font-bold text-gray-700 dark:text-gray-200"><i
                        class="mr-2 fas fa-info-circle"></i>Item Details:</h2>
                <div class="grid grid-cols-1 gap-2 mt-1 text-gray-500 dark:text-gray-300">
                    <div><strong>Status:</strong> <span
                            class="font-semibold text-gray-700 dark:text-gray-200">{{ $itemStatus->status->name }}</span>
                    </div>
                    <div><strong>Date:</strong> <span
                            class="font-semibold text-gray-700 dark:text-gray-200">{{ $formattedDate }}</span></div>
                    <div><strong>Time:</strong> <span
                            class="font-semibold text-gray-700 dark:text-gray-200">{{ $formattedTime }} Uhr</span></div>
                    <div><strong>Description:</strong> <span
                            class="font-semibold text-gray-700 dark:text-gray-200">{{ $itemStatus->description }}</span>
                    </div>
                </div>
                <h2 class="mt-4 mb-2 text-xl font-bold text-gray-700 dark:text-gray-200"><i
                        class="mr-2 fas fa-link"></i>Related Links:</h2>
                <div class="grid grid-cols-1 gap-2 mt-1 text-gray-500 dark:text-gray-300">
                    <div><strong>Item:</strong>
                        @if ($itemStatus->item)
                            <x-clickable-link :route="'items.show'" :id="$itemStatus->item->id" :name="$itemStatus->item->name" />
                        @else
                            No associated item
                        @endif
                    </div>
                    <div><strong>Room:</strong>
                        @if ($itemStatus->room)
                            <x-clickable-link :route="'room.show'" :id="$itemStatus->room->id" :name="$itemStatus->room->name" />
                        @else
                            No associated room
                        @endif
                    </div>
                    <div><strong>Teacher</strong> <span
                            class="font-semibold text-gray-700 dark:text-gray-200">{{ $itemStatus->teacher->name }}</span>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-show-layout>
