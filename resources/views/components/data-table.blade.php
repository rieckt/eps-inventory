@props(['items', 'route', 'columns', 'columnsHeader', 'buttonColumns' => []])

<x-table>
    <x-slot name="headings">
        @foreach($columnsHeader as $column)
            <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-gray-300">
                {{ $column }}
            </th>
        @endforeach
        <th scope="col" class="relative px-6 py-3">
            <span class="sr-only">Delete</span>
        </th>
        <th scope="col" class="relative px-6 py-3">
            <span class="sr-only">Edit</span>
        </th>
    </x-slot>

    @forelse ($items as $item)
        <tr class="transition-colors duration-200 hover:bg-gray-200 dark:hover:bg-gray-700">
            @foreach($columns as $column)
                <td class="px-6 py-4 whitespace-nowrap">
                    @if(in_array($column, $buttonColumns))
                        <a href="{{ route($route . '.show', $item->id) }}">
                            <x-secondary-button class="w-full mb-2">
                                {{ data_get($item, $column) }}
                            </x-secondary-button>
                        </a>
                    @else
                        {{ data_get($item, $column) }}
                    @endif
                </td>
            @endforeach

            <td class="px-6 py-4 whitespace-nowrap">
                <form action="{{ route($route . '.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?');">
                    @csrf
                    @method('DELETE')
                    <x-danger-button class="w-full mb-2 bg-red-500 hover:bg-red-700">
                        Delete
                    </x-danger-button>
                </form>
            </td>

            <td class="px-6 py-4 whitespace-nowrap">
                <a href="{{ route($route . '.edit', $item->id) }}">
                    <x-secondary-button class="w-full mb-2 bg-blue-500 hover:bg-blue-700">
                        Edit
                    </x-secondary-button>
                </a>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="{{ count($columns) + 2 }}" class="px-6 py-4 text-center">No items found.</td>
        </tr>
    @endforelse
</x-table>
