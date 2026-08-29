<div class="space-y-4">
    <textarea id="json-input" rows="10" class="w-full border border-gray-300 rounded-xl p-4 font-mono text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder='{"example": "paste your JSON here"}'></textarea>

    <div class="flex gap-3">
        <button onclick="formatJson()" class="px-6 py-3 bg-indigo-600 text-white rounded-lg font-medium hover:bg-indigo-700">Format</button>
        <button onclick="minifyJson()" class="px-6 py-3 bg-gray-200 text-gray-700 rounded-lg font-medium hover:bg-gray-300">Minify</button>
    </div>

    <div id="json-error" class="hidden p-4 bg-red-100 text-red-700 rounded-lg text-sm"></div>
</div>

<script>
    function formatJson() {
        const input = document.getElementById('json-input');
        const errorBox = document.getElementById('json-error');
        try {
            const parsed = JSON.parse(input.value);
            input.value = JSON.stringify(parsed, null, 2);
            errorBox.classList.add('hidden');
        } catch (e) {
            errorBox.textContent = 'Invalid JSON: ' + e.message;
            errorBox.classList.remove('hidden');
        }
    }

    function minifyJson() {
        const input = document.getElementById('json-input');
        const errorBox = document.getElementById('json-error');
        try {
            const parsed = JSON.parse(input.value);
            input.value = JSON.stringify(parsed);
            errorBox.classList.add('hidden');
        } catch (e) {
            errorBox.textContent = 'Invalid JSON: ' + e.message;
            errorBox.classList.remove('hidden');
        }
    }
</script>