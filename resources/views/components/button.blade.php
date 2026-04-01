@props([
    'variant' => 'primary'
])

@php
$base = "px-4 py-2 rounded-lg font-medium transition";

$variants = [
    'primary' => "bg-blue-600 text-white hover:bg-blue-700",
    'secondary' => "bg-gray-200 text-gray-800 hover:bg-gray-300",
    'danger' => "bg-red-600 text-white hover:bg-red-700",
];
@endphp

<button {{ $attributes->merge([
    'class' => $base . ' ' . $variants[$variant]
]) }}>
    {{ $slot }}
</button>