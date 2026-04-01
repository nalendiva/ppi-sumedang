@props(['title'])

<div class="bg-white rounded-xl shadow p-4">
    @if($title)
        <h3 class="text-lg font-semibold mb-2">{{ $title }}</h3>
    @endif

    {{ $slot }}
</div>