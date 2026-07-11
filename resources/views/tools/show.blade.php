<x-layouts.public :title="$tool->name">
    <div class="max-w-2xl mx-auto py-12 px-4">
        <h1 class="text-2xl font-bold mb-4">{{ $tool->name }}</h1>
        <p class="text-gray-600 mb-6">{{ $tool->description }}</p>

        @include($componentView)

        @if($tool->faq)
            <div class="mt-10 border-t pt-6">
                <h2 class="text-lg font-bold mb-4">FAQ</h2>
                @foreach($tool->faq as $item)
                    <div class="mb-4">
                        <p class="font-semibold">{{ $item['question'] }}</p>
                        <p class="text-gray-600">{{ $item['answer'] }}</p>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-layouts.public>