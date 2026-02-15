<x-app-layout>
    <div class="p-6 max-w-lg">

        <h2 class="text-xl font-bold mb-4">Edit Deal</h2>

        <form method="POST" action="{{ route('deals.update', $deal->id) }}">
            @csrf
            @method('PUT')

            <input type="text" name="title" value="{{ $deal->title }}" class="border p-2 w-full mb-2">

            <select name="contact_id" class="border p-2 w-full mb-2">
                @foreach($contacts as $contact)
                <option value="{{ $contact->id }}" {{ $deal->contact_id == $contact->id ? 'selected' : '' }}>
                    {{ $contact->name }}
                </option>
                @endforeach
            </select>

            <input type="number" name="amount" value="{{ $deal->amount }}" class="border p-2 w-full mb-2">

            <select name="stage" class="border p-2 w-full mb-2">
                <option value="new" {{ $deal->stage == 'new' ? 'selected' : '' }}>New</option>
                <option value="progress" {{ $deal->stage == 'progress' ? 'selected' : '' }}>In Progress</option>
                <option value="won" {{ $deal->stage == 'won' ? 'selected' : '' }}>Won</option>
                <option value="lost" {{ $deal->stage == 'lost' ? 'selected' : '' }}>Lost</option>
            </select>

            <button class="bg-blue-500 text-white px-3 py-2">
                Update
            </button>

        </form>

    </div>
</x-app-layout>