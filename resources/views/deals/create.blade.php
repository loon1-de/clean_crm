<x-app-layout>
    <div class="p-6 max-w-lg">

        <h2 class="text-xl font-bold mb-4">Add Deal</h2>

        <form method="POST" action="{{ route('deals.store') }}">
            @csrf

            <input type="text" name="title" placeholder="Title" class="border p-2 w-full mb-2">

            <!-- Contact -->
            <select name="contact_id" class="border p-2 w-full mb-2">
                <option value="">Select Contact</option>
                @foreach($contacts as $contact)
                <option value="{{ $contact->id }}">{{ $contact->name }}</option>
                @endforeach
            </select>

            <input type="number" name="amount" placeholder="Amount" class="border p-2 w-full mb-2">

            <!-- Stage -->
            <select name="stage" class="border p-2 w-full mb-2">
                <option value="new">New</option>
                <option value="progress">In Progress</option>
                <option value="won">Won</option>
                <option value="lost">Lost</option>
            </select>

            <button class="bg-blue-500 text-white px-3 py-2">
                Save
            </button>

        </form>

    </div>
</x-app-layout>