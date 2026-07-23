<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Bgern' }}</title>
    <meta name="description" content="{{ $description ?? 'Free online tools at Bgern.' }}">
    <link rel="canonical" href="{{ $canonical ?? url()->current() }}">
    <meta property="og:title" content="{{ $title ?? 'Bgern' }}">
    <meta property="og:description" content="{{ $description ?? 'Free online tools at Bgern.' }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ $canonical ?? url()->current() }}">
    <meta name="twitter:card" content="summary">
    {{ $head ?? '' }}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 flex flex-col min-h-screen">
    <nav class="bg-white border-b px-6 py-4">
        <div class="max-w-6xl mx-auto flex items-center justify-between">
            <a href="/" class="font-bold text-xl text-indigo-600">Bgern</a>

            <div class="hidden md:flex items-center gap-6 text-sm text-gray-700">
                <a href="{{ route('tools.index') }}" class="hover:text-indigo-600">All Tools</a>
                <a href="{{ route('categories.index') }}" class="hover:text-indigo-600">Categories</a>
                <a href="{{ route('blog.index') }}" class="hover:text-indigo-600">Blog</a>
                <a href="/" class="hover:text-indigo-600">Contact</a>
            </div>

            <div class="flex items-center gap-3">
                <a href="{{ route('login') }}" class="px-4 py-2 bg-indigo-600 text-white rounded-md text-sm font-medium hover:bg-indigo-700">
                    Sign In
                </a>
            </div>
        </div>
    </nav>

    <main class="flex-1">
        {{ $slot }}
    </main>

    <footer class="bg-white border-t mt-16 py-10 px-6">
        <div class="max-w-6xl mx-auto text-center text-gray-500 text-sm">
            <p class="font-bold text-gray-900 mb-2">Bgern</p>
            <p>All-in-one online tools. Free, fast, and secure for everyone.</p>
            <p class="mt-4">&copy; {{ date('Y') }} Bgern. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>