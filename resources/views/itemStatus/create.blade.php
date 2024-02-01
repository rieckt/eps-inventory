<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Create Item Status') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <x-create-form :model="$itemStatus" :fields="['description', 'date', 'time']" :dropdowns="[
                        'inventory_id' => [
                            'label' => __('Item'),
                            'options' => $inventories,
                            'selected' => old('inventory_id'),
                        ],
                        'room_id' => [
                            'label' => __('Room'),
                            'options' => $rooms,
                            'selected' => old('room_id'),
                        ],
                        'teacher_id' => [
                            'label' => __('Teacher'),
                            'options' => $teachers,
                            'selected' => old('teacher_id'),
                        ],
                        'status_id' => [
                            'label' => __('Status'),
                            'options' => $statuses,
                            'selected' => old('status_id'),
                        ],
                    ]" :order="['inventory_id', 'status_id', 'teacher_id', 'room_id', 'description', 'date', 'time']" route="itemStatus" />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
