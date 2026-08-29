<div class="space-y-4">
    <textarea id="base64-input" rows="8" class="w-full border border-gray-300 rounded-xl p-4 font-mono text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Type or paste text here..."></textarea>

    <div class="flex gap-3">
        <button onclick="encodeBase64()" class="px-6 py-3 bg-indigo-600 text-white rounded-lg font-medium hover:bg-indigo-700">Encode</button>
        <button onclick="decodeBase64()" class="px-6 py-3 bg-gray-200 text-gray-700 rounded-lg font-medium hover:bg-gray-300">Decode</button>
    </div>

    <div id="base64-error" class="hidden p-4 bg-red-100 text-red-700 rounded-lg text-sm"></div>
</div>

<script>
    function encodeBase64() {
        const input = document.getElementById('base64-input');
        document.getElementById('base64-error').classList.add('hidden');
        input.value = btoa(unescape(encodeURIComponent(input.value)));
    }

    function decodeBase64() {
        const input = document.getElementById('base64-input');
        const errorBox = document.getElementById('base64-error');
        try {
            input.value = decodeURIComponent(escape(atob(input.value)));
            errorBox.classList.add('hidden');
        } catch (e) {
            errorBox.textContent = 'Invalid Base64 string.';
            errorBox.classList.remove('hidden');
        }
    }
</script>