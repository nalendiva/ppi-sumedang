@props(['headers'])

<div class="bg-white rounded-2xl shadow-sm overflow-hidden">

    <table class="min-w-full">

        {{-- HEADER --}}
        <thead class="bg-gray-50">
            <tr>
                @foreach($headers as $header)
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wide">
                        {{ $header }}
                    </th>
                @endforeach
            </tr>
        </thead>

        {{-- BODY --}}
        <tbody class="divide-y divide-gray-100">
            {{ $slot }}
        </tbody>

    </table>

</div>