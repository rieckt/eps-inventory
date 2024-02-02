<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Edit Item') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg dark:bg-gray-800">
                <div class="p-6 bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                    <x-update-form :model="$item" :fields="['name', 'description', 'barcode']"
                        :dropdowns="[
                            'room_id' => ['label' => __('Room'), 'options' => $rooms, 'selected' => $item->room->id ?? ''],
                            'category_id' => ['label' => __('Category'), 'options' => $categories, 'selected' => $item->category->id ?? '']
                        ]"
                        route="items" :order="['name', 'description', 'barcode', 'room_id', 'category_id']" />
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
