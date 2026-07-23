<x-app-layout>
    <div class="max-w-2xl mx-auto py-10 px-4">
        <h1 class="text-2xl font-bold mb-6">Edit Post</h1>
        <form action="{{ route('admin.blog.update', $post) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            @include('admin.blog.partials.form')
            <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md text-sm">Update Post</button>
        </form>
    </div>
</x-app-layout>