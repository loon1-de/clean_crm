<x-app-layout>
    <div class="p-6 max-w-xl">

        <h2 class="text-2xl font-bold mb-4">Edit Contact</h2>

        <!-- 🔥 错误提示 -->
        @if ($errors->any())
        <div class="mb-4 bg-red-100 text-red-700 p-3 rounded">
            @foreach ($errors->all() as $error)
            <div>- {{ $error }}</div>
            @endforeach
        </div>
        @endif

        <form method="POST" action="{{ route('contacts.update', $contact->id) }}" class="space-y-4">
            @csrf
            @method('PUT')

            <!-- Name -->
            <div>
                <label class="block text-sm mb-1">Name</label>
                <input type="text" name="name" value="{{ old('name', $contact->name) }}"
                    class="w-full border p-2 rounded">
            </div>

            <!-- Email -->
            <div>
                <label class="block text-sm mb-1">Email</label>
                <input type="email" name="email" value="{{ old('email', $contact->email) }}"
                    class="w-full border p-2 rounded">
            </div>

            <!-- Phone -->
            <div>
                <label class="block text-sm mb-1">Phone</label>
                <input type="text" name="phone" value="{{ old('phone', $contact->phone) }}"
                    class="w-full border p-2 rounded">
            </div>

            <!-- Buttons -->
            <div class="flex gap-2">
                <button type="submit"
                    class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Update
                </button>


                <a href="{{ route('contacts.index') }}"
                    class="bg-gray-300 px-4 py-2 rounded hover:bg-gray-400">
                    Cancel
                </a>
            </div>

        </form>

    </div>
</x-app-layout>