@props(['color', 'route', 'title', 'count', 'icon', 'description', 'lastUpdated'])

@php
    $colors = [
        'red' => 'bg-red-500 hover:bg-red-600',
        'blue' => 'bg-blue-500 hover:bg-blue-600',
        'green' => 'bg-green-500 hover:bg-green-600',
        'yellow' => 'bg-yellow-500 hover:bg-yellow-600',
        'purple' => 'bg-purple-500 hover:bg-purple-600',
        'pink' => 'bg-pink-500 hover:bg-pink-600',
        'indigo' => 'bg-indigo-500 hover:bg-indigo-600',
    ];

    $colorClass = $colors[$color] ?? $colors['blue'];
@endphp

<a href="{{ route($route) }}"
   class="overflow-hidden text-white rounded-lg shadow-lg transform transition-all duration-500 ease-in-out hover:scale-105 hover:bg-opacity-90 {{ $colorClass }}"
   aria-label="{{ $description }}"
   role="button">
    <div class="px-6 py-4">
        <div class="flex items-center mt-2">
            <i class="{{ $icon }} text-3xl transform transition duration-500 ease-in-out hover:scale-110 hover:text-gray-300" title="{{ $description }}"></i>
            <h2 class="ml-4 text-xl font-semibold transition duration-500 hover:text-gray-300">
                {{ $title }}
            </h2>
        </div>
        <p class="mt-2 text-xl font-light">
            {{ $count }}
        </p>
        <p class="mt-2 text-sm font-light">
            {{ $description }}
        </p>
        <p class="mt-2 text-sm text-gray-300">
            Last updated: {{ $lastUpdated->diffForHumans() }}
        </p>
    </div>
</a>
