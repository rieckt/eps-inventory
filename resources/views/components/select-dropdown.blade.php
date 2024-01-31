@props(['label', 'options', 'name', 'selected'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-700 dark:text-gray-300']) }}>
    {{ $value ?? $slot }}
</label>

<select id="{{ $name }}" name="{{ $name }}" class="block w-full mt-1 text-xs font-semibold tracking-widest uppercase transition duration-150 ease-in-out border-gray-300 rounded-md shadow-sm dark:text-gray-300 dark:border-gray-700 dark:bg-gray-900 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600" required>
    @foreach ($options as $option)
        <option value="{{ $option['value'] }}" {{ $option['value'] == $selected ? 'selected' : '' }}>
            {{ $option['label'] }}
        </option>
    @endforeach
</select>

@error($name)
    <div class="text-sm text-red-600">{{ $message }}</div>
@enderror
