<x-app-layout>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Inventory Manager EPS') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">

                <x-card color="blue" route="room.index" title="Rooms" :count="$roomsCount" :lastUpdated="$roomsLastUpdated" icon="fas fa-door-open" description="Manage your rooms" />
                <x-card color="green" route="inventory.index" title="Inventory" :count="$inventoriesCount" :lastUpdated="$inventoriesLastUpdated" icon="fas fa-boxes" description="Manage your inventories" />
                <x-card color="red" route="category.index" title="Categories" :count="$categoriesCount" :lastUpdated="$categoriesLastUpdated" icon="fas fa-tags" description="Manage your categories" />
                <x-card color="yellow" route="floor.index" title="Floors" :count="$floorsCount" :lastUpdated="$floorsLastUpdated" icon="fas fa-building" description="Manage your floors" />
                <x-card color="purple" route="teacher.index" title="Teachers" :count="$teachersCount" :lastUpdated="$teachersLastUpdated" icon="fas fa-chalkboard-teacher" description="Manage your teachers" />

            </div>
        </div>
    </div>
</x-app-layout>
