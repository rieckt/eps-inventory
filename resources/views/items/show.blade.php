<x-show-layout title="Item Details" :name="$item->name" indexRoute="items.index" :editRoute="['items.edit', $item->id]" :deleteRoute="['items.destroy', $item->id]"
    :itemId="$item->id">
    <x-slot name="details">
        <div class="flex flex-col gap-4 p-4 bg-white rounded-lg shadow-md md:flex-row dark:bg-gray-800">
            <div class="flex-1">
                <h2 class="mb-2 text-lg font-semibold text-gray-900 dark:text-white">Item Details:</h2>
                <p class="mb-2 text-gray-700 dark:text-gray-300">
                    <strong class="text-gray-900 dark:text-white">Description: </strong>{{ $item->description }}
                </p>
                <p class="mb-2 text-gray-700 dark:text-gray-300">
                    <strong>Room:</strong>
                    <x-clickable-link :route="'room.show'" :id="$item->room->id" :name="$item->room->name" />
                </p>
                <p class="mb-2 text-gray-700 dark:text-gray-300">
                    <strong>Category:</strong>
                    <x-clickable-link :route="'category.show'" :id="$item->category->id" :name="$item->category->name" />
                </p>

                @if ($item->itemStatus)
                    <p class="mb-2 text-gray-700 dark:text-gray-300">
                        <strong>Status:</strong> <x-clickable-link :route="'itemStatus.show'" :id="$item->itemStatus->id"
                            :name="$item->itemStatus->status" />
                    </p>
                    <p class="mb-2 text-gray-700 dark:text-gray-300">
                        <strong>Date:</strong> <span
                            class="font-semibold text-gray-700 dark:text-gray-200">{{ $item->itemStatus->date }}</span>
                    </p>
                    <p class="mb-2 text-gray-700 dark:text-gray-300">
                        <strong>Time:</strong> <span
                            class="font-semibold text-gray-700 dark:text-gray-200">{{ $item->itemStatus->time }}
                            Uhr</span>
                    </p>
                    <p class="mb-2 text-gray-700 dark:text-gray-300">
                        <strong>Description:</strong> <span
                            class="font-semibold text-gray-700 dark:text-gray-200">{{ $item->itemStatus->description }}</span>
                    </p>
                @else
                    <p class="mb-2 text-gray-700 dark:text-gray-300">
                        <strong>Status:</strong> <span class="font-semibold text-gray-700 dark:text-gray-200">No
                            Status</span>
                    </p>
                @endif
            </div>

            @if ($item->barcode)
                <div class="flex-1">
                    <h2 class="mb-2 text-lg font-semibold text-gray-900 dark:text-white">Barcode</h2>
                    <div class="p-4 bg-gray-200 rounded-lg dark:bg-gray-600">
                        <img src="data:image/png;base64,{{ DNS1D::getBarcodePNG($item->barcode, 'C39+', 3, 33) }}"
                            alt="barcode" />
                    </div>
                </div>
            @endif
        </div>
    </x-slot>
</x-show-layout>
