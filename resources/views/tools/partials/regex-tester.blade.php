<div class="space-y-4">
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Regex Pattern</label>
        <div class="flex gap-2">
            <span class="flex items-center px-3 border border-gray-300 rounded-lg bg-gray-50 text-gray-500">/</span>
            <input type="text" id="regex-pattern" class="flex-1 border border-gray-300 rounded-lg p-3 font-mono focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="e.g. \d+">
            <span class="flex items-center px-3 border border-gray-300 rounded-lg bg-gray-50 text-gray-500">/</span>
            <input type="text" id="regex-flags" class="w-20 border border-gray-300 rounded-lg p-3 font-mono focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="gi">
        </div>
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Test Text</label>
        <textarea id="regex-test-text" rows="6" class="w-full border border-gray-300 rounded-xl p-4 focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Paste text to test against..."></textarea>
    </div>

    <div id="regex-result" class="p-4 bg-gray-50 rounded-lg text-sm whitespace-pre-wrap"></div>
</div>

<script>
    const patternInput = document.getElementById('regex-pattern');
    const flagsInput = document.getElementById('regex-flags');
    const testTextInput = document.getElementById('regex-test-text');
    const resultBox = document.getElementById('regex-result');

    function runRegexTest() {
        const pattern = patternInput.value;
        const flags = flagsInput.value;
        const text = testTextInput.value;

        if (!pattern) {
            resultBox.textContent = 'Enter a pattern to test.';
            return;
        }

        try {
            const regex = new RegExp(pattern, flags);
            const matches = [...text.matchAll(regex.global ? regex : new RegExp(pattern, flags + 'g'))];

            if (matches.length === 0) {
                resultBox.textContent = 'No matches found.';
            } else {
                resultBox.textContent = `${matches.length} match(es):\n\n` + matches.map((m, i) => `${i + 1}. "${m[0]}" at index ${m.index}`).join('\n');
            }
        } catch (e) {
            resultBox.textContent = 'Invalid regex: ' + e.message;
        }
    }

    [patternInput, flagsInput, testTextInput].forEach(el => el.addEventListener('input', runRegexTest));
</script>