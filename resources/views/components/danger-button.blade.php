<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-red-600 dark:bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-00 uppercase tracking-widest hover:bg-red-700 dark:hover:bg-red-700 focus:bg-red-700 dark:focus:bg-red-700 focus:outline-none transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
