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
                Add Activity for {{ $deal->title }}
            </h2>

            <div class="flex items-center gap-3">

                <a href="{{ route('deals.index') }}"
                    class="text-gray-500 text-sm hover:underline">
                    ← Back
                </a>

            </div>

        </div>


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

            <button type="submit"
                onclick="this.disabled=true; this.innerText='Saving...'; this.form.submit();"
                class="bg-blue-500 text-white px-4 py-2 rounded">
                Save
            </button>

        </form>

    </div>
</x-app-layout>