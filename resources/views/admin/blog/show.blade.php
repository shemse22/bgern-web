<x-layouts.public
    :title="($post->meta_title ?: $post->title) . ' - Bgern Blog'"
    :description="$post->meta_description ?: $post->excerpt"
    :canonical="route('blog.show', $post->slug)"
>
    <x-slot:head>
        <script type="application/ld+json">
        {!! json_encode([
            '@context' => 'https://schema.org',
            '@type' => 'Article',
            'headline' => $post->title,
            'description' => $post->meta_description ?: $post->excerpt,
            'datePublished' => $post->published_at?->toIso8601String(),
            'dateModified' => $post->updated_at->toIso8601String(),
            'image' => $post->thumbnail ? asset('storage/' . $post->thumbnail) : null,
            'author' => ['@type' => 'Organization', 'name' => 'Bgern'],
        ]) !!}
        </script>
    </x-slot:head>

    <div class="max-w-3xl mx-auto px-4 py-16">
        <a href="{{ route('blog.index') }}" class="text-indigo-600 text-sm mb-4 inline-block">&larr; Back to Blog</a>

        @if($post->thumbnail)
            <img src="{{ asset('storage/' . $post->thumbnail) }}" class="w-full h-64 object-cover rounded-2xl mb-8">
        @endif

        <h1 class="text-3xl font-bold mb-2 text-gray-900">{{ $post->title }}</h1>
        <p class="text-gray-500 text-sm mb-8">{{ $post->published_at?->format('F j, Y') }}</p>
        <div class="prose max-w-none text-gray-700">
            {!! $post->body !!}
        </div>
    </div>
</x-layouts.public>