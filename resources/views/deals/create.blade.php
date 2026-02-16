@if ($errors->any())
<div class="bg-red-100 text-red-700 p-3 rounded mb-3">
    @foreach ($errors->all() as $error)
    <div>- {{ $error }}</div>
    @endforeach
</div>
@endif

<x-app-layout>
    <div class="p-6 max-w-6xl mx-auto">

        <div class="flex justify-between items-center mb-4">

            <h2 class="text-2xl font-bold">
                Add Deal
            </h2>

            <div class="flex items-center gap-3">

                <a href="{{ route('deals.index') }}"
                    class="text-gray-500 text-sm hover:underline">
                    ← Back
                </a>

            </div>

        </div>
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

            <button type="submit"
                onclick="this.disabled=true; this.innerText='Saving...'; this.form.submit();"
                class="bg-blue-500 text-white px-4 py-2 rounded">
                Save
            </button>

        </form>

    </div>
</x-app-layout>