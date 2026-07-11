<x-layouts.public :title="'Bgern - Free Online Tools'">
    <div class="max-w-6xl mx-auto px-4 py-12">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold mb-4">All-in-One Online Tools, Absolutely Free</h1>
            <p class="text-gray-600 text-lg">Fast, free, and secure. No sign-up required.</p>
        </div>

        <h2 class="text-2xl font-bold mb-6">Popular Tools</h2>

        @if($tools->isEmpty())
            <p class="text-gray-500">No tools available yet.</p>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                @foreach($tools as $tool)
                    <a href="{{ route('tools.show', $tool->slug) }}" class="block border rounded-lg p-6 hover:shadow-md transition">
                        <h3 class="font-bold text-lg mb-2">{{ $tool->name }}</h3>
                        <p class="text-gray-600 text-sm">{{ $tool->description }}</p>
                    </a>
                @endforeach
            </div>
        @endif
    </div>
</x-layouts.public>