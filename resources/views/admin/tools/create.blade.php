<x-app-layout>
    <div class="max-w-2xl mx-auto py-10 px-4">
        <h1 class="text-2xl font-bold mb-6">New Tool</h1>

        <form action="{{ route('admin.tools.store') }}" method="POST" class="space-y-4">
            @csrf
            @include('admin.tools.partials.form')
            <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md text-sm">Create Tool</button>
        </form>
    </div>
</x-app-layout>