@props([
    'headers' => [],
])

<div class="overflow-hidden rounded-2xl border border-stone-100">
    <table class="w-full text-sm">
        <thead>
            <tr class="bg-stone-50 border-b border-stone-100">
                @foreach ($headers as $header)
                    <th class="px-6 py-3.5 text-left text-[10px] font-semibold tracking-widest uppercase text-stone-400">
                        {{ $header }}
                    </th>
                @endforeach
            </tr>
        </thead>
        <tbody id="anggotaTableBody" class="bg-white divide-y divide-stone-50">
            {{ $slot }}
        </tbody>
    </table>
</div>