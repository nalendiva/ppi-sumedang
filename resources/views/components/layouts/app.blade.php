<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'PPI Sumedang' }}</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-green text-gray-800">

    <x-navbar />

    <main>
        {{ $slot }}
    </main>

</body>
</html>