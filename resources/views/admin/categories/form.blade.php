@php $category = $category ?? null; @endphp

<div>
    <label class="block text-sm font-medium mb-1">Name</label>
    <input type="text" name="name" value="{{ old('name', $category->name ?? '') }}" class="w-full border rounded-md p-2">
    @error('name') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
</div>

<div>
    <label class="block text-sm font-medium mb-1">Slug</label>
    <input type="text" name="slug" value="{{ old('slug', $category->slug ?? '') }}" class="w-full border rounded-md p-2">
    @error('slug') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
</div>

<div>
    <label class="block text-sm font-medium mb-1">Description</label>
    <textarea name="description" rows="3" class="w-full border rounded-md p-2">{{ old('description', $category->description ?? '') }}</textarea>
</div>