<x-show-layout title="Status Details" :name="$status->name" indexRoute="status.index" :editRoute="['status.edit', $status->id]" :deleteRoute="['status.destroy', $status->id]" :itemId="$status->id">
    <x-slot name="details">
        <div class="flex-1 p-6 bg-white rounded-lg shadow-lg dark:bg-gray-800">
            <div class="mb-4">
                <h3 class="flex items-center text-2xl font-bold text-gray-700 dark:text-gray-200">
                    <i class="mr-3 text-3xl fas fa-info-circle"></i>Status
                </h3>
                <h1 class="mt-2 text-xl text-gray-500">{{ $status->name }}</h1>
            </div>

            <div class="mt-6">
                <h3 class="flex items-center text-2xl font-bold text-gray-700 dark:text-gray-200">
                    <i class="mr-3 text-3xl fas fa-clipboard-list"></i>Items with this status:
                </h3>
                <div class="grid grid-cols-1 gap-4 mt-4">
                    @foreach($itemsWithSameStatus as $itemStatus)
                        @if($itemStatus->item)
                            <x-clickable-link :route="'itemStatus.index'" :id="$itemStatus->id" :name="$itemStatus->item->name"/>
                        @else
                            <p class="dark:text-gray-300">No associated item</p>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </x-slot>
</x-show-layout>
