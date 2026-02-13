<x-app-layout>
    <div class="p-6 max-w-lg">

        <h2 class="text-xl font-bold mb-4">Add Contact</h2>

        <!-- 🔥 Error -->
        @if ($errors->any())
        <div class="mb-3 bg-red-100 p-2 text-red-700">
            @foreach ($errors->all() as $error)
            <div>- {{ $error }}</div>
            @endforeach
        </div>
        @endif

        <form method="POST" action="{{ route('contacts.store') }}">
            @csrf

            <input type="text" name="name" value="{{ old('name') }}" placeholder="Name" class="border p-2 w-full mb-2">

            <input type="email" name="email" value="{{ old('email') }}" placeholder="Email" class="border p-2 w-full mb-2">

            <input type="text" name="phone" value="{{ old('phone') }}" placeholder="Phone" class="border p-2 w-full mb-2">

            <button class="bg-blue-500 text-white px-3 py-2">Save</button>
            <a href="{{ route('contacts.index') }}"
                class="bg-gray-300 px-4 py-2 rounded hover:bg-gray-400">
                Cancel
            </a>
        </form>

    </div>
</x-app-layout>