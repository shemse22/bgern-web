<div class="space-y-4">
    <textarea
        id="text-input"
        rows="10"
        class="w-full border border-gray-300 rounded-xl p-4 text-gray-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition"
        placeholder="Start typing or paste your text here..."
    ></textarea>

    <div class="flex flex-wrap gap-6 text-sm text-gray-700 bg-gray-50 rounded-xl p-4">
        <div><span id="word-count" class="font-bold text-indigo-600 text-lg">0</span> words</div>
        <div><span id="char-count" class="font-bold text-indigo-600 text-lg">0</span> characters</div>
        <div><span id="sentence-count" class="font-bold text-indigo-600 text-lg">0</span> sentences</div>
    </div>
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