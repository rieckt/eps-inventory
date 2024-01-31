<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Floor List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-center mb-4">
                        <a href="{{ route('floor.create') }}">
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
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Delete</span>
                            </th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                        </x-slot>

                        @forelse ($floors as $item)
                            <tr class="transition-colors duration-200 hover:bg-gray-100 dark:hover:bg-gray-700">

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <a href="{{ route('floor.show', $item->id) }}">
                                        <x-secondary-button class="w-full mb-2">
                                            {{ $item->name }}
                                        </x-secondary-button>
                                    </a>
                                </td>


                                <td class="px-6 py-4 text-right whitespace-nowrap">
                                    <form action="{{ route('floor.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this floor?');">
                                        @csrf
                                        @method('DELETE')
                                        <x-danger-button class="w-full mb-2">
                                            Delete
                                        </x-danger-button>
                                    </form>
                                </td>

                                <td class="px-6 py-4 text-right whitespace-nowrap">
                                    <a href="{{ route('floor.edit', $item->id) }}">
                                        <x-secondary-button class="w-full mb-2">
                                            Edit
                                        </x-secondary-button>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="px-6 py-4 text-center">No floors found.</td>
                            </tr>
                        @endforelse
                    </x-table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
