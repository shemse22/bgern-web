<textarea
    id="case-input"
    rows="6"
    class="w-full border rounded-lg p-4 focus:ring-2 focus:ring-indigo-500"
    placeholder="Type or paste your text here..."
></textarea>

<div class="mt-4 flex flex-wrap gap-3">
    <button onclick="convertCase('upper')" class="px-4 py-2 bg-indigo-600 text-white rounded-md text-sm">UPPERCASE</button>
    <button onclick="convertCase('lower')" class="px-4 py-2 bg-indigo-600 text-white rounded-md text-sm">lowercase</button>
    <button onclick="convertCase('title')" class="px-4 py-2 bg-indigo-600 text-white rounded-md text-sm">Title Case</button>
    <button onclick="convertCase('sentence')" class="px-4 py-2 bg-indigo-600 text-white rounded-md text-sm">Sentence case</button>
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