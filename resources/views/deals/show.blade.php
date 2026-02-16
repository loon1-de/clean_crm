<x-app-layout>
    <div class="p-6 max-w-6xl mx-auto">

        <!-- Header -->
        <div class="flex justify-between items-center mb-4">

            <h2 class="text-2xl font-bold">
                {{ $deal->title }}
            </h2>

            <div class="flex items-center gap-3">

                <a href="{{ route('deals.edit', $deal->id) }}"
                    class="text-blue-500 hover:underline">
                    Edit
                </a>

                <a href="{{ route('deals.index') }}"
                    class="text-gray-500 text-sm hover:underline">
                    ← Back
                </a>

            </div>

        </div>


        <!-- Deal Info -->
        <div class="bg-white p-4 rounded shadow mb-4">

            <div class="mb-2">
                <span class="text-gray-500">Amount:</span>
                <span class="font-semibold">
                    RM {{ number_format($deal->amount, 2) }}
                </span>
            </div>

            <div class="mb-2">
                <span class="text-gray-500">Stage:</span>
                <span class="capitalize">{{ $deal->stage }}</span>
            </div>

            <div>
                <span class="text-gray-500">Contact:</span>
                <span class="font-semibold">
                    {{ $deal->contact->name }}
                </span>
            </div>

        </div>

        <!-- Activity Section -->
        <div class="bg-white p-4 rounded shadow">

            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-bold">Activities</h3>

                <a href="{{ route('activities.create', $deal->id) }}"
                    class="bg-green-500 text-white px-3 py-1 rounded">
                    + Add
                </a>
            </div>

            <!-- Timeline -->
            @forelse($activities as $activity)
            <div class="border-b py-3">

                <div class="flex justify-between">
                    <span class="font-semibold capitalize">
                        {{ $activity->type }}
                    </span>

                    <span class="text-sm text-gray-500">
                        {{ $activity->created_at->format('Y-m-d H:i') }}
                    </span>
                </div>

                @if($activity->note)
                <div class="text-gray-700 mt-1">
                    {{ $activity->note }}
                </div>
                @endif

            </div>
            @empty
            <div class="text-gray-400">
                No activity yet
            </div>
            @endforelse

        </div>

    </div>
</x-app-layout>