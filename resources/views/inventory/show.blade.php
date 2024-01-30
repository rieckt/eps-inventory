<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Inventory Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg dark:bg-gray-800">
                <div class="p-6 bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex flex-col gap-6 md:flex-row">
                        <div class="flex-1">
                            <h2 class="text-2xl font-bold text-gray-700 dark:text-gray-200">{{ $inventory->name }}</h2>
                            <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                                {{ __('Description: ') . $inventory->description }}</p>
                            <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                                {{ __('Room ID: ') . $inventory->room_id }}</p>
                            <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                                {{ __('Category ID: ') . $inventory->category_id }}</p>
                        </div>
                        @if ($inventory->barcode)
                            <div class="flex-1">
                                <div class="p-6 rounded-lg shadow bg-gray-50 dark:bg-gray-700">
                                    <h2 class="mb-4 text-lg font-semibold text-gray-700 dark:text-gray-200">Barcode</h2>
                                    <img src="data:image/png;base64,{{ DNS1D::getBarcodePNG($inventory->barcode, 'C39+') }}"
                                        alt="barcode" />
                                </div>
                            </div>
                        @endif
                    </div>

                    <div class="flex items-center justify-between mt-4">
                        <div>
                            <a href="{{ route('inventory.index') }}">
                                <x-primary-button class="ml-3">
                                    {{ __('Back') }}
                                </x-primary-button>
                            </a>
                        </div>
                        <div class="flex items-center">
                            <a href="{{ route('inventory.edit', $inventory->id) }}">
                                <x-secondary-button class="ml-3">
                                    {{ __('Edit') }}
                                </x-secondary-button>
                            </a>
                            <form action="{{ route('inventory.destroy', $inventory->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <x-danger-button class="ml-3">
                                    {{ __('Delete') }}
                                </x-danger-button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
