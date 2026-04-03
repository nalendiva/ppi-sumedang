@props([
    'label' => '',
    'name'  => '',
    'type'  => 'text',
    'placeholder' => '',
    'value' => '',
])

<div class="input-group relative">
    <label
        for="{{ $name }}"
        class="block text-xs font-semibold tracking-widest uppercase text-stone-400 mb-2 transition-colors duration-200 peer-focus:text-amber-600"
    >
        {{ $label }}
    </label>

    <div class="relative">
        {{-- Icon slot kiri --}}
        @if ($name === 'username')
        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-stone-300 pointer-events-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25H4.5a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5H4.5a2.25 2.25 0 00-2.25 2.25m19.5 0l-9.75 7.5-9.75-7.5"/>
            </svg>
        </span>
        @elseif ($name === 'password')
        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-stone-300 pointer-events-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z"/>
            </svg>
        </span>
        @endif

        <input
            id="{{ $name }}"
            name="{{ $name }}"
            type="{{ $type }}"
            value="{{ old($name, $value) }}"
            placeholder="{{ $placeholder }}"
            {{ $attributes->merge([
                'class' => 'peer w-full bg-stone-50 border border-stone-200 rounded-xl pl-11 pr-4 py-3.5 text-sm text-stone-800 placeholder-stone-300 outline-none transition-all duration-200 focus:border-amber-500 focus:ring-2 focus:ring-amber-500/10 focus:bg-white'
            ]) }}
        >
    </div>

    @error($name)
        <p class="mt-1.5 text-xs text-red-500 flex items-center gap-1">
            <svg class="w-3.5 h-3.5 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
            </svg>
            {{ $message }}
        </p>
    @enderror
</div>