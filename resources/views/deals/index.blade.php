<x-app-layout>
    <div class="p-6 max-w-6xl mx-auto">

        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold">Deals</h2>

            <a href="{{ route('deals.create') }}"
                class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                + Add Deal
            </a>
        </div>

        <!-- Pipeline -->
        <div class="grid grid-cols-4 gap-5">

            <!-- NEW -->
            <div class="bg-white border rounded shadow-sm">

                <!-- Header -->
                <div class="border-b px-3 py-2 flex justify-between items-center bg-gray-50">
                    <h3 class="font-semibold text-sm">New</h3>
                    <span class="text-xs text-gray-500">
                        {{ $newDeals->count() }}
                    </span>
                </div>

                <!-- Body -->
                <div class="p-3 space-y-3 min-h-[200px]">

                    @forelse($newDeals as $deal)
                    <div class="border rounded p-3 hover:shadow-md transition">

                        <div class="font-medium">
                            <a href="{{ route('deals.show', $deal->id) }}"
                                class="text-blue-600 hover:underline">
                                {{ $deal->title }}
                            </a>
                        </div>

                        <div class="text-xs text-gray-500">
                            {{ $deal->contact->name }}
                        </div>

                        <div class="mt-1 text-sm font-semibold">
                            RM {{ number_format($deal->amount, 2) }}
                        </div>

                        <div class="mt-2 flex justify-between text-xs">

                            <a href="{{ route('activities.create', $deal->id) }}"
                                class="text-green-600 hover:underline">
                                + Activity
                            </a>

                            <a href="{{ route('deals.edit', $deal->id) }}"
                                class="text-blue-500 hover:underline">
                                Edit
                            </a>

                        </div>

                    </div>

                    @empty
                    <div class="text-center text-gray-400 text-sm py-6">
                        No deals
                    </div>
                    @endforelse

                </div>

            </div>

            <!-- PROGRESS -->
            <div class="bg-white border rounded shadow-sm">

                <div class="border-b px-3 py-2 flex justify-between items-center bg-yellow-50">
                    <h3 class="font-semibold text-sm">In Progress</h3>
                    <span class="text-xs text-gray-500">
                        {{ $progressDeals->count() }}
                    </span>
                </div>

                <div class="p-3 space-y-3 min-h-[200px]">

                    @forelse($progressDeals as $deal)
                    <div class="border rounded p-3 hover:shadow-md transition">

                        <div class="font-medium">
                            <a href="{{ route('deals.show', $deal->id) }}"
                                class="text-blue-600 hover:underline">
                                {{ $deal->title }}
                            </a>
                        </div>

                        <div class="text-xs text-gray-500">
                            {{ $deal->contact->name }}
                        </div>

                        <div class="mt-1 text-sm font-semibold">
                            RM {{ number_format($deal->amount, 2) }}
                        </div>

                        <div class="mt-2 flex justify-between text-xs">

                            <a href="{{ route('activities.create', $deal->id) }}"
                                class="text-green-600 hover:underline">
                                + Activity
                            </a>

                            <a href="{{ route('deals.edit', $deal->id) }}"
                                class="text-blue-500 hover:underline">
                                Edit
                            </a>

                        </div>

                    </div>

                    @empty
                    <div class="text-center text-gray-400 text-sm py-6">
                        No deals
                    </div>
                    @endforelse

                </div>

            </div>

            <!-- WON -->
            <div class="bg-white border rounded shadow-sm">

                <div class="border-b px-3 py-2 flex justify-between items-center bg-green-50">
                    <h3 class="font-semibold text-sm">Won</h3>
                    <span class="text-xs text-gray-500">
                        {{ $wonDeals->count() }}
                    </span>
                </div>

                <div class="p-3 space-y-3 min-h-[200px]">

                    @forelse($wonDeals as $deal)
                    <div class="border rounded p-3 hover:shadow-md transition">

                        <div class="font-medium text-green-600">
                            <a href="{{ route('deals.show', $deal->id) }}"
                                class="hover:underline">
                                {{ $deal->title }}
                            </a>
                        </div>

                        <div class="text-xs text-gray-500">
                            {{ $deal->contact->name }}
                        </div>

                        <div class="mt-1 text-sm font-semibold text-green-600">
                            RM {{ number_format($deal->amount, 2) }}
                        </div>

                        <div class="mt-2 flex justify-between text-xs">

                            <a href="{{ route('activities.create', $deal->id) }}"
                                class="text-green-600 hover:underline">
                                + Activity
                            </a>

                            <a href="{{ route('deals.edit', $deal->id) }}"
                                class="text-blue-500 hover:underline">
                                Edit
                            </a>

                        </div>

                    </div>

                    @empty
                    <div class="text-center text-gray-400 text-sm py-6">
                        No deals
                    </div>
                    @endforelse

                </div>

            </div>

            <!-- LOST -->
            <div class="bg-white border rounded shadow-sm">

                <div class="border-b px-3 py-2 flex justify-between items-center bg-red-50">
                    <h3 class="font-semibold text-sm">Lost</h3>
                    <span class="text-xs text-gray-500">
                        {{ $lostDeals->count() }}
                    </span>
                </div>

                <div class="p-3 space-y-3 min-h-[200px]">

                    @forelse($lostDeals as $deal)
                    <div class="border rounded p-3 hover:shadow-md transition">

                        <div class="font-medium text-red-500">
                            <a href="{{ route('deals.show', $deal->id) }}"
                                class="hover:underline">
                                {{ $deal->title }}
                            </a>
                        </div>

                        <div class="text-xs text-gray-500">
                            {{ $deal->contact->name }}
                        </div>

                        <div class="mt-1 text-sm font-semibold text-red-500">
                            RM {{ number_format($deal->amount, 2) }}
                        </div>

                        <div class="mt-2 flex justify-between text-xs">

                            <a href="{{ route('activities.create', $deal->id) }}"
                                class="text-green-600 hover:underline">
                                + Activity
                            </a>

                            <a href="{{ route('deals.edit', $deal->id) }}"
                                class="text-blue-500 hover:underline">
                                Edit
                            </a>

                        </div>

                    </div>

                    @empty
                    <div class="text-center text-gray-400 text-sm py-6">
                        No deals
                    </div>
                    @endforelse

                </div>

            </div>

        </div>


    </div>
</x-app-layout>