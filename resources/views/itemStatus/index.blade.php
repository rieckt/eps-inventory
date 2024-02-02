<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Item Status List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <x-data-table :items="$itemStatus->map(function ($item) {
                        $item->date = $item->date->format('F j, Y');
                        $item->time = $item->time->format('g:i a');
                        return $item;
                    })" route="itemStatus" :columns="[
                        'item.name',
                        'status.name',
                        'date',
                        'time',
                        'description',
                        'room.name',
                        'teacher.name',
                    ]" :columnsHeader="[
                        'Item Name',
                        'Status',
                        'Date',
                        'Time',
                        'Description',
                        'Room',
                        'Teacher',
                    ]" :buttonColumns="['item.name']" />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
