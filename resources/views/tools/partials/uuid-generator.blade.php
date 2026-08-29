<div class="space-y-4">
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">How many?</label>
        <input type="number" id="uuid-count" min="1" max="50" value="1" class="border border-gray-300 rounded-lg p-3 w-32 focus:outline-none focus:ring-2 focus:ring-indigo-500">
    </div>

    <button onclick="generateUuids()" class="w-full px-6 py-3 bg-indigo-600 text-white rounded-lg font-medium hover:bg-indigo-700">Generate</button>

    <textarea id="uuid-output" rows="8" readonly class="w-full border border-gray-300 rounded-xl p-4 font-mono text-sm bg-gray-50"></textarea>
</div>

<script>
    function generateUuids() {
        const count = Math.min(50, Math.max(1, parseInt(document.getElementById('uuid-count').value) || 1));
        const uuids = [];
        for (let i = 0; i < count; i++) {
            uuids.push(crypto.randomUUID());
        }
        document.getElementById('uuid-output').value = uuids.join('\n');
    }
</script>