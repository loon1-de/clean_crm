<x-app-layout>
    <div class="p-6 max-w-6xl mx-auto">

        <!-- Header -->
        <div class="flex justify-between items-center mb-4">

            <h2 class="text-2xl font-bold">Contacts</h2>

            <div class="flex items-center gap-2">


                <!-- Add -->
                <a href="{{ route('contacts.create') }}"
                    class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    + Add Contact
                </a>

            </div>

        </div>

        <!-- Search -->
        <form method="GET" action="{{ route('contacts.index') }}" class="mb-4 flex gap-2">

            <input type="text" name="search"
                value="{{ request('search') }}"
                placeholder="Search by name, email or phone..."
                class="border rounded px-3 py-2 w-64">

            <!-- keep per_page -->
            <input type="hidden" name="per_page" value="{{ request('per_page', 10) }}">

            <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Search
            </button>

            <a href="{{ route('contacts.index') }}"
                class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">
                Reset
            </a>

        </form>

        <!-- Table -->
        <div class="bg-white shadow rounded overflow-hidden">

            <div class="overflow-x-auto">

                <table class="w-full text-sm">

                    <!-- Head -->
                    <thead class="bg-gray-100 text-gray-600">
                        <tr>
                            <th class="p-3 text-left">Name</th>
                            <th class="p-3 text-left">Email</th>
                            <th class="p-3 text-left">Phone</th>
                            <th class="p-3 text-left">Action</th>
                        </tr>
                    </thead>

                    <!-- Body -->
                    <tbody>
                        @forelse($contacts as $contact)
                        <tr class="border-t hover:bg-gray-50 transition">

                            <!-- Name -->
                            <td class="p-3 font-medium">
                                <a href="{{ route('contacts.show', $contact->id) }}"
                                    class="text-blue-600 hover:underline">
                                    {{ $contact->name }}
                                </a>
                            </td>

                            <!-- Email -->
                            <td class="p-3 text-gray-600">
                                {{ $contact->email }}
                            </td>

                            <!-- Phone -->
                            <td class="p-3 text-gray-600">
                                {{ $contact->phone }}
                            </td>

                            <!-- Action -->
                            <td class="p-3">
                                <div class="flex items-center gap-3">

                                    <a href="{{ route('contacts.edit', $contact->id) }}"
                                        class="text-blue-500 hover:underline">
                                        Edit
                                    </a>

                                    <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button onclick="return confirm('Are you sure to delete this contact?')"
                                            class="text-red-500 hover:underline">
                                            Delete
                                        </button>
                                    </form>

                                </div>
                            </td>

                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="p-8 text-center text-gray-400">
                                <div>No contacts found</div>
                                <div class="text-sm mt-1">Try adjusting your search</div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>

                </table>

            </div>

            <!-- Pagination -->
            <div class="p-4 flex justify-between items-center text-sm">

                <!-- Left: Showing -->
                <div class="text-gray-500">
                    Showing
                    {{ $contacts->firstItem() ?? 0 }}
                    -
                    {{ $contacts->lastItem() ?? 0 }}
                    of
                    {{ $contacts->total() }}
                </div>

                <!-- Right: Per Page + Controls -->
                <div class="flex items-center gap-4">

                    <!-- Per Page -->
                    <form method="GET" action="{{ route('contacts.index') }}">

                        <!-- keep search -->
                        <input type="hidden" name="search" value="{{ request('search') }}">

                        <div class="relative">

                            <select name="per_page"
                                onchange="this.form.submit()"
                                class="border rounded px-3 py-1 text-sm pr-8 bg-white">

                                @foreach([10,20,50,100] as $size)
                                <option value="{{ $size }}"
                                    {{ request('per_page', 10) == $size ? 'selected' : '' }}>
                                    {{ $size }} / page
                                </option>
                                @endforeach

                            </select>

                            <!-- Custom Arrow -->
                            <div class="absolute inset-y-0 right-2 flex items-center pointer-events-none">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </div>

                        </div>




                    </form>

                    <!-- Prev -->
                    <a href="{{ $contacts->previousPageUrl() ?? '#' }}"
                        class="px-3 py-1 border rounded {{ $contacts->onFirstPage() ? 'text-gray-400 pointer-events-none' : 'hover:bg-gray-100' }}">
                        Prev
                    </a>

                    <!-- Page -->
                    <span class="px-3 py-1 border rounded bg-gray-100">
                        {{ $contacts->currentPage() }}
                    </span>

                    <!-- Next -->
                    <a href="{{ $contacts->nextPageUrl() ?? '#' }}"
                        class="px-3 py-1 border rounded
            {{ !$contacts->hasMorePages() ? 'text-gray-400 pointer-events-none' : 'hover:bg-gray-100' }}">
                        Next
                    </a>

                </div>

            </div>

        </div>

    </div>
</x-app-layout>