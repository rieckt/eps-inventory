@foreach ($items as $item)
    <a href="{{ route('inventory.show', $item->inventory->id) }}" class="text-blue-500 hover:underline">
        <x-secondary-button class="w-full mb-2">
            {{ $item->inventory->name }}
        </x-secondary-button>
    </a>
@endforeach
