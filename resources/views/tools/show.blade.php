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

    <div class="max-w-2xl mx-auto py-16 px-4">
        <div class="flex items-center gap-4 mb-6">
            <div class="w-14 h-14 rounded-xl bg-indigo-100 text-indigo-600 flex items-center justify-center flex-shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
            </div>
            <div>
                <h1 class="text-2xl font-bold text-gray-900">{{ $tool->name }}</h1>
                <p class="text-gray-500 text-sm">{{ $tool->description }}</p>
            </div>
        </div>

        <div class="bg-white border rounded-2xl shadow-sm p-6 md:p-8">
            @include($componentView)
        </div>

        @if($tool->faq)
            <div class="mt-10 bg-white border rounded-2xl p-6 md:p-8">
                <h2 class="text-lg font-bold mb-4 text-gray-900">Frequently Asked Questions</h2>
                @foreach($tool->faq as $item)
                    <div class="mb-4 last:mb-0">
                        <p class="font-semibold text-gray-900">{{ $item['question'] }}</p>
                        <p class="text-gray-600 text-sm mt-1">{{ $item['answer'] }}</p>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-layouts.public>