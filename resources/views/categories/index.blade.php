<x-layouts.public :title="'Categories - Bgern'">
    <div class="max-w-6xl mx-auto px-4 py-16">
        <h1 class="text-3xl font-bold mb-10 text-gray-900">Browse by Category</h1>

        @if($categories->isEmpty())
            <p class="text-gray-500">No categories yet.</p>
        @else
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                @foreach($categories as $category)
                    <a href="{{ route('categories.show', $category->slug) }}" class="bg-white border rounded-xl p-5 hover:shadow-lg hover:border-indigo-200 transition">
                        <div class="w-10 h-10 rounded-lg bg-purple-100 text-purple-600 flex items-center justify-center mb-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                            </svg>
                        </div>
                        <h3 class="font-semibold text-gray-900">{{ $category->name }}</h3>
                        <p class="text-gray-500 text-sm">{{ $category->tools_count }} {{ Str::plural('tool', $category->tools_count) }}</p>
                    </a>
                @endforeach
            </div>
        @endif
    </div>
</x-layouts.public>