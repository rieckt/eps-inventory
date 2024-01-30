<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Inventory List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-center mb-4">
                        <a href="{{ route('inventory.create') }}">
                            <x-create-button>
                                {{ __('Create') }}
                            </x-create-button>
                        </a>
                    </div>
                    <x-table>
                        <x-slot name="headings">
                            <th scope="col"
                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                Name
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                ID
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-xs font-medium tracking-wider text-right text-gray-500 uppercase">
                                Barcode
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-xs font-medium tracking-wider text-right text-gray-500 uppercase">
                                Room ID
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-xs font-medium tracking-wider text-right text-gray-500 uppercase">
                                Category ID
                            </th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Delete</span>
                            </th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                        </x-slot>

                        @foreach ($inventory as $item)
                            <tr class="transition-colors duration-200 hover:bg-gray-100 dark:hover:bg-gray-700">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <a href="{{ route('inventory.show', $item->id) }}">
                                        <x-secondary-button class="w-full mb-2">
                                            {{ $item->name }}
                                        </x-secondary-button>
                                    </a>
                                </td>


                                <td class="px-6 py-4 text-gray-700 whitespace-nowrap dark:text-gray-300">
                                    {{ $item->id }}
                                </td>

                                <td class="px-6 py-4 text-right whitespace-nowrap">
                                    {{ $item->barcode }}
                                </td>

                                <td class="px-6 py-4 text-right whitespace-nowrap">
                                    {{ $item->room_id }}
                                </td>

                                <td class="px-6 py-4 text-right whitespace-nowrap">
                                    {{ $item->category_id }}
                                </td>


                                <td class="px-6 py-4 text-right whitespace-nowrap">
                                    <form action="{{ route('inventory.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <x-danger-button class="w-full mb-2">
                                            Delete
                                        </x-danger-button>
                                    </form>
                                </td>

                                <td class="px-6 py-4 text-right whitespace-nowrap">
                                    <a href="{{ route('inventory.edit', $item->id) }}">
                                        <x-secondary-button class="w-full mb-2">
                                            Edit
                                        </x-secondary-button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </x-table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
