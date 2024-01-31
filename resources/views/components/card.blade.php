@props(['color', 'route', 'title', 'count'])

<a href="{{ route($route) }}" class="overflow-hidden text-white rounded-lg shadow transform transition duration-500 ease-in-out hover:scale-105 bg-{{ $color }}-500">
    <div class="p-5">
        <p class="text-sm font-semibold">
            {{ $title }}
        </p>
        <p class="text-lg font-semibold">
            {{ $count }}
        </p>
    </div>
</a>
