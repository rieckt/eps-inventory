<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Edit Item Status') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg dark:bg-gray-800">
                <div class="p-6 bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                    <x-update-form :model="$itemStatus" :fields="[
                        'date',
                        'time',
                        'description',
                        'inventory.id',
                        'room.id',
                        'teacher.id',
                        'status.id',
                    ]" route="itemStatus" :order="[
                        'inventory_id',
                        'status_id',
                        'teacher_id',
                        'room_id',
                        'description',
                        'date',
                        'time',
                    ]" :dropdowns="[
                        'inventory_id' => [
                            'label' => __('Item'),
                            'options' => $inventories,
                            'selected' => old('inventory.id', $itemStatus->inventory_id),
                        ],
                        'room_id' => [
                            'label' => __('Room'),
                            'options' => $rooms,
                            'selected' => old('room.id', $itemStatus->room_id),
                        ],
                        'teacher_id' => [
                            'label' => __('Teacher'),
                            'options' => $teachers,
                            'selected' => old('teacher.id', $itemStatus->teacher_id),
                        ],
                        'status_id' => [
                            'label' => __('Status'),
                            'options' => $statuses,
                            'selected' => old('status.id', $itemStatus->status_id),
                        ],
                    ]" />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
