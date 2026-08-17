<x-layouts.public :title="'Blog - Bgern'">
    <div class="max-w-4xl mx-auto px-4 py-16">
        <h1 class="text-3xl font-bold mb-10 text-gray-900">Blog</h1>

        @if($posts->isEmpty())
            <p class="text-gray-500">No posts yet.</p>
        @else
            <div class="space-y-6">
                @foreach($posts as $post)
                    <a href="{{ route('blog.show', $post->slug) }}" class="flex gap-5 bg-white border rounded-xl p-6 hover:shadow-lg hover:border-indigo-200 transition">
                        @if($post->thumbnail)
                            <img src="{{ asset('storage/' . $post->thumbnail) }}" class="w-32 h-32 object-cover rounded-lg flex-shrink-0">
                        @endif
                        <div>
                            <h2 class="text-xl font-bold text-gray-900 mb-2">{{ $post->title }}</h2>
                            <p class="text-gray-500 text-sm mb-2">{{ $post->published_at?->format('F j, Y') }}</p>
                            <p class="text-gray-600">{{ $post->excerpt }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
        @endif
    </div>
</x-layouts.public>