<x-app-layout>
    <div class="p-6 max-w-lg">

        <h2 class="text-xl font-bold mb-4">
            Add Activity for {{ $deal->title }}
        </h2>

        <form method="POST" action="{{ route('activities.store') }}">
            @csrf

            <input type="hidden" name="deal_id" value="{{ $deal->id }}">

            <!-- Type -->
            <select name="type" class="border p-2 w-full mb-2">
                <option value="call">Call</option>
                <option value="meeting">Meeting</option>
                <option value="note">Note</option>
            </select>

            <!-- Note -->
            <textarea name="note" class="border p-2 w-full mb-2" placeholder="Notes..."></textarea>

            <button class="bg-blue-500 text-white px-3 py-2">
                Save
            </button>

        </form>

    </div>
</x-app-layout>