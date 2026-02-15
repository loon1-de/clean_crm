<x-app-layout>
    <div class="p-6">

        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold">Deals Pipeline</h2>

            <a href="{{ route('deals.create') }}"
                class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                + Add Deal
            </a>
        </div>

        <!-- Pipeline -->
        <div class="grid grid-cols-4 gap-4">

            <!-- NEW -->
            <div class="bg-gray-100 p-3 rounded">
                <h3 class="font-bold mb-3">
                    New ({{ $newDeals->count() }})
                </h3>

                @forelse($newDeals as $deal)
                <div class="bg-white p-3 mb-3 rounded shadow hover:shadow-md transition">

                    <div class="font-semibold">{{ $deal->title }}</div>

                    <div class="text-sm text-gray-500">
                        {{ $deal->contact->name }}
                    </div>

                    <div class="mt-2 text-sm font-semibold">
                        ${{ number_format($deal->amount, 2) }}
                    </div>

                    <!-- Actions -->
                    <div class="mt-3 flex justify-between text-sm">

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
                <div class="text-sm text-gray-400">
                    No deals
                </div>
                @endforelse
            </div>

            <!-- PROGRESS -->
            <div class="bg-gray-100 p-3 rounded">
                <h3 class="font-bold mb-3">
                    In Progress ({{ $progressDeals->count() }})
                </h3>

                @forelse($progressDeals as $deal)
                <div class="bg-white p-3 mb-3 rounded shadow hover:shadow-md transition">

                    <div class="font-semibold">{{ $deal->title }}</div>

                    <div class="text-sm text-gray-500">
                        {{ $deal->contact->name }}
                    </div>

                    <div class="mt-2 text-sm font-semibold">
                        ${{ number_format($deal->amount, 2) }}
                    </div>

                    <div class="mt-3 flex justify-between text-sm">

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
                <div class="text-sm text-gray-400">
                    No deals
                </div>
                @endforelse
            </div>

            <!-- WON -->
            <div class="bg-gray-100 p-3 rounded">
                <h3 class="font-bold mb-3">
                    Won ({{ $wonDeals->count() }})
                </h3>

                @forelse($wonDeals as $deal)
                <div class="bg-white p-3 mb-3 rounded shadow hover:shadow-md transition">

                    <div class="font-semibold text-green-600">
                        {{ $deal->title }}
                    </div>

                    <div class="text-sm text-gray-500">
                        {{ $deal->contact->name }}
                    </div>

                    <div class="mt-2 text-sm font-semibold text-green-600">
                        ${{ number_format($deal->amount, 2) }}
                    </div>

                    <div class="mt-3 flex justify-between text-sm">

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
                <div class="text-sm text-gray-400">
                    No deals
                </div>
                @endforelse
            </div>

            <!-- LOST -->
            <div class="bg-gray-100 p-3 rounded">
                <h3 class="font-bold mb-3">
                    Lost ({{ $lostDeals->count() }})
                </h3>

                @forelse($lostDeals as $deal)
                <div class="bg-white p-3 mb-3 rounded shadow hover:shadow-md transition">

                    <div class="font-semibold text-red-500">
                        {{ $deal->title }}
                    </div>

                    <div class="text-sm text-gray-500">
                        {{ $deal->contact->name }}
                    </div>

                    <div class="mt-2 text-sm font-semibold text-red-500">
                        ${{ number_format($deal->amount, 2) }}
                    </div>

                    <div class="mt-3 flex justify-between text-sm">

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
                <div class="text-sm text-gray-400">
                    No deals
                </div>
                @endforelse
            </div>

        </div>

    </div>
</x-app-layout>