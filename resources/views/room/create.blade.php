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
                    <x-create-form :model="$room" :fields="['name']" :dropdowns="[
                        'floor_id' => [
                            'label' => __('Floor'),
                            'options' => $floors,
                            'selected' => old('floor_id'),
                        ],
                    ]" route="room" :order="['name', 'floor_id']" />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
