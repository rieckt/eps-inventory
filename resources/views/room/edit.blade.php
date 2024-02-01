<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Edit room') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg dark:bg-gray-800">
                <div class="p-6 bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                    <x-update-form :model="$room" :fields="['name']" :dropdowns="['floor_id' => ['label' => __('Floor'), 'options' => $floors, 'selected' => $room->floor_id ?? '']]" route="room" :order="['name', 'floor_id']" />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
