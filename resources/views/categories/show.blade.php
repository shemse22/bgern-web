<x-layouts.public :title="$category->name . ' Tools - Bgern'">
    <div class="max-w-6xl mx-auto px-4 py-16">
        <a href="{{ route('categories.index') }}" class="text-indigo-600 text-sm mb-4 inline-block">&larr; All Categories</a>
        <h1 class="text-3xl font-bold mb-2 text-gray-900">{{ $category->name }}</h1>
        <p class="text-gray-600 mb-10">{{ $category->description }}</p>

        @if($tools->isEmpty())
            <p class="text-gray-500">No tools in this category yet.</p>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                @foreach($tools as $tool)
                    <a href="{{ route('tools.show', $tool->slug) }}" class="block bg-white border rounded-xl p-6 hover:shadow-lg hover:border-indigo-200 transition">
                        <div class="w-12 h-12 rounded-lg bg-indigo-100 text-indigo-600 flex items-center justify-center mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <h3 class="font-bold text-lg mb-2 text-gray-900">{{ $tool->name }}</h3>
                        <p class="text-gray-600 text-sm">{{ $tool->description }}</p>
                    </a>
                @endforeach
            </div>
        @endif
    </div>
</x-layouts.public>