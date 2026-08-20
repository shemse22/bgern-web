<x-app-layout>
    <div class="max-w-4xl mx-auto py-10 px-4">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Manage Categories</h1>
            <a href="{{ route('admin.categories.create') }}" class="px-4 py-2 bg-indigo-600 text-white rounded-md text-sm">+ New Category</a>
        </div>

        @if(session('status'))
            <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">{{ session('status') }}</div>
        @endif

        <table class="w-full border-collapse">
            <thead>
                <tr class="border-b text-left text-sm text-gray-500">
                    <th class="py-2">Name</th>
                    <th class="py-2">Slug</th>
                    <th class="py-2">Tools</th>
                    <th class="py-2"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr class="border-b">
                        <td class="py-3">{{ $category->name }}</td>
                        <td class="py-3 text-gray-500">{{ $category->slug }}</td>
                        <td class="py-3">{{ $category->tools_count }}</td>
                        <td class="py-3 text-right space-x-3">
                            <a href="{{ route('admin.categories.edit', $category) }}" class="text-indigo-600 text-sm">Edit</a>
                            <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="inline" onsubmit="return confirm('Delete this category? Tools in it will not be deleted, just unassigned.')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 text-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>