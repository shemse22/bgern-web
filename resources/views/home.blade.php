<x-layouts.public :title="'Bgern - Free Online Tools'">
    <div class="max-w-6xl mx-auto px-4 py-16">
        <div class="grid md:grid-cols-2 gap-12 items-center mb-20">
            <div>
                <h1 class="text-4xl md:text-5xl font-bold mb-4 text-gray-900">
                    All-in-One Online Tools, <span class="text-indigo-600">Absolutely Free</span>
                </h1>
                <p class="text-gray-600 text-lg mb-8">Bgern provides free, powerful tools to make your life easier. Fast, free, and secure. No sign-up required.</p>

                <form action="{{ route('home') }}" method="GET" class="flex gap-2">
                    <input
                        type="text"
                        name="q"
                        value="{{ request('q') }}"
                        placeholder="Search tools..."
                        class="flex-1 border rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    >
                    <button type="submit" class="px-6 py-3 bg-indigo-600 text-white rounded-lg font-medium hover:bg-indigo-700">
                        Search
                    </button>
                </form>
            </div>

            <div class="bg-white border rounded-2xl shadow-lg p-6">
                <div class="flex gap-2 mb-4">
                    <span class="w-3 h-3 rounded-full bg-red-400"></span>
                    <span class="w-3 h-3 rounded-full bg-yellow-400"></span>
                    <span class="w-3 h-3 rounded-full bg-green-400"></span>
                </div>
                <p class="font-bold text-gray-900 mb-1">Welcome to Bgern! 👋</p>
                <p class="text-gray-500 text-sm mb-4">What would you like to do today?</p>
                <div class="grid grid-cols-2 gap-3">
                    @foreach($tools->take(4) as $i => $tool)
                        @php
                            $colors = ['bg-red-100 text-red-600', 'bg-green-100 text-green-600', 'bg-purple-100 text-purple-600', 'bg-orange-100 text-orange-600'];
                            $color = $colors[$i % count($colors)];
                        @endphp
                        <a href="{{ route('tools.show', $tool->slug) }}" class="border rounded-lg p-3 hover:shadow-md transition">
                            <div class="w-8 h-8 rounded-md {{ $color }} flex items-center justify-center mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                            </div>
                            <p class="text-sm font-medium text-gray-900">{{ $tool->name }}</p>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="mb-16">
            <h2 class="text-2xl font-bold mb-6 text-gray-900">Popular Tools</h2>

            @if($tools->isEmpty())
                <p class="text-gray-500">No tools available yet.</p>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                    @foreach($tools as $i => $tool)
                        @php
                            $colors = ['bg-red-100 text-red-600', 'bg-green-100 text-green-600', 'bg-purple-100 text-purple-600', 'bg-orange-100 text-orange-600', 'bg-blue-100 text-blue-600'];
                            $color = $colors[$i % count($colors)];
                        @endphp
                        <a href="{{ route('tools.show', $tool->slug) }}" class="group block bg-white border rounded-xl p-6 hover:shadow-lg hover:border-indigo-200 transition">
                            <div class="w-12 h-12 rounded-lg {{ $color }} flex items-center justify-center mb-4">
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

        @if($categories->isNotEmpty())
            <div class="mb-20">
                <h2 class="text-2xl font-bold mb-6 text-gray-900">Popular Categories</h2>
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                    @foreach($categories as $category)
                        <div class="bg-white border rounded-xl p-5">
                            <div class="w-10 h-10 rounded-lg bg-purple-100 text-purple-600 flex items-center justify-center mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                </svg>
                            </div>
                            <h3 class="font-semibold text-gray-900">{{ $category->name }}</h3>
                            <p class="text-gray-500 text-sm">{{ $category->tools()->count() }} {{ Str::plural('tool', $category->tools()->count()) }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <div class="text-center">
            <h2 class="text-2xl font-bold mb-10 text-gray-900">How it works</h2>
            <div class="grid md:grid-cols-3 gap-8">
                <div>
                    <div class="w-10 h-10 rounded-full bg-indigo-600 text-white flex items-center justify-center mx-auto mb-4 font-bold">1</div>
                    <p class="font-bold text-gray-900 mb-1">Choose a Tool</p>
                    <p class="text-gray-500 text-sm">Browse our collection and select the tool you need</p>
                </div>
                <div>
                    <div class="w-10 h-10 rounded-full bg-indigo-600 text-white flex items-center justify-center mx-auto mb-4 font-bold">2</div>
                    <p class="font-bold text-gray-900 mb-1">Use the Tool</p>
                    <p class="text-gray-500 text-sm">Upload your file or enter data and let it work its magic</p>
                </div>
                <div>
                    <div class="w-10 h-10 rounded-full bg-indigo-600 text-white flex items-center justify-center mx-auto mb-4 font-bold">3</div>
                    <p class="font-bold text-gray-900 mb-1">Get Results</p>
                    <p class="text-gray-500 text-sm">Download or copy your results instantly</p>
                </div>
            </div>
        </div>
    </div>
</x-layouts.public>