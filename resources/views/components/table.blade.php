<table class="min-w-full mx-auto text-center divide-y divide-gray-200">
    <thead class="bg-gray-50 dark:bg-gray-800">
        <tr>
            {{ $headings }}
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
        {{ $slot }}
    </tbody>
</table>
