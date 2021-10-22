<x-admin-dashboard>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tabel Frekuensi') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-2 lg:px-5">
            <div class="overflow-hidden sm:rounded-lg grid sm:grid-cols-1 lg:grid-cols-2 gap-4">
                <!-- tabel data -->
                <div class="p-5 bg-white border-b border-gray-200 rounded-lg shadow-sm">
                    <table class="min-w-full bg-white">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="w-2/3 text-center py-3 px-4 uppercase font-semibold text-sm">Data</th>
                                <th class="w-2/3 text-center py-3 px-4 uppercase font-semibold text-sm">Frekuensi</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            <tr>
                                <td class="w-1/3 text-center py-3 px-4">35</td>
                                <td class="w-1/3 text-center py-3 px-4">3</td>
                            </tr>
                            <tr class="bg-gray-200">
                                <td class="w-1/3 text-center py-3 px-4">35</td>
                                <td class="w-1/3 text-center py-3 px-4">2</td>
                            </tr>
                            <tr>
                                <td class="w-1/3 text-center py-3 px-4">35</td>
                                <td class="w-1/3 text-center py-3 px-4">1</td>
                            </tr>
                            <tr class="bg-gray-200">
                                <td class="w-1/3 text-center py-3 px-4">35</td>
                                <td class="w-1/3 text-center py-3 px-4">1</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- tabel frekensi -->
                <div class="p-5 bg-white border-b border-gray-200 rounded-lg shadow-sm h-32">
                    <table class="min-w-full bg-white">
                        <thead class="bg-yellow-500 text-white">
                            <tr>
                                <th class="w-1/3 text-center py-3 px-4 uppercase font-semibold text-sm">Min</th>
                                <th class="w-1/3 text-center py-3 px-4 uppercase font-semibold text-sm">Max</th>
                                <th class="w-3/12 text-center py-3 px-4 uppercase font-semibold text-sm">Rata-Rata</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            <tr>
                                <td class="w-1/3 text-center py-3 px-4">35</td>
                                <td class="w-1/3 text-center py-3 px-4">35</td>
                                <td class="w-1/3 text-center py-3 px-4">35</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-admin-dashboard>
