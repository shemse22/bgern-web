<x-layouts.public :title="$tool->name . ' - Free Online Tool | Bgern'" :description="$tool->description" :canonical="route('tools.show', $tool->slug)">
    <x-slot:head>
        @if($tool->faq && count($tool->faq) > 0)
            <script type="application/ld+json">
            {!! json_encode([
                '@context' => 'https://schema.org',
                '@type' => 'FAQPage',
                'mainEntity' => collect($tool->faq)->map(fn($item) => [
                    '@type' => 'Question',
                    'name' => $item['question'],
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text' => $item['answer'],
                    ],
                ])->toArray(),
            ]) !!}
            </script>
        @endif
        <script type="application/ld+json">
        {!! json_encode([
            '@context' => 'https://schema.org',
            '@type' => 'SoftwareApplication',
            'name' => $tool->name,
            'description' => $tool->description,
            'applicationCategory' => 'UtilityApplication',
            'offers' => ['@type' => 'Offer', 'price' => '0', 'priceCurrency' => 'USD'],
        ]) !!}
        </script>
    </x-slot:head>

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