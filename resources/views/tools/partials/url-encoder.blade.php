<div class="space-y-4">
    <textarea id="url-input" rows="6" class="w-full border border-gray-300 rounded-xl p-4 font-mono text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Type or paste a URL or text here..."></textarea>

    <div class="flex gap-3">
        <button onclick="encodeUrl()" class="px-6 py-3 bg-indigo-600 text-white rounded-lg font-medium hover:bg-indigo-700">Encode</button>
        <button onclick="decodeUrl()" class="px-6 py-3 bg-gray-200 text-gray-700 rounded-lg font-medium hover:bg-gray-300">Decode</button>
    </div>
</div>

<script>
    function encodeUrl() {
        const input = document.getElementById('url-input');
        input.value = encodeURIComponent(input.value);
    }

    function decodeUrl() {
        const input = document.getElementById('url-input');
        try {
            input.value = decodeURIComponent(input.value);
        } catch (e) {
            alert('Invalid encoded string.');
        }
    }
</script>