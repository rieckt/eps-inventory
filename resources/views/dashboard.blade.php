<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ $header ?? __('Inventory Manager EPS') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                <!-- General User Panel -->
                <hr class="col-span-2 my-4 border-t-2 border-gray-200 dark:border-gray-700" />
                <h2 class="col-span-2 text-2xl font-semibold leading-tight text-center text-gray-800 dark:text-gray-200">
                    USER DASHBOARD</h2>
                <hr class="col-span-2 my-4 border-t-2 border-gray-200 dark:border-gray-700" />

                <!-- User Dashboard -->

                <div class="flex items-center justify-center col-span-2 py-12">
                    <div class="w-full max-w-md px-8 pt-6 pb-8 mb-4 rounded shadow-md dark:text-white dark:bg-gray-800">
                        <div class="mb-4">
                            <h2 class="text-lg font-semibold leading-tight">Welcome, {{ Auth::user()->name }}!</h2>
                        </div>
                        <div class="mb-2">
                            <p class="text-sm">You are logged in as a {{ Auth::user()->role }}</p>
                        </div>
                        <div class="mb-2">
                            <p class="text-sm">You have been logged in since
                                {{ Auth::user()->created_at->format('F j, Y') }}.</p>
                        </div>
                    </div>
                </div>

                <!-- User Item Form -->

                <div class="flex items-center justify-center col-span-2 py-12">
                    <div class="w-1/2 px-8 pt-6 pb-8 mx-auto mb-4 rounded shadow-md dark:bg-gray-800 max w-md">
                        <div class="mb-4">
                            <h2 class="text-lg font-semibold leading-tight dark:text-gray-200">Use Item</h2>
                        </div>
                        <form action="{{ route('itemStatus.store') }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label for="item_id"
                                    class="block mb-2 text-sm dark:text-gray-200">Item</label>
                                <select name="item_id" id="item_id"
                                    class="w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:border-indigo-500 focus:outline-none focus:ring dark:bg-gray-800 dark:text-gray-200">
                                    @foreach ($items as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="status_id"
                                    class="block mb-2 text-sm text-white dark:text-gray-200">Status</label>
                                <select name="status_id" id="status_id"
                                    class="w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:border-indigo-500 focus:outline-none focus:ring dark:bg-gray-800 dark:text-gray-200">
                                    @foreach ($status as $status)
                                        <option value="{{ $status->id }}">{{ $status->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-0">
                                <button
                                    class="w-full px-4 py-2 text-white bg-indigo-500 rounded-md hover:bg-indigo-600 focus:outline-none focus:ring dark:bg-indigo-700 dark:hover:bg-indigo-800">Use
                                    Item</button>
                            </div>
                        </form>
                    </div>
                </div>

                <hr class="col-span-2 my-4 border-t-2 border-gray-200 dark:border-gray-700" />
                <h2
                    class="col-span-2 text-2xl font-semibold leading-tight text-center text-gray-800 dark:text-gray-200">
                    Deine ausgeliehenen Gegenstände</h2>
                <hr class="col-span-2 my-4 border-t-2 border-gray-200 dark:border-gray-700" />

                <!-- Your Items -->
                @if ($userItemStatusData)
                    <div class="mb-6">
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3 ">
                            @foreach ($userItemStatusData as $itemStatus)
                                @if ($itemStatus->status->id == 1)
                                    <div
                                        class="flex flex-col justify-between p-6 transition-shadow duration-300 ease-in-out bg-white rounded-lg shadow-md dark:bg-gray-800 hover:shadow-lg">
                                        <h3 class="mb-2 text-lg font-bold text-indigo-600 dark:text-indigo-400">
                                            {{ $itemStatus->item ? $itemStatus->item->name : 'No associated item' }}
                                        </h3>
                                        <span
                                            class="self-start inline-block px-3 py-1 text-sm font-medium text-white bg-indigo-600 rounded-full">
                                            {{ $itemStatus->status->name }}
                                        </span>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @else
                    <p class="text-sm text-gray-500 dark:text-gray-400">No item status data available.</p>
                @endif


                <!-- Admin Panel -->
                @if (Auth::user()->role == 'admin')
                    <hr class="col-span-2 my-4 border-t-2 border-gray-200 dark:border-gray-700" />
                    <h2
                        class="col-span-2 text-2xl font-semibold leading-tight text-center text-gray-800 dark:text-gray-200">
                        ADMIN PANEL</h2>
                    <hr class="col-span-2 my-4 border-t-2 border-gray-200 dark:border-gray-700" />

                    <!-- Admin Cards -->
                    <x-card color="green" route="items.index" title="Items" :count="$itemCount" :lastUpdated="$itemLastUpdated"
                        icon="fas fa-boxes" description="Manage your items. Here you can add, edit, or delete items." />
                    <x-card color="blue" route="room.index" title="Rooms" :count="$roomCount" :lastUpdated="$roomLastUpdated"
                        icon="fas fa-door-open"
                        description="Manage your rooms. Here you can add, edit, or delete rooms." />
                    <x-card color="yellow" route="floor.index" title="Floors" :count="$floorCount" :lastUpdated="$floorLastUpdated"
                        icon="fas fa-building"
                        description="Manage your floors. Here you can add, edit, or delete floors." />
                    <x-card color="red" route="category.index" title="Categories" :count="$categoryCount" :lastUpdated="$categoryLastUpdated"
                        icon="fas fa-tags"
                        description="Manage your categories. Here you can add, edit, or delete categories." />
                    <x-card color="pink" route="itemStatus.index" title="Item Status" :count="$itemstatusCount"
                        :lastUpdated="$itemstatusLastUpdated" icon="fas fa-user-graduate"
                        description="Manage your Item Status. Here you can add, edit, or delete item statuses." />
                    <x-card color="indigo" route="status.index" title="Status" :count="$statusCount" :lastUpdated="$statusLastUpdated"
                        icon="fas fa-box"
                        description="Manage your Status. Here you can add, edit, or delete statuses." />
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
