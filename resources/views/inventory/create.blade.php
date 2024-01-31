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
                    <form action="{{ route('inventory.store') }}" method="POST">
                        @csrf

                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" class="block w-full mt-1" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="description" :value="__('Description')" />
                            <x-text-input id="description" class="block w-full mt-1" type="text" name="description" :value="old('description')" required autofocus autocomplete="description" />
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="barcode" :value="__('Barcode')" />
                            <x-text-input id="barcode" class="block w-full mt-1" type="text" name="barcode" :value="old('barcode')" required autofocus autocomplete="barcode" />
                            <x-input-error :messages="$errors->get('barcode')" class="mt-2" />
                        </div>

                        <x-select-dropdown label="{{ __('Room') }}" :options="$rooms" name="room_id" :selected="$inventory->room->id ?? ''" />
                        <x-select-dropdown label="{{ __('Category') }}" :options="$categories" name="category_id" :selected="$inventory->category->id ?? ''" />

                        <div class="flex items-center justify-end mt-4">
                            <a href="{{ route('inventory.index') }}">
                                <x-secondary-button class="mr-4">
                                    {{ __('Cancel') }}
                                </x-secondary-button>
                            </a>
                            <a href="{{ route('inventory.create') }}">
                                <x-create-button class="mr-4">
                                    {{ __('create') }}
                                </x-create-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
