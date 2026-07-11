<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Bgern' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50">
    <nav class="bg-white border-b px-6 py-4">
        <a href="/" class="font-bold text-xl text-indigo-600">Bgern</a>
    </nav>

    <main>
        {{ $slot }}
    </main>
</body>
</html>