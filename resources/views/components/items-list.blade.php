@foreach ($items as $item)
    <a href="{{ route('items.show', $item->items->id) }}" class="text-blue-500 hover:underline">
        <x-secondary-button class="w-full mb-2">
            {{ $item->items->name }}
        </x-secondary-button>
    </a>
@endforeach
