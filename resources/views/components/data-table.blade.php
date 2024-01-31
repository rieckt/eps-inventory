@props(['items', 'route', 'columns', 'columnsHeader', 'buttonColumns' => []])

<div class="flex items-center justify-between mb-3">
    <input type="text" placeholder="Search..." class="px-3 py-2 text-gray-800 bg-gray-100 border rounded dark:bg-gray-800 dark:text-white">
    <x-create-button :route="$route . '.create'" />
</div>

<div class="overflow-x-auto bg-white rounded-lg shadow dark:bg-gray-800">
    <table class="min-w-full leading-normal">
        <thead>
            <tr>
                @foreach ($columnsHeader as $column)
                    <th scope="col" class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-500 uppercase border-b-2 border-gray-200 bg-gray-50 dark:bg-gray-700 dark:text-gray-300">
                        {{ __($column) }}
                    </th>
                @endforeach
                <th scope="col" class="px-5 py-3 border-b-2 border-gray-200 bg-gray-50 dark:bg-gray-700">
                    <span class="sr-only">{{ __('Delete') }}</span>
                </th>
                <th scope="col" class="px-5 py-3 border-b-2 border-gray-200 bg-gray-50 dark:bg-gray-700">
                    <span class="sr-only">{{ __('Edit') }}</span>
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($items as $item)
                <tr>
                    @foreach ($columns as $column)
                        <td class="px-5 py-5 text-sm bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                            @if (in_array($column, $buttonColumns))
                                <a href="{{ route($route . '.show', $item->id) }}" class="text-blue-400 hover:text-blue-500">
                                    <x-secondary-button class="w-full mb-2">
                                        {{ data_get($item, $column) }}
                                    </x-secondary-button>
                                </a>
                            @else
                                {{ data_get($item, $column) }}
                            @endif
                        </td>
                    @endforeach
                    <td class="px-5 py-5 text-sm bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                        <form action="{{ route($route . '.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?');">
                            @csrf
                            @method('DELETE')
                            <x-danger-button>
                                {{ __('Delete') }}
                            </x-danger-button>
                        </form>
                    </td>
                    <td class="px-5 py-5 text-sm bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                        <a href="{{ route($route . '.edit', $item->id) }}" class="text-indigo-400 hover:text-indigo-500">
                            <x-secondary-button>
                                {{ __('Edit') }}
                            </x-secondary-button>
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="{{ count($columns) + 2 }}" class="px-5 py-5 text-sm bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                        {{ __('No items found.') }}
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-3">
    {{ $items->links() }}
</div>
