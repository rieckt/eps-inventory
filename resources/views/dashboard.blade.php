<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Inventory Manager EPS') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">

                <x-card color="blue" route="room.index" title="Total Rooms" :count="$roomsCount" />
                <x-card color="green" route="inventory.index" title="Total Inventories" :count="$inventoriesCount" />
                <x-card color="red" route="category.index" title="Total Categories" :count="$categoriesCount" />
                <x-card color="yellow" route="floor.index" title="Total Floors" :count="$floorsCount" />

            </div>
        </div>
    </div>
</x-app-layout>
