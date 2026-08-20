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
    <meta name="google-site-verification" content="u8H8DU6XBXmtliUjNxBUGVA3xsxGiLtEVWWfmXwF53k">

    <link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="/favicon.svg" />
    <link rel="shortcut icon" href="/favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png" />
    <link rel="manifest" href="/site.webmanifest" />

    {{ $head ?? '' }}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 flex flex-col min-h-screen">
    <nav class="bg-white border-b px-6 py-4">
        <div class="max-w-6xl mx-auto flex items-center justify-between">
            <a href="/" class="flex items-center gap-2">
                <img src="{{ asset('logo.png') }}" alt="Bgern" class="w-8 h-8">
                <span class="font-bold text-xl text-indigo-600">Bgern</span>
            </a>

            <div class="hidden md:flex items-center gap-6 text-sm text-gray-700">
                <a href="{{ route('tools.index') }}" class="hover:text-indigo-600">All Tools</a>
                <a href="{{ route('categories.index') }}" class="hover:text-indigo-600">Categories</a>
                <a href="{{ route('blog.index') }}" class="hover:text-indigo-600">Blog</a>
                <a href="{{ route('contact') }}" class="hover:text-indigo-600">Contact</a>
            </div>


        </div>
    </nav>

    <main class="flex-1">
        {{ $slot }}
    </main>

<footer class="bg-white border-t mt-16 py-10 px-6">
    <div class="max-w-6xl mx-auto">
        <div class="flex flex-wrap justify-center gap-6 text-sm text-gray-600 mb-6">
            <a href="{{ route('about') }}" class="hover:text-indigo-600">About</a>
            <a href="{{ route('contact') }}" class="hover:text-indigo-600">Contact</a>
            <a href="{{ route('faq') }}" class="hover:text-indigo-600">FAQ</a>
            <a href="{{ route('privacy-policy') }}" class="hover:text-indigo-600">Privacy Policy</a>
            <a href="{{ route('terms') }}" class="hover:text-indigo-600">Terms of Service</a>
        </div>
        <div class="text-center text-gray-500 text-sm">
            <p class="font-bold text-gray-900 mb-2">Bgern</p>
            <p>All-in-one online tools. Free, fast, and secure for everyone.</p>
            <p class="mt-4">&copy; {{ date('Y') }} Bgern. All rights reserved.</p>
        </div>
    </div>
</footer>
</body>
</html>