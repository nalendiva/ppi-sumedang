<x-layouts.app title="Data Anggota">

    <div class="min-h-screen bg-primary py-10">

        <div class="max-w-5xl mx-auto px-6">

            {{-- TITLE --}}
            <h1 class="text-center text-2xl font-bold text-white mb-6">
                Member Validation
            </h1>

            {{-- SEARCH UI (DESIGN ONLY) --}}
            <div class="bg-white rounded-xl shadow-sm p-4 mb-6">
                <input 
                    type="text"
                    placeholder="Cari anggota..."
                    class="w-full border border-gray-200 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500"
                >
            </div>

            {{-- TABLE --}}
            <x-table :headers="['Nama', 'Angkatan', 'Status']">

                {{-- DUMMY DATA (UNTUK DESIGN) --}}
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 font-medium text-gray-800">Budi</td>
                    <td class="px-6 py-4 text-gray-600">2020</td>
                    <td class="px-6 py-4">
                        <span class="bg-green-100 text-green-700 px-3 py-1 text-xs rounded-full">
                            Aktif
                        </span>
                    </td>
                </tr>

                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 font-medium text-gray-800">Siti</td>
                    <td class="px-6 py-4 text-gray-600">2021</td>
                    <td class="px-6 py-4">
                        <span class="bg-yellow-100 text-yellow-700 px-3 py-1 text-xs rounded-full">
                            Alumni
                        </span>
                    </td>
                </tr>

                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 font-medium text-gray-800">Andi</td>
                    <td class="px-6 py-4 text-gray-600">2019</td>
                    <td class="px-6 py-4">
                        <span class="bg-green-100 text-green-700 px-3 py-1 text-xs rounded-full">
                            Aktif
                        </span>
                    </td>
                </tr>

            </x-table>

        </div>

    </div>

</x-layouts.app>