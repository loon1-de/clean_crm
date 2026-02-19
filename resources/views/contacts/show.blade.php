<x-app-layout>
    <div class="p-6 max-w-6xl mx-auto">

        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <div>
                <h2 class="text-2xl font-bold">
                    {{ $contact->name }}
                </h2>
                <p class="text-sm text-gray-500">Contact Details</p>
            </div>

            <div class="flex items-center gap-3">
                <a href="{{ route('contacts.edit', $contact->id) }}"
                    class="text-blue-500">
                    Edit
                </a>

                <a href="{{ route('contacts.index') }}"
                    class="text-gray-500 text-sm">
                    ← Back
                </a>
            </div>
        </div>

        <!-- Info -->
        <div class="bg-white border rounded shadow-sm p-4 mb-6">

            <div class="mb-3">
                <div class="text-xs text-gray-500">Email</div>
                <div class="text-sm font-medium">
                    {{ $contact->email ?? '-' }}
                </div>
            </div>

            <div>
                <div class="text-xs text-gray-500">Phone</div>
                <div class="text-sm font-medium">
                    {{ $contact->phone ?? '-' }}
                </div>
            </div>

        </div>

        <!-- Deals -->
        <div class="bg-white border rounded shadow-sm">

            <div class="border-b px-4 py-2 font-semibold text-sm">
                Deals
            </div>

            <div class="p-4">

                @forelse($contact->deals as $deal)
                <div class="border-b py-2 flex justify-between items-center">

                    <div>
                        <a href="{{ route('deals.show', $deal->id) }}"
                            class="text-blue-600 hover:underline">
                            {{ $deal->title }}
                        </a>

                        <div class="text-xs text-gray-500">
                            {{ ucfirst($deal->stage) }}
                        </div>
                    </div>

                    <div class="text-sm font-semibold">
                        RM {{ number_format($deal->amount, 2) }}
                    </div>

                </div>
                @empty
                <div class="text-sm text-gray-400">
                    No deals for this contact
                </div>
                @endforelse

            </div>

        </div>

    </div>
</x-app-layout>