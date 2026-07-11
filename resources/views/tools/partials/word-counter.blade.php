<textarea
    id="text-input"
    rows="10"
    class="w-full border rounded-lg p-4 focus:ring-2 focus:ring-indigo-500"
    placeholder="Start typing or paste your text here..."
></textarea>

<div class="mt-4 flex gap-6 text-sm text-gray-700">
    <div><span id="word-count" class="font-bold text-indigo-600">0</span> words</div>
    <div><span id="char-count" class="font-bold text-indigo-600">0</span> characters</div>
    <div><span id="sentence-count" class="font-bold text-indigo-600">0</span> sentences</div>
</div>

<script>
    const textInput = document.getElementById('text-input');
    const wordCount = document.getElementById('word-count');
    const charCount = document.getElementById('char-count');
    const sentenceCount = document.getElementById('sentence-count');

    textInput.addEventListener('input', () => {
        const text = textInput.value;
        const words = text.trim().length ? text.trim().split(/\s+/).length : 0;
        const chars = text.length;
        const sentences = text.trim().length ? (text.match(/[.!?]+/g) || []).length : 0;

        wordCount.textContent = words;
        charCount.textContent = chars;
        sentenceCount.textContent = sentences;
    });
</script>