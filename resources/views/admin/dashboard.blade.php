<x-app-layout>
    <div class="max-w-6xl mx-auto py-10 px-4">
        <div class="mb-8 opacity-0 animate-fade-in" style="animation-delay: 0ms;">
            <div class="flex items-center gap-3 mb-1">
                <h1 class="text-3xl font-bold text-gray-900">Dashboard</h1>
                <span class="px-2.5 py-0.5 rounded-full bg-green-100 text-green-700 text-xs font-medium">Live</span>
            </div>
            <p class="text-gray-500">Welcome back — here's what's happening with Bgern.</p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-5 mb-10">
            <div class="bg-white border rounded-2xl p-6 hover:shadow-lg hover:-translate-y-0.5 transition-all duration-300 opacity-0 animate-fade-in" style="animation-delay: 50ms;">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-11 h-11 rounded-xl bg-gradient-to-br from-indigo-500 to-indigo-600 text-white flex items-center justify-center shadow-sm shadow-indigo-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <span class="text-xs font-medium text-green-600 flex items-center gap-0.5">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path d="M12 7a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0V8.414l-4.293 4.293a1 1 0 01-1.414 0L8 10.414l-4.293 4.293a1 1 0 01-1.414-1.414l5-5a1 1 0 011.414 0L11 10.586 14.586 7H12z"/></svg>
                    </span>
                </div>
                <p class="text-3xl font-bold text-gray-900 tabular-nums">{{ $toolCount }}</p>
                <p class="text-sm text-gray-500 mt-1">Total Tools</p>
            </div>

            <div class="bg-white border rounded-2xl p-6 hover:shadow-lg hover:-translate-y-0.5 transition-all duration-300 opacity-0 animate-fade-in" style="animation-delay: 100ms;">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-11 h-11 rounded-xl bg-gradient-to-br from-purple-500 to-purple-600 text-white flex items-center justify-center shadow-sm shadow-purple-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                    </div>
                </div>
                <p class="text-3xl font-bold text-gray-900 tabular-nums">{{ $categoryCount }}</p>
                <p class="text-sm text-gray-500 mt-1">Categories</p>
            </div>

            <div class="bg-white border rounded-2xl p-6 hover:shadow-lg hover:-translate-y-0.5 transition-all duration-300 opacity-0 animate-fade-in" style="animation-delay: 150ms;">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-11 h-11 rounded-xl bg-gradient-to-br from-orange-500 to-orange-600 text-white flex items-center justify-center shadow-sm shadow-orange-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                    </div>
                </div>
                <p class="text-3xl font-bold text-gray-900 tabular-nums">{{ $postCount }}</p>
                <p class="text-sm text-gray-500 mt-1">Blog Posts</p>
            </div>

            <div class="bg-white border rounded-2xl p-6 hover:shadow-lg hover:-translate-y-0.5 transition-all duration-300 opacity-0 animate-fade-in" style="animation-delay: 200ms;">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-11 h-11 rounded-xl bg-gradient-to-br from-green-500 to-green-600 text-white flex items-center justify-center shadow-sm shadow-green-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                </div>
                <p class="text-3xl font-bold text-gray-900 tabular-nums">{{ $publishedPostCount }}</p>
                <p class="text-sm text-gray-500 mt-1">Published Posts</p>
            </div>
        </div>

        <div class="mb-8 opacity-0 animate-fade-in" style="animation-delay: 250ms;">
            <h2 class="text-lg font-bold text-gray-900 mb-4">Quick Actions</h2>
            <div class="grid md:grid-cols-3 gap-5">
                <a href="{{ route('admin.tools.index') }}" class="group bg-white border rounded-2xl p-6 hover:border-indigo-300 hover:shadow-lg hover:-translate-y-0.5 transition-all duration-300">
                    <div class="flex items-start justify-between mb-3">
                        <div class="w-10 h-10 rounded-lg bg-indigo-100 text-indigo-600 flex items-center justify-center group-hover:bg-indigo-600 group-hover:text-white transition-colors duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-300 group-hover:text-indigo-500 group-hover:translate-x-1 transition-all duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-900 mb-1">Manage Tools</h3>
                    <p class="text-sm text-gray-500">Add, edit, or remove tools from the site</p>
                </a>

                <a href="{{ route('admin.categories.index') }}" class="group bg-white border rounded-2xl p-6 hover:border-purple-300 hover:shadow-lg hover:-translate-y-0.5 transition-all duration-300">
                    <div class="flex items-start justify-between mb-3">
                        <div class="w-10 h-10 rounded-lg bg-purple-100 text-purple-600 flex items-center justify-center group-hover:bg-purple-600 group-hover:text-white transition-colors duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                            </svg>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-300 group-hover:text-purple-500 group-hover:translate-x-1 transition-all duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-900 mb-1">Manage Categories</h3>
                    <p class="text-sm text-gray-500">Organize tools into browsable categories</p>
                </a>

                <a href="{{ route('admin.blog.index') }}" class="group bg-white border rounded-2xl p-6 hover:border-orange-300 hover:shadow-lg hover:-translate-y-0.5 transition-all duration-300">
                    <div class="flex items-start justify-between mb-3">
                        <div class="w-10 h-10 rounded-lg bg-orange-100 text-orange-600 flex items-center justify-center group-hover:bg-orange-600 group-hover:text-white transition-colors duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-300 group-hover:text-orange-500 group-hover:translate-x-1 transition-all duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-900 mb-1">Manage Blog</h3>
                    <p class="text-sm text-gray-500">Write, edit, and publish blog posts</p>
                </a>
            </div>
        </div>
    </div>

    <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(8px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in {
            animation: fadeIn 0.5s ease-out forwards;
        }
    </style>
</x-app-layout>