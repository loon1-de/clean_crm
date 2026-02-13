<x-app-layout>
    <div class="p-6">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-bold">Contacts</h2>

            <a href="{{ route('contacts.create') }}"
                class="bg-blue-500 text-white px-4 py-2 rounded">
                + Add Contact
            </a>
        </div>

        <div class="bg-white shadow rounded">
            <table class="w-full table-auto">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="p-3 text-left">Name</th>
                        <th class="p-3 text-left">Email</th>
                        <th class="p-3 text-left">Phone</th>
                        <th class="p-3 text-left">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($contacts as $contact)
                    <tr class="border-t">
                        <td class="p-3">{{ $contact->name }}</td>
                        <td class="p-3">{{ $contact->email }}</td>
                        <td class="p-3">{{ $contact->phone }}</td>
                        <td class="p-3">
                            <a href="{{ route('contacts.edit', $contact->id) }}" class="text-blue-500">Edit</a>

                            <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')

                                <button onclick="return confirm('Delete?')" class="text-red-500 ml-2">
                                    Delete
                                </button>
                            </form>
                        </td>

                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="p-3 text-center text-gray-500">
                            No contacts yet
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>