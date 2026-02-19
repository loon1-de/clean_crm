<x-app-layout>
    <div class="p-6 max-w-6xl mx-auto">

        <!-- Header -->
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-bold">Deals</h2>

            <a href="{{ route('deals.create') }}"
                class="bg-blue-500 text-white px-4 py-2 rounded">
                + Add Deal
            </a>
        </div>

        <!-- Search -->
        <form method="GET" action="{{ route('deals.index') }}" class="mb-4 flex gap-2">

            <input type="text" name="search"
                value="{{ request('search') }}"
                placeholder="Search deals..."
                class="border rounded px-3 py-2 w-64">

            <input type="hidden" name="per_page" value="{{ request('per_page', 10) }}">

            <button class="bg-blue-500 text-white px-4 py-2 rounded">
                Search
            </button>

            <a href="{{ route('deals.index') }}"
                class="px-4 py-2 bg-gray-200 rounded">
                Reset
            </a>

        </form>

        <!-- Pipeline -->
        <div class="grid grid-cols-4 gap-5">

            @foreach([
            'new' => $newDeals,
            'progress' => $progressDeals,
            'won' => $wonDeals,
            'lost' => $lostDeals
            ] as $stage => $stageDeals)

            <div class="bg-white border rounded shadow-sm">

                <!-- Header -->
                <div class="border-b px-3 py-2 bg-gray-50 flex justify-between">
                    <h3 class="font-semibold capitalize">
                        {{ $stage }}
                    </h3>
                    <span class="text-sm text-gray-500">
                        {{ $stageDeals->count() }}
                    </span>
                </div>

                <!-- Body -->
                <div class="p-3 space-y-3 min-h-[200px]">

                    @forelse($stageDeals as $deal)

                    <div class="border rounded p-3 hover:shadow">

                        <div class="font-medium">
                            <a href="{{ route('deals.show', $deal->id) }}"
                                class="text-blue-600 hover:underline">
                                {{ $deal->title }}
                            </a>
                        </div>

                        <div class="text-xs text-gray-500">
                            {{ $deal->contact->name ?? '-' }}
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
                    <div class="text-sm text-gray-400 text-center py-6">
                        No deals
                    </div>
                    @endforelse

                </div>

            </div>

            @endforeach

        </div>

        <!-- Pagination -->
        <div class="mt-6 p-4 flex justify-between items-center text-sm">

            <!-- Showing -->
            <div class="text-gray-500">
                Showing
                {{ $deals->firstItem() ?? 0 }}
                -
                {{ $deals->lastItem() ?? 0 }}
                of
                {{ $deals->total() }}
            </div>

            <!-- Controls -->
            <div class="flex items-center gap-4">

                <!-- Per Page -->
                <form method="GET" action="{{ route('deals.index') }}">

                    <input type="hidden" name="search" value="{{ request('search') }}">

                    <select name="per_page"
                        onchange="this.form.submit()"
                        class="border rounded px-2 py-1 text-sm">

                        @foreach([10,20,50,100] as $size)
                        <option value="{{ $size }}"
                            {{ request('per_page', 10) == $size ? 'selected' : '' }}>
                            {{ $size }} / page
                        </option>
                        @endforeach

                    </select>

                </form>

                <!-- Prev -->
                <a href="{{ $deals->previousPageUrl() ?? '#' }}"
                    class="px-3 py-1 border rounded
                    {{ $deals->onFirstPage() ? 'text-gray-400 pointer-events-none' : '' }}">
                    Prev
                </a>

                <!-- Page -->
                <span class="px-3 py-1 border rounded bg-gray-100">
                    {{ $deals->currentPage() }}
                </span>

                <!-- Next -->
                <a href="{{ $deals->nextPageUrl() ?? '#' }}"
                    class="px-3 py-1 border rounded
                    {{ !$deals->hasMorePages() ? 'text-gray-400 pointer-events-none' : '' }}">
                    Next
                </a>

            </div>

        </div>

    </div>
</x-app-layout>