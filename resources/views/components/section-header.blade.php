@props([
    'label'     => '',
    'title'     => '',
    'subtitle'  => '',
    'href'      => '#',
    'linkLabel' => 'Lihat Semua',
])

<div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4">
    <div>
        @if ($label)
        <span class="inline-block text-xs font-semibold tracking-widest uppercase text-emerald-600 bg-emerald-50 border border-emerald-100 px-3 py-1.5 rounded-full mb-4">
            {{ $label }}
        </span>
        @endif
        <h2 class="text-2xl md:text-3xl font-bold text-stone-800 leading-tight" style="font-family: 'DM Serif Display', serif;">
            {{ $title }}
        </h2>
        @if ($subtitle)
        <p class="text-stone-400 text-sm mt-2 max-w-lg leading-relaxed">{{ $subtitle }}</p>
        @endif
    </div>

    <a
        href="{{ $href }}"
        class="inline-flex items-center gap-2 text-sm font-semibold text-stone-500 hover:text-emerald-600 transition-colors shrink-0 group"
    >
        {{ $linkLabel }}
        <svg class="w-4 h-4 group-hover:translate-x-0.5 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/>
        </svg>
    </a>
</div>