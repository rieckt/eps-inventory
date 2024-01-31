@props(['color', 'route', 'title', 'count'])

@php
    $colors = [
        'red' => 'bg-red-500',
        'blue' => 'bg-blue-500',
        'green' => 'bg-green-500',
        'yellow' => 'bg-yellow-500',
        'purple' => 'bg-purple-500',
    ];
@endphp

<a href="{{ route($route) }}" class="overflow-hidden text-white rounded-lg shadow transform transition duration-500 ease-in-out hover:scale-105 {{ $colors[$color] }}">
    <div class="p-5">
        <p class="text-sm font-semibold">
            {{ $title }}
        </p>
        <p class="text-lg font-semibold">
            {{ $count }}
        </p>
    </div>
</a>
