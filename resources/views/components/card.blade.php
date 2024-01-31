@props(['color', 'route', 'title', 'count', 'icon', 'description', 'lastUpdated'])

@php
    $colors = [
        'red' => 'bg-red-500 hover:bg-red-600',
        'blue' => 'bg-blue-500 hover:bg-blue-600',
        'green' => 'bg-green-500 hover:bg-green-600',
        'yellow' => 'bg-yellow-500 hover:bg-yellow-600',
        'purple' => 'bg-purple-500 hover:bg-purple-600',
    ];
@endphp

<a href="{{ route($route) }}" class="overflow-hidden text-white rounded-lg shadow-lg transform transition-all duration-500 ease-in-out hover:scale-105 hover:bg-opacity-90 {{ $colors[$color] }}" aria-label="{{ $description }}">
    <div class="px-6 py-4">
        <div class="flex items-center">
            <i class="{{ $icon }} text-3xl transform transition duration-500 ease-in-out hover:scale-125" title="{{ $description }}"></i>
            <p class="ml-4 text-lg font-semibold transition duration-500 hover:text-gray-300">
                {{ $title }}
            </p>
        </div>
        <p class="mt-2 text-2xl font-light">
            {{ $count }}
        </p>
        <p class="mt-2 text-sm font-light">
            {{ $description }}
        </p>
        <p class="mt-2 text-xs text-gray-300">
            Last updated: {{ $lastUpdated->diffForHumans() }}
        </p>
    </div>
</a>
