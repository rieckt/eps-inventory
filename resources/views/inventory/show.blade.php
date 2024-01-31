<x-show-layout title="Inventory Details" :name="$inventory->name" indexRoute="inventory.index" :editRoute="['inventory.edit', $inventory->id]" :deleteRoute="['inventory.destroy', $inventory->id]" :itemId="$inventory->id">
    <x-slot name="details">
        <div class="flex-1">
            <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                {{ __('Description: ') . $inventory->description }}</p>
            <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                {{ __('Room: ') . $inventory->room->name }}</p>
            <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                {{ __('Category: ') . $inventory->category->name }}</p>
        </div>
        @if ($inventory->barcode)
            <div class="flex-1">
                <div class="p-6 rounded-lg shadow bg-gray-50 dark:bg-gray-700">
                    <h2 class="mb-4 text-lg font-semibold text-gray-700 dark:text-gray-200">Barcode</h2>
                    <img src="data:image/png;base64,{{ DNS1D::getBarcodePNG($inventory->barcode, 'C39+') }}"
                        alt="barcode" />
                </div>
            </div>
        @endif
    </x-slot>
</x-show-layout>
