@foreach ($fields as $field)
<div class="px-4 py-2 mb-4 bg-gray-800 rounded-lg">
    <x-input-label for="{{ $field }}" :value="__(ucfirst($field))" class="text-lg font-semibold text-gray-200" />

        @if ($field === 'barcode')
            <x-text-input id="{{ $field }}" class="block w-full mt-1" type="text" name="{{ $field }}" :value="old($field, $model->$field)" oninput="updateBarcode(this.value)" required autofocus />
            <div class="p-6 mt-4 rounded-lg shadow bg-gray-50 dark:bg-gray-700"
                style="{{ old($field, $model->$field) ? '' : 'display: none;' }}" id="barcodeContainer">
                <h2 class="mb-4 text-lg font-semibold text-gray-700 dark:text-gray-200">Barcode</h2>
                <img id="barcodeImage" class="p-2 border-2 border-gray-300 rounded"
                    src="{{ old($field, $model->$field) ? 'data:image/png;base64,' . DNS1D::getBarcodePNG(old($field, $model->$field), 'C39+', 3, 33, [1, 1, 1], true) : '' }}"
                    alt="barcode" />
            </div>
        @else
            <x-text-input id="{{ $field }}" class="block w-full mt-1" type="text" name="{{ $field }}" :value="old($field, $model->$field)" required autofocus />
        @endif

        @error($field)
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>
@endforeach

@foreach ($dropdowns as $name => $dropdown)
    <div class="px-4 py-2 mb-4 bg-gray-800 rounded-lg">
        <x-input-label for="{{ $name }}" :value="$dropdown['label']" class="text-lg font-semibold text-gray-200" />
        <x-select-dropdown :options="$dropdown['options']" :name="$name" :selected="$dropdown['selected']" />
        @error($name)
            <p class="text-sm text-red-500">{{ $message }}</p>
        @enderror
    </div>
@endforeach
