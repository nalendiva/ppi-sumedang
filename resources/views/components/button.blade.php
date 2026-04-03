@props([
    'type' => 'button',
    'variant' => 'primary',
])

@php
    $base = 'relative inline-flex items-center justify-center w-full gap-2 font-semibold text-sm tracking-wide rounded-xl transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 overflow-hidden group';

    $variants = [
        'primary' => 'bg-emerald-800 hover:bg-emerald-500 text-white focus:ring-emerald-800 py-3.5 px-6 shadow-lg shadow-emerald-800/25 hover:shadow-emerald-800/40 active:scale-[0.98]',
        'ghost'   => 'bg-transparent border border-stone-200 text-stone-600 hover:bg-stone-50 focus:ring-stone-300 py-3 px-6',
    ];
@endphp

<button
    type="{{ $type }}"
    {{ $attributes->merge(['class' => $base . ' ' . ($variants[$variant] ?? $variants['primary'])]) }}
>
    {{-- Shine effect --}}
    <span class="absolute inset-0 -translate-x-full group-hover:translate-x-full transition-transform duration-500 bg-gradient-to-r from-transparent via-white/20 to-transparent skew-x-12 pointer-events-none"></span>

    {{ $slot }}
</button>