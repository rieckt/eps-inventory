<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Inventory Manager EPS') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="flex flex-col">
                        <div class="flex flex-col items-center">
                            <a href="{{ route('inventory.index') }}">
                                <x-secondary-button class="w-full mb-2">
                                    {{ __('Inventory') }}
                                </x-secondary-button>
                            </a>
                        </div>
                    </div>


                    <div class="flex flex-col">
                        <div class="flex flex-col items-center">
                            <p class="text-2xl font-bold">Welcome to Inventory Manager EPS</p>
                            <p class="text-xl">Please select an option from the menu above</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
