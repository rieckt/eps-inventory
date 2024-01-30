<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Edit Inventory') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg dark:bg-gray-800">
                <div class="p-6 bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                    <form method="POST" action="{{ route('inventory.update', $inventory->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" class="block w-full mt-1" type="text" name="name"
                                :value="$inventory->name" required autofocus />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="description" :value="__('Description')" />
                            <x-text-input id="description" class="block w-full mt-1" type="text" name="description"
                                :value="$inventory->description" required />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="room_id" :value="__('Room ID')" />
                            <x-text-input id="room_id" class="block w-full mt-1" type="text" name="room_id"
                                :value="$inventory->room_id" required />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="category_id" :value="__('Category ID')" />
                            <x-text-input id="category_id" class="block w-full mt-1" type="text" name="category_id"
                                :value="$inventory->category_id" required />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="barcode" :value="__('Barcode')" />
                            <x-text-input id="barcode" class="block w-full mt-1" type="text" name="barcode"
                                :value="$inventory->barcode" oninput="updateBarcode(this.value)" />

                                <div class="p-6 mt-4 rounded-lg shadow bg-gray-50 dark:bg-gray-700" style="{{ isset($inventory->barcode) ? '' : 'display: none;' }}" id="barcodeContainer">
                                    <h2 class="mb-4 text-lg font-semibold text-gray-700 dark:text-gray-200">Barcode</h2>
                                    <img id="barcodeImage" class="p-2 border-2 border-gray-300 rounded"
                                        src="{{ isset($inventory->barcode) ? 'data:image/png;base64,' . DNS1D::getBarcodePNG($inventory->barcode, 'C39+', 3, 33, [1, 1, 1], true) : '' }}"
                                        alt="barcode" />
                                </div>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ml-4">
                                {{ __('Update') }}
                            </x-primary-button>

                            <a href="{{ route('inventory.index') }}" class="ml-4">
                                <x-secondary-button class="ml-3">
                                    {{ __('Back') }}
                                </x-secondary-button>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    function updateBarcode(value) {
        var barcodeImage = document.getElementById('barcodeImage');
        var barcodeContainer = document.getElementById('barcodeContainer');
        if (value) {
            fetch('/barcode/' + value)
                .then(response => response.text())
                .then(data => {
                    barcodeImage.src = 'data:image/png;base64,' + data;
                    barcodeContainer.style.display = 'block';
                });
        } else {
            barcodeContainer.style.display = 'none';
        }
    }
</script>
