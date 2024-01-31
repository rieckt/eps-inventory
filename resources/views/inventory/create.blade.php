<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Create Inventory Item') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <x-create-form :model="$inventory" :fields="['name', 'description', 'barcode']" :dropdowns="[
                        'room_id' => [
                            'label' => __('Room'),
                            'options' => $rooms,
                            'selected' => old('room_id'),
                        ],
                        'category_id' => [
                            'label' => __('Category'),
                            'options' => $categories,
                            'selected' => old('category_id'),
                        ],
                    ]" route="inventory" />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
