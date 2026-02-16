<x-app-layout>
    <div class="p-6 max-w-6xl mx-auto">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-bold">Contacts</h2>

            <a href="{{ route('contacts.create') }}"
                class="bg-blue-500 text-white px-4 py-2 rounded">
                + Add Contact
            </a>
        </div>

        <div class="bg-white shadow rounded">
            <div class="bg-white rounded shadow overflow-hidden">

                <table class="w-full text-sm">

                    <thead class="bg-gray-100 text-gray-600">
                        <tr>
                            <th class="p-3 text-left">Name</th>
                            <th class="p-3 text-left">Email</th>
                            <th class="p-3 text-left">Phone</th>
                            <th class="p-3 text-left">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($contacts as $contact)
                        <tr class="border-t hover:bg-gray-50">

                            <td class="p-3 font-medium">
                                <a href="{{ route('contacts.show', $contact->id) }}"
                                    class="text-blue-600 hover:underline">
                                    {{ $contact->name }}
                                </a>

                            </td>

                            <td class="p-3 text-gray-600">
                                {{ $contact->email }}
                            </td>

                            <td class="p-3 text-gray-600">
                                {{ $contact->phone }}
                            </td>

                            <td class="p-3">
                                <div class="flex items-center gap-3">

                                    <!-- Edit -->
                                    <a href="{{ route('contacts.edit', $contact->id) }}"
                                        class="text-blue-500 hover:underline">
                                        Edit
                                    </a>

                                    <!-- Delete -->
                                    <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button onclick="return confirm('Are you sure to delete this contact?')" "
                                            class=" text-red-500 hover:underline">
                                            Delete
                                        </button>
                                    </form>

                                </div>
                            </td>

                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="p-6 text-center text-gray-400">
                                No contacts yet. Create your first contact.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>

                </table>

            </div>

        </div>
    </div>
</x-app-layout>