<div class="space-y-6">
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">What is <input type="number" id="pct-a" class="w-24 border border-gray-300 rounded-lg p-2 text-center" value="10"> % of <input type="number" id="pct-b" class="w-24 border border-gray-300 rounded-lg p-2 text-center" value="200"> ?</label>
        <div id="pct-result-1" class="text-2xl font-bold text-indigo-600 mt-2"></div>
    </div>

    <div class="border-t pt-6">
        <label class="block text-sm font-medium text-gray-700 mb-2"><input type="number" id="pct-c" class="w-24 border border-gray-300 rounded-lg p-2 text-center" value="50"> is what % of <input type="number" id="pct-d" class="w-24 border border-gray-300 rounded-lg p-2 text-center" value="200"> ?</label>
        <div id="pct-result-2" class="text-2xl font-bold text-indigo-600 mt-2"></div>
    </div>

    <div class="border-t pt-6">
        <label class="block text-sm font-medium text-gray-700 mb-2">Change from <input type="number" id="pct-e" class="w-24 border border-gray-300 rounded-lg p-2 text-center" value="100"> to <input type="number" id="pct-f" class="w-24 border border-gray-300 rounded-lg p-2 text-center" value="150"> </label>
        <div id="pct-result-3" class="text-2xl font-bold text-indigo-600 mt-2"></div>
    </div>
</div>

<script>
    function calcAll() {
        const a = parseFloat(document.getElementById('pct-a').value) || 0;
        const b = parseFloat(document.getElementById('pct-b').value) || 0;
        document.getElementById('pct-result-1').textContent = ((a / 100) * b).toFixed(2);

        const c = parseFloat(document.getElementById('pct-c').value) || 0;
        const d = parseFloat(document.getElementById('pct-d').value) || 1;
        document.getElementById('pct-result-2').textContent = ((c / d) * 100).toFixed(2) + '%';

        const e = parseFloat(document.getElementById('pct-e').value) || 0;
        const f = parseFloat(document.getElementById('pct-f').value) || 0;
        const change = e !== 0 ? (((f - e) / e) * 100).toFixed(2) : '0';
        document.getElementById('pct-result-3').textContent = (change >= 0 ? '+' : '') + change + '%';
    }

    ['pct-a', 'pct-b', 'pct-c', 'pct-d', 'pct-e', 'pct-f'].forEach(id => {
        document.getElementById(id).addEventListener('input', calcAll);
    });
    calcAll();
</script>