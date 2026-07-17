<div class="space-y-4">
    <textarea
        id="case-input"
        rows="6"
        class="w-full border border-gray-300 rounded-xl p-4 text-gray-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition"
        placeholder="Type or paste your text here..."
    ></textarea>

    <div class="flex flex-wrap gap-3">
        <button onclick="convertCase('upper')" class="px-4 py-2 bg-indigo-600 text-white rounded-lg text-sm font-medium hover:bg-indigo-700 transition">UPPERCASE</button>
        <button onclick="convertCase('lower')" class="px-4 py-2 bg-indigo-600 text-white rounded-lg text-sm font-medium hover:bg-indigo-700 transition">lowercase</button>
        <button onclick="convertCase('title')" class="px-4 py-2 bg-indigo-600 text-white rounded-lg text-sm font-medium hover:bg-indigo-700 transition">Title Case</button>
        <button onclick="convertCase('sentence')" class="px-4 py-2 bg-indigo-600 text-white rounded-lg text-sm font-medium hover:bg-indigo-700 transition">Sentence case</button>
    </div>
</div>

<script>
    function convertCase(mode) {
        const el = document.getElementById('case-input');
        const text = el.value;

        if (mode === 'upper') {
            el.value = text.toUpperCase();
        } else if (mode === 'lower') {
            el.value = text.toLowerCase();
        } else if (mode === 'title') {
            el.value = text.replace(/\w\S*/g, (word) =>
                word.charAt(0).toUpperCase() + word.slice(1).toLowerCase()
            );
        } else if (mode === 'sentence') {
            const lower = text.toLowerCase();
            el.value = lower.replace(/(^\s*\w|[.!?]\s*\w)/g, (c) => c.toUpperCase());
        }
    }
</script>