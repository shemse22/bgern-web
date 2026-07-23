@php $post = $post ?? null; @endphp

<link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet">

<div>
    <label class="block text-sm font-medium mb-1">Title</label>
    <input type="text" name="title" value="{{ old('title', $post->title ?? '') }}" class="w-full border rounded-md p-2">
    @error('title') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
</div>

<div>
    <label class="block text-sm font-medium mb-1">Slug</label>
    <input type="text" name="slug" value="{{ old('slug', $post->slug ?? '') }}" class="w-full border rounded-md p-2">
    @error('slug') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
</div>
<div>
    <label class="block text-sm font-medium mb-1">Meta Title (for search engines, defaults to Title if blank)</label>
    <input type="text" name="meta_title" value="{{ old('meta_title', $post->meta_title ?? '') }}" class="w-full border rounded-md p-2">
</div>

<div>
    <label class="block text-sm font-medium mb-1">Meta Description (for search engines, defaults to Excerpt if blank)</label>
    <textarea name="meta_description" rows="2" class="w-full border rounded-md p-2">{{ old('meta_description', $post->meta_description ?? '') }}</textarea>
</div>

<div>
    <label class="block text-sm font-medium mb-1">Thumbnail</label>
    @if(isset($post) && $post->thumbnail)
        <img src="{{ asset('storage/' . $post->thumbnail) }}" class="w-32 h-32 object-cover rounded mb-2">
    @endif
    <input type="file" name="thumbnail" accept="image/*" class="w-full border rounded-md p-2">
    @error('thumbnail') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
</div>

<div>
    <label class="block text-sm font-medium mb-1">Excerpt</label>
    <textarea name="excerpt" rows="2" class="w-full border rounded-md p-2">{{ old('excerpt', $post->excerpt ?? '') }}</textarea>
</div>

<div>
    <label class="block text-sm font-medium mb-1">Body</label>
    <div id="quill-editor" style="height: 300px;" class="bg-white">{!! old('body', $post->body ?? '') !!}</div>
    <textarea name="body" id="body-input" class="hidden"></textarea>
</div>

<div class="flex items-center gap-2">
    <input type="checkbox" name="is_published" value="1" id="is_published" {{ old('is_published', $post->is_published ?? true) ? 'checked' : '' }}>
    <label for="is_published" class="text-sm">Published (visible on site)</label>
</div>

<script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
<script>
    const quill = new Quill('#quill-editor', {
        theme: 'snow',
        modules: {
            toolbar: [
                ['bold', 'italic', 'underline'],
                [{ 'header': [1, 2, 3, false] }],
                [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                ['link'],
                ['clean']
            ]
        }
    });

    document.querySelector('form').addEventListener('submit', function() {
        document.getElementById('body-input').value = quill.root.innerHTML;
    });
</script>