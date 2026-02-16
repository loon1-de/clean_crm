<x-app-layout>
    <div class="p-6 max-w-6xl mx-auto">

        <h2 class="text-2xl font-bold mb-4">Dashboard</h2>

        <div class="grid grid-cols-3 gap-4">

            <!-- Contacts -->
            <div class="bg-white p-4 rounded shadow">
                <div class="text-gray-500">Contacts</div>
                <div class="text-2xl font-bold">
                    {{ $totalContacts }}
                </div>
            </div>

            <!-- Deals -->
            <div class="bg-white p-4 rounded shadow">
                <div class="text-gray-500">Deals</div>
                <div class="text-2xl font-bold">
                    {{ $totalDeals }}
                </div>
            </div>

            <!-- Revenue -->
            <div class="bg-white p-4 rounded shadow">
                <div class="text-gray-500">Revenue (Won)</div>
                <div class="text-2xl font-bold">
                    ${{ $totalRevenue }}
                </div>
            </div>

        </div>

    </div>
</x-app-layout>