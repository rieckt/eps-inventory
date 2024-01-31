@props(['type' => 'submit', 'route'])

<a href="{{ route($route) }}">
    <button {{ $attributes->merge(['type' => $type, 'class' => 'inline-flex items-center px-6 py-3 bg-blue-600 border border-transparent rounded-md font-semibold text-sm text-white uppercase tracking-widest hover:bg-blue-500 active:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 shadow-lg']) }}>
        {{ __('Create') }}
    </button>
</a>
