@php $tool = $tool ?? null; @endphp

<div>
    <label class="block text-sm font-medium mb-1">Name</label>
    <input type="text" name="name" value="{{ old('name', $tool->name ?? '') }}" class="w-full border rounded-md p-2">
    @error('name') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
</div>

<div>
    <label class="block text-sm font-medium mb-1">Slug</label>
    <input type="text" name="slug" value="{{ old('slug', $tool->slug ?? '') }}" class="w-full border rounded-md p-2">
    @error('slug') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
</div>

<div>
    <label class="block text-sm font-medium mb-1">Description</label>
    <textarea name="description" rows="2" class="w-full border rounded-md p-2">{{ old('description', $tool->description ?? '') }}</textarea>
</div>

<div>
    <label class="block text-sm font-medium mb-1">How To</label>
    <textarea name="how_to" rows="2" class="w-full border rounded-md p-2">{{ old('how_to', $tool->how_to ?? '') }}</textarea>
</div>

<div>
    <label class="block text-sm font-medium mb-1">Component (matches partial filename, e.g. "word-counter")</label>
    <input type="text" name="component" value="{{ old('component', $tool->component ?? '') }}" class="w-full border rounded-md p-2">
    @error('component') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
</div>
<div>
    <label class="block text-sm font-medium mb-1">FAQ (one per line: Question | Answer)</label>
    <textarea name="faq_raw" rows="4" class="w-full border rounded-md p-2 font-mono text-sm" placeholder="Is this free? | Yes, completely free.">{{ old('faq_raw', isset($tool) && $tool->faq ? collect($tool->faq)->map(fn($item) => $item['question'] . ' | ' . $item['answer'])->join("\n") : '') }}</textarea>
</div>

<div>
    <label class="block text-sm font-medium mb-2">Categories</label>
    <div class="space-y-1">
        @foreach($categories as $category)
            <label class="flex items-center gap-2 text-sm">
                <input type="checkbox" name="categories[]" value="{{ $category->id }}"
                    {{ isset($tool) && $tool->categories->contains($category->id) ? 'checked' : '' }}>
                {{ $category->name }}
            </label>
        @endforeach
    </div>
</div>

<div class="flex items-center gap-2">
    <input type="checkbox" name="is_active" value="1" id="is_active" {{ old('is_active', $tool->is_active ?? true) ? 'checked' : '' }}>
    <label for="is_active" class="text-sm">Active (visible on site)</label>
</div>